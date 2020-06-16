<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

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

    public function getCityInfos($cityname)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('City');
        //$builder->db->table('City');
        $builder->select('*');
        if (isset($cityname))
        {
            $builder->where('name', $cityname);
        }
        $query = $builder->get();
        return $query->getResult();
    }
}
