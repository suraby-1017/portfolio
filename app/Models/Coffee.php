<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    public $guarded = ['id', 'created_at'];

    // protected $table = 'coffees';

    protected $fillable = [
        'image',
    ];
}
