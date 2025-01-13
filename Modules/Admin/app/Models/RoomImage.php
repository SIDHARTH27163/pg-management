<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;

    // Specify the table name if not following Laravel's convention
    protected $table = 'room_images';

    // Fillable fields for mass assignment
    protected $fillable = [
        'room_id',
        'cover_image_path',
        'image_path',
    ];

    /**
     * Relationship: A RoomImage belongs to a Room.
     */
    public function room()
        {
            return $this->belongsTo(Room::class);
        }
}
