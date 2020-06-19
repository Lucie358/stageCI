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

    public function getContactByEn($idEnt)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('Contact');
        $builder->select('*');

        if (isset($idEnt) && is_numeric($idEnt))
        {
            $builder->where('idEnt', $idEnt);
        }

        $query = $builder->get();


         $result = $query->getResult();

        if(count($result) > 0)
        {
           return $result[0];
        }
        else
        {
            return false;
        }
    }

    public function deleteContactByEnt($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Contact');
        $builder->where('idEnt', $id);
        $builder->delete();
    }
}
