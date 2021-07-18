<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'ddd', 'number','person_id'
    ];

    public function person()
    {
        //     $this->belongsTo(relação, chave estrangeira local, primary key da relação);
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
