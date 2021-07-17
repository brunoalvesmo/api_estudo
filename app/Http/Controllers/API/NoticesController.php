<?php

namespace App\Http\Controllers\API;

use App\Models\Notice;

class NoticesController extends BaseApiController
{
    public function __construct(Notice $model) 
    {
        parent::__construct(
            $model, 
            [
                'title' => 'required',
                'body' => 'required',
                'active' => 'required'
            ]
        );
    }
}
