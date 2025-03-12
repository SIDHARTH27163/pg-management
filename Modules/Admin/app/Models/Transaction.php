<?php
namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $fillable = ['title', 'type', 'amount', 'date'];

    public function scopeIncome($query) {
        return $query->where('type', 'income');
    }

    public function scopeExpense($query) {
        return $query->where('type', 'expense');
    }
}
