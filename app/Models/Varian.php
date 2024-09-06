<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cakes;


class Varian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    public function cakes()
    {
        return $this->belongsToMany(Cakes::class, 'cake_varian');
    }
}
