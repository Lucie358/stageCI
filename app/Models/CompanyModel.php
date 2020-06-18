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

    public function getCompanyInfos($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Company');
        $builder->select('*');
        if (isset($id) && is_numeric($id))
        {
            $builder->where('id', $id);
        }
        $query = $builder->get();
        return $query->getResult()[0];
    }
}
