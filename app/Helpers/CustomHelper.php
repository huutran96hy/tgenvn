<?php

namespace App\Helpers;

class CustomHelper
{
    public static function logoSrc($path)
    {
        return asset('storage/' . $path);
    }
}
