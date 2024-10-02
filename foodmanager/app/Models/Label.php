<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';

    protected $fillable = [
        'name',
    ];

    // 定義自關聯關係 (一個標籤可以有多個子標籤)
    public function children()
    {
        return $this->hasMany(Label::class, 'parent_id');
    }

    // 定義父標籤的關係
    public function parent()
    {
        return $this->belongsTo(Label::class, 'parent_id');
    }
}
