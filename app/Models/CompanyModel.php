<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'Company';
    protected $primaryKey = 'id';
    protected $name = 'name';
    protected $address = 'address';

    protected $city = 'city';

    public function getCities(){
      

    }




}
