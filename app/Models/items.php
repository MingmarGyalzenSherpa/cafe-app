<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use HasFactory;
    use SoftDeletes;
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
