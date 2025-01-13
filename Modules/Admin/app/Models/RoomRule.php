<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RoomRule extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'rule'];

    public function room()
{
    return $this->belongsTo(Room::class);
}

}
