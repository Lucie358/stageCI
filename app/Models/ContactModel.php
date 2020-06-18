<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'Contact';
    protected $allowedFields = ['name', 'firstname', 'mail','phone','idEnt'];





    public function getAll()
    {
        return $this->findAll();
    }
}
