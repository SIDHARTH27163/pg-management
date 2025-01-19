<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Admin\Database\Factories\DesignSettingFactory;

class DesignSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value'];

    // protected static function newFactory(): DesignSettingFactory
    // {
    //     // return DesignSettingFactory::new();
    // }
}
