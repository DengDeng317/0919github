<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table = 'food_categories';

    protected $fillable = [
        'name',
    ];

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
