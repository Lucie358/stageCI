<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SecurityController extends BaseController
{
 
    public function login() //Pour se connecter
    {
		return view('security/log-in.php');
    }

    public function authentication()
    {
    return view('security/log-in.php');
    }

    public function signIn() //Pour s’inscrire
    {
		return view('security/sign-in.php');
    }

    public function addMember() //Pour s’inscrire
    {
		return view('security/sign-in.php');
    }

    public function logOut() //Pour se déconnecter
    {
        //logout
    }

}