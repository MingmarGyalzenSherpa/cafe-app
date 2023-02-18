<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_no', 'date', 'time', 'guests', 'message'];
    const UPDATED_AT = null;
}
