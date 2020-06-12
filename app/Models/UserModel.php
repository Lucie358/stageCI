<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'User';
    protected $id = ['id'];
    protected $username = ['username'];
    protected $firstname = ['firstname'];
    protected $name = ['name'];
    protected $pwd = ['pwd'];
    protected $lvlrights = ['lvlrights'];




    public function getAll()
    {
        return $this->findAll();
    }
}
