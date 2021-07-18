<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

abstract class BaseApiController extends BaseController
{
    protected $model;
    protected $errors = [];

    public function __construct($model, $errors) 
    {
        $this->model = $model;
        $this->errors = $errors;
    }

    protected function validation(array $errors = array()): stdClass 
    {
        $validator = Validator::make(
            request()->all(), 
            count($errors) === 0 ? $this->errors: $errors
        );
        $data = new stdClass;
        $data->fails = $validator->fails();
        $data->errors = $validator->errors();
        return $data;
    }

    //Mostra todos os registros
    public function index()
    {
        return $this->ok($this->model->all());
    }

    //Mostra registro por id
    public function show($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            return $this->ok($model);
        }
        return $this->notFound();
    }

    //Criar registro
    public function store(Request $request)
    {
        //Validacao
        $validate = $this->validation();
        if ($validate->fails) {            
            return $this->badRequest($validate->errors); 
        }
        //
        $model = $this->model->create($request->all());
        if ($model) {
            return $this->created($model);
        }
        return $this->badRequest();
    }

    //Atualizar registro por id
    public function update(Request $request, $id)
    {
        //Validação
        $validate = $this->validation();
        if ($validate->fails) {
            return $this->badRequest($validate->errors);    
        }
        //////////////
        $model = $this->model->find($id);
        if ($model) {
            $model->fill($request->all());
            if ($model->save()){
                return $this->ok($model, 200);
            }
        }
        return $this->notFound();
    }

    //Excluir registro por id
    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            if ($model->delete()) {
                return $this->responseRemoved();
            }
        }
        return $this->notFound();
    }

    //Responses
    protected function ok($data): JsonResponse
    {
        return response()->json($data, 200);
    }

    protected function created($data): JsonResponse
    {
        return response()->json($data, 201);
    }

    protected function notFound(): JsonResponse
    {
        return response()->json(['status' => 'not found'], 404);
    }

    protected function badRequest(MessageBag $errors = null): JsonResponse 
    {
        if ($errors) {
            return response()->json($errors, 400);    
        }
        return response()->json(['status' => 'bad request'], 400);
    }

    protected function responseRemoved(): JsonResponse 
    {
        return response()->json(['status' => 'Removed Success'], 200);
    }
}