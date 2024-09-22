<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'exp_date',
        'img',
        'place',
        'price',
        'amount',
        'remark',
        'del_state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mainCate()
    {
        return $this->belongsTo(MainCate::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
