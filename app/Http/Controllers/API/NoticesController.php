<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticesController extends Controller
{
    private $model;

    public function __construct(Notice $model) 
    {
        $this->model = $model;
    }

    //Mostra todos os registros
    public function index()
    {
        return response()
            ->json($this->model->all(), 200);
    }

    //Mostra registro por id
    public function show($id)
    {
        return response()
            ->json($this->model->find($id), 200);
    }

    //Criar registro
    public function store(Request $request)
    {
        $model = $this->model->create($request->all());
        return response()
            ->json($model, 201);
    }

    //Atualizar registro por id
    public function update(Request $request, $id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->fill($request->all());
            $model->save();
            return response()
                ->json($model, 200);
        }
        return response()
            ->json(['status' => 'error'], 404);
    }

    //Excluir registro por id
    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return response()
                ->json(['status' => 'Removed Success'], 200);
        }
        return response()
            ->json(['status' => 'error'], 404);
    }
}
