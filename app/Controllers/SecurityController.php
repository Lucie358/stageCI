<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class SecurityController extends Controller
{
 
    public function login() //Pour se connecter
    {
		return view('security/log-in.php');

    }

    public function signIn() //Pour s’inscrire
    {
		return view('security/sign-in.php');
    }

    public function logOut() //Pour se déconnecter
    {
        //logout
    }

}