<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CustomHelper
{
    public static function logoSrc($path)
    {
        // Nếu đã có 'storage/', không thêm nữa
        if (strpos($path, 'storage') === false) {
            $path = 'storage/' . ltrim($path, '/');
        }

        return asset($path);
    }
    public static function safeMapHtml(?string $mapHtml): string
    {
        $errorKeywords = [
            'Invalid',
            'Google Maps Platform rejected your request',
        ];

        if (
            !$mapHtml ||
            Str::length($mapHtml) < 100 ||
            Str::contains($mapHtml, $errorKeywords)
        ) {
            // Iframe mặc định
            return '<iframe src="https://www.google.com/maps?q=Hà+Nội&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        }

        return $mapHtml;
    }
}
