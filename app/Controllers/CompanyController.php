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
		if($_SESSION['userData']->lvlrights > 0)
		{	
			$data = [
				"title" => "Administration",
				"companies" => $companies,
				"cities" => $cityInfos
			];
			return view('company/admin.php', $data);
		}
		else
		{
			return redirect()->route('login');
		}
	}

	public function adminEdit() //Edition des annonces (réservé aux admins)
	{
		if($_SESSION['userData']->lvlrights > 0)
		{
			$data = [
				"title" => "Modifier l'annonce"
			];
			return view('company/edit.php');
		}
		else
		{
			return redirect()->route('login');
		}
	}

	public function adminAdd() //Ajout d’une annonce (réservé aux admins)
	{
		if($_SESSION['userData']->lvlrights > 0)
		{
			$data = [
				"title" => "Nouvelle annonce"
			];
			return view('company/add.php');
		}
		else
		{
			return redirect()->route('login');
		}
	}

	public function adminRemove() //Suppression d’une annonces (réservé aux admins)
	{
	}

	public function internship($id) //Détails de l’annonce “id” (nécessite une connexion)
	{
		$this->sessionCheck();

		
		//si l'utilisateur est connecté
		if($_SESSION['userData']->lvlrights != -1)
		{
			$companyModel = new CompanyModel();
			$contactModel = new ContactModel();
			//on récupère les infos sur l'entreprise en question
			$companyInfos = $companyModel->getCompanyInfos($id);
			$contactInfos = $contactModel->getContactByEn($id);
			//
			$data = [
				"title" => "Détails"
				,"companyInfos" => $companyInfos
				,"contactInfos" => $contactInfos

			];
			return view('company/internship.php', $data);
		}
		else
		{
			return redirect()->route('login');
		}
		
	}

	public function companies() //Liste de toutes les entreprises de la BDD
	{
		$this->sessionCheck();
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Annonceurs"
			, "companies" => $companyModel->getAll()
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
