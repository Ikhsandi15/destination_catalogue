<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'destination_id',
        'star',
        'review_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
