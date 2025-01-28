<?php
namespace Modules\Admin\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllottedBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'payment_id',
        'checkin_date',
        'checkout_date',
        'price',
    ];

    // Relationships
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function payment()
    // {
    //     return $this->belongsTo(Payment::class);
    // }
}
