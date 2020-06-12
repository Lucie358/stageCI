<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CompanyController extends Controller
{
    //Route accueil
    public function index()
	{
		return view('company/index.php');
	}


}