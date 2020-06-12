<?php
namespace App\Controllers;

use App\Models\CompanyModel;
use CodeIgniter\Controller;

class CompanyController extends Controller
{
    //Route accueil
    public function index()
	{
		$companyModel = new CompanyModel();

		$data = [
			"companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}


}