<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // Set the table name if it differs from the default naming convention
    protected $table = 'user_profile';  // Assuming you want the same table for user profile

    // Fillable attributes for mass assignment
    protected $fillable = [
        'father_name',
        'father_contact',
        'aadhar_card',
        'home_address',
        'description',
        'user_id'
    ];

    // Optionally, you can define cast types for any attributes
    protected $casts = [
        'aadhar_card' => 'array',  // To store the array of URLs
    ];
}
