<?php
namespace App\Traits;


trait Code
{

    public function getCodeUnique($prefix)
    {
        $code = $prefix."_".mt_rand(MIN_CODE, MAX_CODE);
        $check_code = $this->where('code',$code)->first();

        if(isset($check_code) && !$check_code($code))
            return $this->createCode($prefix);

        return $code;
    }
}