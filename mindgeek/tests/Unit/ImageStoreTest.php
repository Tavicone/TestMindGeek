<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Libraries\ImageStore;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAlbumUpload()
    {
        Storage::fake('public');

        // Assert one or more files were stored...
        $validImageUrl = 'https://mgtechtest.blob.core.windows.net/images/unscaled/2012/11/29/Parental-Guidance-VPA.jpg';
        $hasedImage = md5($validImageUrl);
        $pos = strrpos($validImageUrl, '.');
        $extension = substr($validImageUrl, $pos + 1);

        ImageStore::getImageFromUrl($validImageUrl);

        Storage::disk('public')->assertExists($hasedImage . '.' . $extension);

        // Assert one invalid image is not stored...
        $invalidImageUrl = 'https://mgtechtest.blob.core.windows.net/images/unscaled/2013/07/15/LPA-Parental-guidance.jpg';
        $hasedImage = md5($invalidImageUrl);
        $pos = strrpos($invalidImageUrl, '.');
        $extension = substr($invalidImageUrl, $pos + 1);

        ImageStore::getImageFromUrl($invalidImageUrl);

        Storage::disk('public')->assertMissing($hasedImage . '.' . $extension);
    }
}
