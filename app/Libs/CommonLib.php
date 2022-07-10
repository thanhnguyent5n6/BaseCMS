<?php


namespace App\Libs;


use Carbon\Carbon;
use Illuminate\Support\Str;

class CommonLib
{
    // check mime type file
    public static function checkMimeTypeImage($file_type)
    {
        $mimet = array(
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',



            // video
//            'mp3'   => 'audio/mp3',
//            'mp3eg' => 'audio/mpeg',
//            'mpeg'  => 'video/mpeg',
//            'mp4'   => 'video/mp4',
//            'mov'   => 'video/quicktime',
        );
        if (in_array($file_type, $mimet)) {
            return true;
        }
        return false;
    }

    public static function getFileAttachDetach($image_ids, $old_image_ids)
    {
        $img_deletes = [];
        if(isset($old_image_ids) && count($old_image_ids) > 0)
            $img_deletes = array_diff($old_image_ids,$image_ids);

        if(count(array_diff($image_ids, $old_image_ids)) > 0)
            $image_ids = array_diff($image_ids, $old_image_ids);

        foreach($image_ids as $key => $image_id) {
            if(in_array($image_id, $old_image_ids))
                unset($image_ids[$key]);
        }
        return array($image_ids, $img_deletes);
    }

    /**
     * Display date with format
     * @param $date_input
     * @param string $format_dat
     * @return string
     */
    public static function getDisplayDate($date_input, $format_dat = DISPLAY_DATE_FORMAT)
    {
        return empty($date_input) ? "" : Carbon::parse($date_input)->format($format_dat);
    }

    public static function billStatus()
    {
        return array(
            BILL_NEW => 'Mới tạo',
            BILL_WAITING => 'Đang xử lý',
            BILL_SHIPPED => 'Đã giao hàng',
            BILL_RETURN => 'Trả lại',
        );
    }

    public static function getBillStatus($status_index)
    {
        $status = self::billStatus();
        return $status[$status_index];
    }

    public static function productStatus()
    {
        return array(
            PRODUCT_STATUS_IN_STOCK => 'Còn hàng',
            PRODUCT_STATUS_OUT_STOCK => 'Hết hàng',
        );
    }
}
