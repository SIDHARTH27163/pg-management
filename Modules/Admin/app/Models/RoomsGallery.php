<?php
namespace Modules\Admin\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsGallery extends Model
{
    use HasFactory;
    protected $table = 'rooms_gallery';
    protected $fillable = [
        'room_id',
        'gallery_image_path',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
