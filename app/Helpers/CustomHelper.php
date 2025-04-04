<?php

namespace App\Helpers;

class CustomHelper
{
    public static function logoSrc($path)
    {
        if (strpos($path, 'storage') === false) {
            $path = 'storage/' . $path;
        }
        return asset($path);
    }
}
