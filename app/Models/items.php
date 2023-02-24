<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'categories_id', 'price'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function img()
    {
        return $this->hasOne(Img::class);
    }
}
