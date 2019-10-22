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
            $image = md5($url) . '.' . substr($url, $pos + 1);

            // Check image is already saved in storage
            if (!Storage::disk('public')->exists($image)) {
                // Use get_headers() function
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')) {
                    Storage::disk('public')->put($image, file_get_contents($url));

                    return Storage::disk('public')->url($image);
                } else {
                    Log::error('Image not found!');
                    return null;
                }
            }
            return Storage::disk('public')->url($image);
        }

        Log::error('Cannot extract extension from url!');
        return $url;
    }
}
