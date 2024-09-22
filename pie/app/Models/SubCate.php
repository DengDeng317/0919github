<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'del_state',
        'remark'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mainCate()
    {
        return $this->belongsTo(MainCate::class);
    }

    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
