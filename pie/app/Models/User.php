<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pwd',
        'email',
    ];

    protected $hidden = [
        'pwd',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'pwd' => 'hashed',
        ];
    }

    public function mainCate()
    {
        return $this->hasMany(MainCate::class);
    }

    public function subCate()
    {
        return $this->hasMany(SubCate::class);
    }

    public function record()
    {
        return $this->hasMany(Record::class);
    }
}
