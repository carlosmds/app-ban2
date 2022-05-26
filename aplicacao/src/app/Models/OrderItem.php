<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'game_id',
        'purchase_id',
        'rental_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
