<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'busieness_id',
        'description',
        'price',
        'name'
    ];

    public function busieness()
    {
        return $this->belongsTo(Busieness::class);
    }
}
