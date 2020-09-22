<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'number'];

    protected $validationRules = [
        'name' => 'required',
        'number' => 'required|numeric|max_length[15]'
    ];

    protected $validationMessages = [
        'name'        => [
            'required' => 'Maaf. Nama harus di isi'
        ],
        'numeric' => [
            'max_length' => 'Waduh, bro! Kebanyakan!'
        ]
    ];
}
