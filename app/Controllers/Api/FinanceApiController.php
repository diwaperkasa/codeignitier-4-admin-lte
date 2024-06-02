<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\FinanceModel;

class FinanceApiController extends ResourceController
{
    use ResponseTrait;

    public function list()
    {
        $model = new FinanceModel();
        $data = [
            "message" => "success",
            "result" => $model->getDatatable()
        ];

        return $this->respond($data);
    }

    public function create()
    {
        $request = $this->request->getPost();
        $model = new FinanceModel();
        $model->insert($request);

        $data = [
            "message" => "success",
            "result" => $request
        ];

        return $this->respond($data);
    }

    public function update($id = null)
    {
        $model = new FinanceModel();
        $model->find($id);

        if (empty($model)) {
            throw new \CodeIgniter\HTTP\Exceptions\HTTPException("Entity not found", 404);
        }

        $request = $this->request->getPost();
        $model->update($id, $request);

        $data = [
            "message" => "success",
            "result" => $request
        ];

        return $this->respond($data);
    }

    public function delete($id = null)
    {
        $model = new FinanceModel();
        $model->find($id);

        if (empty($model)) {
            throw new \CodeIgniter\HTTP\Exceptions\HTTPException("Entity not found", 404);
        }

        $model->delete($id);

        $data = [
            "message" => "success",
            "result" => [
                "id" => $id
            ]
        ];

        return $this->respond($data);
    }
}