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

    public function getUserInfos($username)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('User');
        $builder->select('*');
        if (isset($username))
        {
            $builder->where('username', $username);
        }
        $query = $builder->get();
        return $query->getResult();
    }
}
