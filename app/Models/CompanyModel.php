<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'Company';
    protected $name = ['name'];
    protected $address = ['address'];
    protected $city = ['city'];



    public function getAll()
    {
        return $this->findAll();
    }
}
