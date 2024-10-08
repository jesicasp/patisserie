<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cakes extends Model
{
    use HasFactory;

    protected $fillable = [
        'cake_name',
        'image',
        'price',
        'cake_description'
    ];
}
