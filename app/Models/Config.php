<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Config extends Model
{
    use HasFactory;

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
        $logo = self::where('key', 'logo')->value('value');

        return $logo && Storage::disk('public')->exists($logo)
            ? 'storage/' . $logo
            : asset('assets/imgs/template/logo-black.png');
    }
    public static function getIcon()
    {
        $icon = self::where('key', 'icon')->value('value') ?? 'default-icon.png';
        return 'storage/' . ltrim($icon, '/');
    }
    public static function getConfigValue($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }
}
