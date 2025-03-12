<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'room_no',
        'room_type',
        'number_of_tenants',
        'bathroom',
        'balconies',
        'capacity',
        'availability',
        'rent',
        'additional_charges',
        'description',
    ];

    // Automatically generate sequential room_no starting from 101
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($room) {
            $lastRoom = self::latest('id')->first();
            $lastRoomNo = $lastRoom ? intval($lastRoom->room_no) : 100; // Start from 100
            $room->room_no = $lastRoomNo + 1;
        });
    }
    public function features()
    {
        return $this->hasMany(RoomFeature::class);
    }
    public function rules()
    {
        return $this->hasMany(RoomRule::class);
    }
    public function cover_images()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function gallery_images()
    {
        return $this->hasMany(RoomsGallery::class);
    }
    public function bookings()
    {
        return $this->hasMany(AllottedBooking::class);
    }
    public function allottedBookings()
{
    return $this->hasMany(AllottedBooking::class, 'room_id');
}

    

}