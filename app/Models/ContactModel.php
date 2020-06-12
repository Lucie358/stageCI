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
}
