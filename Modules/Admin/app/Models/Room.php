<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'room_type',
        'number_of_rooms',
        'bathrooms',
        'balconies',
        'capacity',
        'availability',
        'rent',
        'additional_charges',
        'description',
    ];
}