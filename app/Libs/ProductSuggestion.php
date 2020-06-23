<?php

namespace App\Libs;

class ProductSuggestion
{
    private $productIds = [];
    private $chapk = 2;
    private $raw = [];

    public function __construct($arrayPhanTu = [], $chapK = 2)
    {
        $this->productIds = $arrayPhanTu;
        $this->chapk = $chapK;
    }

    function WithProduct($arrayPhanTu)
    {
        $this->productIds = $arrayPhanTu;
        $this->raw = [];
        return $this;
    }

    function WithLength($chapK = 2)
    {
        $this->chapk = $chapK;
        $this->raw = [];
        return $this;
    }

    function ChinhHop()
    {
        $this->raw = $this->toHopChap_k_raw($this->productIds, $this->chapk);

        $tohop = [];
        foreach ($this->raw as $r) {
            if (count(array_unique($r, SORT_REGULAR)) == 1) {
                continue;
            }
            if (count($r) != $this->chapk) continue;
            $tohop[] = $r;
        }

        //$this->printArr($tohop, "Tohop");

        return $tohop;
    }

    function ToHop()
    {
        $this->raw = $this->toHopChap_k_raw($this->productIds, $this->chapk);

        $chinhhop = [];
        $tempChinhHop = [];
        foreach ($this->raw as $r) {
            if (count(array_unique($r, SORT_REGULAR)) == 1) continue;
            if (count($r) != $this->chapk) continue;

            $chinhhop[] = $r;
            sort($r, SORT_REGULAR);
            $tempChinhHop[] = $r;
        }
        $chinhhop = array_unique($tempChinhHop, SORT_REGULAR);

        //$this->printArr($chinhhop, "Chinhhop");

        return $chinhhop;
    }

    function MostValueProductWithInvoice($arrHoaDon)
    {
        $chapK_by_hoaDon = [];
        foreach ($arrHoaDon as $hd) {
            $chapK_by_hoaDon[] = count($hd);
        }

        $chapK_by_hoaDon = array_unique($chapK_by_hoaDon);

        $tempProduct=$this->productIds;

        $groupTuongDongHoaDon = [];
        foreach ($chapK_by_hoaDon as $chapK) {
            $groupTuongDongHoaDon[] = (new ProductSuggestion())->WithProduct($tempProduct)->WithLength($chapK)->InternalTuongDongHoaDon($arrHoaDon);
        }

        return $groupTuongDongHoaDon;
    }

    private function InternalTuongDongHoaDon($arrHoaDon)
    {
        $this->raw = $this->toHopChap_k_raw($this->productIds, $this->chapk);

        $tempHoaDon = [];
        foreach ($arrHoaDon as $a) {
            sort($a, SORT_REGULAR);
            $tempHoaDon[] = implode(",", $a);
        }

        $tohop = $this->ToHop();

        $keyToHop = [];
        $arrCounter = [];
        foreach ($tohop as $th) {
            sort($th, SORT_REGULAR);
            $key = implode(",", $th);

            $keyToHop[] = $key;
            $arrCounter[$key] = 0;
        }

        foreach ($tempHoaDon as $hd) {
            if (in_array($hd, $keyToHop)) {
                $arrCounter[$hd] = $arrCounter[$hd] + 1;
            } else {
                $arrCounter[$hd] = 0;
            }
        }

        // echo "\r\nTuongDongHoaDon\r\n";
        // foreach ($arrCounter as $k => $v) {
        //     echo "\r\n" . $k . ": " . $v;
        // }

        return $arrCounter;
    }

    function diedump($args)
    {
        echo "\r\n---\r\n";
        var_dump($args);
        echo "\r\n---\r\n";
        exit(0);
    }

    private function ghepPhanTu($arr1, $arr2)
    {
        $temp = [];
        foreach ($arr1 as $a1) {
            foreach ($arr2 as $a2) {
                $x = [];
                if (is_array($a1)) {
                    foreach ($a1 as $sub) {
                        $x[] = $sub;
                    }
                } else {
                    $x[] = $a1;
                }

                if (is_array($a2)) {
                    foreach ($a2 as $sub) {
                        $x[] = $sub;
                    }
                } else {
                    $x[] = $a2;
                }
                $temp[] = $x;
            }
        }
        return $temp;
    }

    private  function toHopChap_k_raw($arr, $k = 2)
    {
        $arrCopy = [];
        for ($i = 0; $i < $k; $i++) {
            $temp = [];
            foreach ($arr as $a) {
                $temp[] = $a;
            }
            $arrCopy[$i] = $temp;
        }

        while (true) {
            if (count($arrCopy) <= 1) break;
            $temp = $this->ghepPhanTu($arrCopy[0], $arrCopy[1]);
            unset($arrCopy[0]);
            unset($arrCopy[1]);
            $arrCopy = array_values($arrCopy);
            $arrCopy[] = $temp;
        }

        return $arrCopy[0];
    }

    private function printArr($arr, $title)
    {
        echo "\r\n" . $title . "\r\n";
        foreach ($arr as $a) {
            echo "\r\n" . implode(",", $a);
        }
    }
}

$temp = (new ProductSuggestion())->WithProduct([1, 2, 3, 4])->MostValueProductWithInvoice([[1,2],[2,4],[1,2,3], [2,1]]);
/*echo "\r\n(new ProductSuggestion())->WithProduct([1, 2, 3, 4])->MostValueProductWithInvoice([[1,2],[2,4],[1,2,3], [2,1]]);";

$tempZeroPoint=[];
echo "\r\nMVP most value product";
foreach ($temp as $t)
{
    foreach($t as $k=>$v){
        if($v>0){
            echo "\r\n" .$k." :".$v;
        }else{
            $tempZeroPoint[]= $k;
        }
    }
}
echo "\r\nZero point: ";
echo "\r\n" .json_encode($tempZeroPoint);*/
    
