<?php

namespace App\Http\Controllers\API;


use App\Models\Book;

class BookController extends BaseApiController
{
    public function __construct(Book $model)
    {
        parent::__construct
        (
            $model,
            [
                'title' => 'required',
                'descripition' => 'required',
                'active' => 'required'
            ]
        );
    }
}
