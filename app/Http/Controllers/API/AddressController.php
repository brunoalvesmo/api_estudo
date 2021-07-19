<?php

namespace App\Http\Controllers\API;

use App\Models\Address;

class AddressController extends BaseApiController
{
    public function __construct(Address $model)
    {
        parent::__construct
        (
            $model,
            [
                'person_id' => 'required',
                'street' => 'required',
                'number' => 'required'
            ]
        );
    }
}
