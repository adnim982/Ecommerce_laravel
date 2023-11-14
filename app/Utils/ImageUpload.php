<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ImageUpload
{
    public static function upload(UploadedFile $image, $directory = 'images')
    {
        $filename = Str::uuid() . '.' . $image->extension();
        $image->move(public_path($directory), $filename);

        return asset($directory . '/' . $filename);
    }
}
