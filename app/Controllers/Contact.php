<?php namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ContactModel();   
    }
    
	public function index()
	{
        $data = [
            'message' => 'success',
            'data' => $this->model->findAll()
        ];

        return $this->response->setStatusCode(200)->setJSON($data);
	}

	//--------------------------------------------------------------------

}
