<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $casts = [
        'facility' => 'array'
    ];

    protected $fillable = [
        'name',
        'photo',
        'city',
        'province',
        'description',
        'category',
        'budget',
        'facility'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
