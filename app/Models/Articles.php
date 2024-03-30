<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    // 変更されたくないカラムを指定
    public $guarded = ['id', 'created_at'];
}
