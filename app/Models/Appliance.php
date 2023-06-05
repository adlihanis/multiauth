<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    protected $fillable = [
        'totalQuantity',
        'totalPrice',
        'status',
        'user_id',
        'quantity1',
        'approval_status',
        'content',
        'image',
        'item',
        'description',
        'rate',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
