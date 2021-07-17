<?php

namespace App\Http\Controllers\API;

use App\Models\Author;

class AuthorController extends BaseApiController
{
    public function __construct(Author $model)
    {
        parent::__construct
        (
            $model,
            [
                'name' => 'required',
                'age' => 'required',
                'genere' => 'required',
                'active' => 'required'
            ]
        );
    }
}
