<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];
    
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
    
    public static function set($key, $value)
    {
        $setting = static::where('key', $key)->first();
        
        if ($setting) {
            $setting->value = $value;
            $setting->save();
        } else {
            static::create([
                'key' => $key,
                'value' => $value
            ]);
        }
    }
}