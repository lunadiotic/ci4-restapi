<?php namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\RESTful\ResourceController;

class Contact extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\ContactModel';

    // protected $model;

    // public function __construct()
    // {
    //     $this->model = new ContactModel();   
    // }

	public function index()
	{
        $data = [
            'message' => 'success',
            'data' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }
    
    public function show($id = null)
    {
        $data = [
            'message' => 'success',
            'data' => $this->model->find($id)
        ];

        return $this->response->setStatusCode(200)->setJSON($data);
    }

    public function create()
    {

        $input = $this->validate(
            $this->model->getValidationRules(), 
            $this->model->getValidationMessages()
        );

        if ($input) {
            $this->model->save($this->request->getPost());
            $response = [
                'message' => 'success',
            ];
            return $this->respond($response, 201);
        } else {
            $response = [
                'message' => 'fail',
                'errors' => $this->validator->getErrors()
            ];
            return $this->respond($response, 422);
        }
    }
    
}
