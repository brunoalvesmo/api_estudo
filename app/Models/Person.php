<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'name', 'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function address()
    {
        //     $this->hasOne(relacao, chave estrangeira, primary key);
        return $this->hasOne(Address::class, 'person_id', 'id');
    }

    public function phones()
    {
        //     $this->hasMany(relação, chave estrangeira da relação, primary key local);
        return $this->hasMany(Phone::class, 'person_id', 'id');
    }
}
