<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Admin\Database\Factories\PageFactory;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title', 'slug', 'content', 'meta_title', 'meta_description', 'is_active'
    ];

    // protected static function newFactory(): PageFactory
    // {
    //     // return PageFactory::new();
    // }
}
