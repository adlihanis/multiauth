<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
    protected $fillable = [
        'image',
        'item',
        'description',
        'rate',
    ];
}
