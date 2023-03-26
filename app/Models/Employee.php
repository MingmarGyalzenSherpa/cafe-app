<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    public $fillable = ['first_name', 'middle_name', 'last_name', 'role', 'shift', 'salary'];
}
