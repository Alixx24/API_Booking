<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAdmin extends Model
{
    use HasFactory;
    protected $table = 'ticket_admins';
    protected $fillable = [
        'subject',
        'description'
    ];
}
