<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeVarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'cake_id',
        'varian_id'
    ];

    public function cake()
    {
        return $this->belongsTo(Cakes::class);
    }

    public function varian()
    {
        return $this->belongsTo(Varian::class);
    }
}
