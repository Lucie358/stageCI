<?php

namespace App\Controllers;

use App\Models\CityModel;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\UserModel;


use CodeIgniter\Controller;

class CompanyController extends BaseController
{


	//Route accueil
	public function index() //Liste des annonces / Page d’accueil
    {
		$this->sessionCheck();

        $companyModel = new CompanyModel();
        $cityModel = new CityModel();

        
        $companies = $companyModel->getAll();

        
        $cityWanted = [];
        foreach($companies as $entreprise)
        {
            if (!in_array( $entreprise['city'],$cityWanted))
            {
            $cityWanted[] = $entreprise['city'];
            }
        }
        $cityInfos = $cityModel->getCityInfos($cityWanted);

        $data = [
             "title" => "Accueil"
            ,"companies" => $companies
            ,"cities" => $cityInfos
        ];
		//return view('test.php', $data);
        return view('company/index.php', $data);
    }

	public function admin() //Toutes les offres - table CRUD
	{
		
		$data = [
			"title" => "Administration"
		];
		return view('company/admin.php');
	}

	public function adminEdit() //Edition des annonces (réservé aux admins)
	{
		$data = [
			"title" => "Modifier l'annonce"
		];
		return view('company/edit.php');
	}

	public function adminAdd() //Ajout d’une annonce (réservé aux admins)
	{
		$data = [
			"title" => "Nouvelle annonce"
		];
		return view('company/add.php');
	}

	public function adminRemove() //Suppression d’une annonces (réservé aux admins)
	{
	}

	public function internship() //Détails de l’annonce “id” (nécessite une connexion)
	{
		$this->sessionCheck();

		$companyModel = new CompanyModel();

		$data = [
			"title" => "Détails", "companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}

	public function companies() //Liste de toutes les entreprises de la BDD
	{
		$this->sessionCheck();
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Annonceurs", "companies" => $companyModel->getAll()
		];
		return view('company/companies.php', $data);
	}

	public function sessionCheck()
	{
		if(!isset($_SESSION['userData']))
		{
			$userModel = new UserModel();
			$userInfos = $userModel->getUserInfos('Visiteur');
			$_SESSION['userData'] = clone $userInfos[0];
		}
	}
}
