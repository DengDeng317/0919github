<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'quantity',
        'expiration_date',
        'status',
    ];

    // 定義與 Label 的關聯 (多對一)
    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    // 定義與 User 的關聯 (多對一)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food_history()
    {
        return $this->hasMany(FoodHistory::class);
    }

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }
}
