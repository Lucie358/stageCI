<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'Company';
    protected $allowedFields = ['name', 'address', 'city'];



    public function getAll()
    {
        return $this->findAll();
    }
}
