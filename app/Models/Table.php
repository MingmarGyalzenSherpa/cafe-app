<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function pending_orders(): HasMany
    {
        return $this->hasMany(PendingOrder::class);
    }
}
