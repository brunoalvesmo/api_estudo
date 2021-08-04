<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'person_id';
    public $incrementing = false;
    
    protected $fillable = [
        'street', 'number', 'person_id'
    ];

    public function person()
    {
        //     $this->belongsTo(relação, chave estrangeira local, primary key da relação);
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
