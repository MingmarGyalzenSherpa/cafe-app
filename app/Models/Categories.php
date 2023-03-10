<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    public $fillable = ['cat_name'];

    public function items()
    {
        return $this->hasMany(Items::class);
    }
}
