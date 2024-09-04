<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chefs;


class Cakes extends Model
{
    use HasFactory;

    protected $fillable = [
        'cake_name',
        'chef_id',
        'image',
        'price',
        'cake_description'
    ];

    public function chef()
    {
        return $this->belongsTo(Chefs::class);
    }
}
