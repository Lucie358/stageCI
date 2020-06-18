<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'Contact';
    protected $id = ['id'];
    protected $firstname = ['firstname'];
    protected $name = ['name'];
    protected $mail = ['mail'];
    protected $phone = ['phone'];
    protected $idEnt = ['idEnt'];




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
}
