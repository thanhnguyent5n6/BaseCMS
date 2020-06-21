<?php


namespace App\Libs;


use App\Bill;
use App\Product;
use Illuminate\Support\Facades\Session;

class Apriori
{
    private $confidence;
    private $min_support;

    public function __construct(int $confidence, int $min_support)
    {
        $this->confidence = $confidence;
        $this->min_support = $min_support;
    }

    public function getProductSuggestion()
    {
        $items = $this->getItems();
        $item_ids = $items->pluck('id')->toArray();
        $bills = $this->getItemSet();
//dd($bills);
        $candidates = $this->getCandidates($bills, $items); // tập ứng cử viên
//        dd($candidates);

        $regular_items = []; // tập phổ biến
        $to_hop = [];
        $k = 2;
        if (count($candidates) > 1) {
            $to_hop[$k] = $this->getItemSetCollection($item_ids, $k);
            $regular_items[$k] = $this->filterByMinSupport($to_hop[$k], $bills);

            while (count($regular_items[$k]) >= 1) {
                $k++;
                $to_hop[$k] = $this->getItemSetCollection($item_ids, $k);
                $regular_items[$k] = $this->filterByMinSupport($to_hop[$k], $bills);

            }
        }

        $association_rule = []; // Luật kết hợp

        foreach ($regular_items as $convolution => $regular_item) {
            $regular_item = array_values($regular_item);

            foreach ($regular_item as $key => $item) {

                if ($convolution == 2) {
                    $reverse = $item;
                    $reverse['item_set'] = array_reverse($reverse['item_set']);

                    $number_sup_count = $this->getSupCountOfChildConvolution($item['item_set'], $candidates);
                    $association_rule[$convolution][] = [
                        'itemset' => $item['item_set'],
                        'support' => number_format($item['sup_count'] / count($bills) * 100),
                        'confidence' => !empty($number_sup_count) ?
                            number_format($item['sup_count'] / ($number_sup_count) * 100) : 0,
                    ];

                    $number_sup_count_reverse = $this->getSupCountOfChildConvolution($reverse['item_set'], $candidates);
                    $association_rule[$convolution][] = [
                        'itemset' => $reverse['item_set'],
                        'support' => number_format($reverse['sup_count'] / count($bills) * 100),
                        'confidence' => !empty($number_sup_count_reverse) ?
                            number_format($reverse['sup_count'] / ($number_sup_count_reverse) * 100) : 0,
                    ];
                } elseif ($convolution > 2) {

                }
            }
        }

        foreach ($association_rule as $convolution => $item_rule) {
            foreach ($item_rule as $key => $item) {
                if($item['confidence'] < $this->confidence)
                    unset($association_rule[$convolution][$key]);
            }
        }


        $best_suggest_id = [];
        $suggest_product_id = [];

        if(Session::has('cart')) {
            $cart = Session::get('cart');
            if(count($cart->items) == 1) {
                $product_id = collect($cart->items)->first()['item']->id;

                foreach($association_rule[2] as $arr_item_suggest) {
                    if($arr_item_suggest['itemset'][0] == $product_id) {
                        $best_suggest_id[] = $arr_item_suggest['itemset'][1];
                    }
                    elseif($arr_item_suggest['itemset'][1] == $product_id) {
                        $best_suggest_id[] = $arr_item_suggest['itemset'][0];
                    }
                    $suggest_product_id[] = $arr_item_suggest['itemset'][0];
                }
            }
        }



        $best_suggest_id = array_unique($best_suggest_id);

        $products = Product::whereIn('id',$best_suggest_id)->get();
        $products = $products->sortBy(function($model) use ($best_suggest_id){
            return array_search($model->getKey(), $best_suggest_id);
        });
//        dd($association_rule);
//        dd($best_suggest_id);
        return $products;
    }

    private function getSupCountOfChildConvolution($arr_id, $regular_items)
    {
        $key = count($arr_id) - 1;
        unset($arr_id[$key]);

        foreach ($regular_items as $regular_item) {
            if (count(array_intersect($arr_id, $regular_item['item_set'])) == count($arr_id)) {
                return $regular_item['sup_count'];
            }
        }

        return 0;
    }

    private function getSupCountOfChildConvolutionB($arr_id, $regular_items)
    {
        array_shift($arr_id);

        foreach ($regular_items as $regular_item) {
            if (count(array_intersect($arr_id, $regular_item['item_set'])) == count($arr_id)) {
                return $regular_item['sup_count'];
            }
        }

        return 0;
    }

    public function getItems()
    {
        $products = Product::all();
        return $products;
    }

    public function getItemSet()
    {
        $bills = Bill::with('bill_detail')->get();
        return $bills->map(function ($bill) {
            return $bill->bill_detail->pluck('id_product', 'id_product')->toArray();
        });
    }

    // Đã xóa những phần tử nhỏ hơn min supportion
    public function getCandidates($bills, $list_items)
    {
        return $list_items->map(function ($item) use ($bills) {
            $result = array();
            $result['item_set'] = [$item->id];
            $result['sup_count'] = 0;
            foreach ($bills as $data_item) {
                if (isset($data_item[$item->id]))
                    $result['sup_count']++;
            }
            return $result;
        })->filter(function ($item) {
            return $item['sup_count'] >= $this->min_support;
        })->sortByDesc('sup_count');
    }

    public function getItemSetCollection($item_set, $k = 2)
    {
        $data = [];
        for ($i = 0; $i < $k; $i++) {
            $data[$i] = $item_set;
        }

        for ($i = 0; $i < count($data); $i++) {
            while (count($data) >= 2) {
                $data[$i] = $this->hoanvi2($data[$i], $data[$i + 1]);

                foreach ($data[$i] as $j => $item) {
                    $data[$i][$j] = collect($item)->flatten(1)->toArray();
                }
                unset($data[$i + 1]);
                $data = array_values($data);
            }
        }

        for ($i = 0; $i < count($data[0]); $i++) {
            sort($data[0][$i]);
            $data[0][$i] = implode(',', $data[0][$i]);
        }
        $data = array_unique($data[0]);
        $data = array_values($data);

        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = explode(',', $data[$i]);
        }

        $delete = [];
        for ($i = 0; $i < count($data); $i++) {
            $unique_data = array_unique($data[$i]);
            if (count($unique_data) < $k)
                $delete[] = $i;
        }

        for ($i = 0; $i < count($delete); $i++) {
            if (isset($data[$delete[$i]]))
                unset($data[$delete[$i]]);
        }

        return $data;
    }

    public function hoanvi2($arr_1, $arr_2)
    {
        $result = [];
        for ($i = 0; $i < count($arr_1); $i++) {
            for ($j = 0; $j < count($arr_2); $j++) {
                $result[] = [$arr_1[$i], $arr_2[$j]];
            }
        }
        return $result;
    }

    public function filterByMinSupport($itemset, $bills)
    {
        $itemset = array_values($itemset);
        $result = [];
        for ($i = 0; $i < count($itemset); $i++) {
            $result[$i] = [
                'item_set' => $itemset[$i],
                'sup_count' => 0
            ];

            for ($b = 0; $b < count($bills); $b++) {
                $containsSearch = count(array_intersect($itemset[$i], $bills[$b])) == count($itemset[$i]);
                if ($containsSearch) {
                    $result[$i]['sup_count']++;
                }
            }
        }

        $result = collect($result)->sortByDesc('sup_count');

        // Bỏ phần tử có sup_Count < min_support
        $result = $result->filter(function ($item) {
            return $item['sup_count'] >= $this->min_support;
        })->toArray();
        return $result;
    }
}