<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodHistory extends Model
{
    use HasFactory;

    protected $table = 'food_histories';

    protected $fillable = [
        'action_date',
        'action_type',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
