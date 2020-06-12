<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'City';
    protected $name = ['name'];
    protected $department = ['department'];
    protected $region = ['region'];
    protected $country = ['country'];
    protected $continent = ['continent'];
    protected $latitude = ['latitude'];
    protected $longitude = ['longitude'];




    public function getAll()
    {
        return $this->findAll();
    }
}
