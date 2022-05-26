<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'day_rental_value',
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
