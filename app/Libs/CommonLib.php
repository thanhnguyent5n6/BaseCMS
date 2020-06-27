<?php


namespace App\Libs;


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

    public static function createSlug($model, $title, $id = 0)
    {
        // Normalize the title
        $slug = $slug = Str::slug($title, '-');

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = self::getRelatedSlugs($model, $slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    private static function getRelatedSlugs($model, $slug, $id = 0)
    {
        return $model::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
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
}
