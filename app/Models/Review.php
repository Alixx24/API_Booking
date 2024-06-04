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
        'review',
        'stars',
        'busieness_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function busieness()
    {
        return $this->belongsTo(Busieness::class);
    }
}
