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

    public function personAddOrUpdateAddress($id)
    {
        $data = request()->all();
        $errors = [
            'person_id' => 'required',
            'street' => 'required',
            'number' => 'required'
        ];
        $validate = $this->validation($errors);
        if ($validate->fails) {            
            return $this->badRequest($validate->errors); 
        }
        $model = $this->model->find($id);
        if ($model) {
            $address = $model->address()->first();
            if ($address) {
                $address->update($data);
                $model->load('address');
                return $this->ok($model);
            } else {
                $model->address()->create($data);
                $model->load('address');
                return $this->created($model);
            }
        }
        return $this->notFound();
    }

    public function showAddress($id) 
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->load('address');
            return $this->ok($model);
        }
        return $this->notFound();
    }
}
