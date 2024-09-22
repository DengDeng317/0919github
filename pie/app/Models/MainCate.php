<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'del_state'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subCate()
    {
        return $this->hasMany(SubCate::class);
    }
}
