<?php

namespace App\Http\Controllers\API;

use App\Models\Person;

class PersonController extends BaseApiController
{
    public function __construct(Person $model)
    {
        parent::__construct
        (
            $model,
            [                
                'name' => 'required',
                'active' => 'required'
            ]
        );
    }
}
