<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Storage;

class ImageStore
{
    public static function getImageFromUrl($url)
    {

        // Use condition to check the existence of URL
        $pos = strrpos($url, '.');

        if ($pos !== false) {
            $name = md5($url);
            $extension = substr($url, $pos + 1);

            if (!Storage::disk('public')->exists($name . '.' . $extension)) {
                // Use get_headers() function
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')) {
                    Storage::disk('public')->put($name . '.' . $extension, file_get_contents($url));

                    return Storage::disk('public')->url($name . '.' . $extension);
                } else {
                    Log::error('Image not found!');
                    return null;
                }
            }
            return Storage::disk('public')->url($name . '.' . $extension);
        }

        Log::error('Cannot extract extension from url!');

        return $url;
    }
}