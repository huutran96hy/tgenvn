<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Config extends Model
{
    use HasFactory;
    protected static $logo = null;
    protected $table = 'config';
    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }

    public static function set($key, $value)
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
    public static function getLogo()
    {
        if (self::$logo) {
            return self::$logo;
        }

        $logo = self::where('key', 'logo')->value('value');

        self::$logo = $logo && Storage::disk('public')->exists($logo)
            ? 'storage/' . $logo
            : asset('assets/imgs/template/logo-black.png');

        return self::$logo;
    }
    public static function getIcon()
    {
        $icon = self::where('key', 'icon')->value('value') ?? 'default-icon.png';
        return 'storage/' . ltrim($icon, '/');
    }
    public static function resetLogoCache()
    {
        self::$logo = null;
    }
}
