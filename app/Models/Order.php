<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $fillable = ['item_id', 'table_id', 'quantity', 'price', 'total', 'completed'];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
