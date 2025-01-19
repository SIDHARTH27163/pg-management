<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Admin\Database\Factories\ContentBlockFactory;

class ContentBlock extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'content'];

    // protected static function newFactory(): ContentBlockFactory
    // {
    //     // return ContentBlockFactory::new();
    // }
}
