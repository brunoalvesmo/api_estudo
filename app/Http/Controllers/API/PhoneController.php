<?php

namespace App\Http\Controllers\API;

use App\Models\Phone;

class PhoneController extends BaseApiController
{
    public function __construct(Phone $model)
    {
        parent::__construct
        (
            $model,
            [
                'person_id' => 'required',
                'ddd' => 'required',
                'number' => 'required'
            ]
        );
    }
}
