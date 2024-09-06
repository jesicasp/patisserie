<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chefs extends Model
{
    use HasFactory;

    protected $fillable = [
        'chef_name',
        'specialty',
        'experience'
    ];

    public function cakes()
    {
        return $this->hasMany(Cakes::class, 'chef_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($chef) {
            foreach ($chef->cakes as $cake) {
                if ($cake->image) {
                    $oldImagePath = storage_path('app/public/' . $cake->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $cake->delete(); 
            }
        });
    }
}
