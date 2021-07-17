<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "notices";

    protected $fillable = [
        'title',
        'body',
        'active'
    ];

    protected $casts = [
        'active' => 'bool'
    ];
}