<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingOrder extends Model
{
    use HasFactory;
    public $timestamps = null;
    protected $fillable = ['item_id', 'table_id', 'quantity', 'price', 'total'];
}
