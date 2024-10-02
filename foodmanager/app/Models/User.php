<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'email'
    ];

    protected $hidden = [
        'password',
    ];

    public function reminder()
    {
        return $this->hasMany(Reminder::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

}
