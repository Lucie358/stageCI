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
		foreach ($companies as $entreprise) {
			if (!in_array($entreprise['city'], $cityWanted)) {
				$cityWanted[] = $entreprise['city'];
			}
		}
		$cityInfos = $cityModel->getCityInfos($cityWanted);

		$data = [
			"title" => "Accueil", "companies" => $companies, "cities" => $cityInfos
		];
		//return view('test.php', $data);
		return view('company/index.php', $data);
	}

	public function admin() //Toutes les offres - table CRUD
	{
		$companyModel = new CompanyModel();
		$cityModel = new CityModel();
		$companies = $companyModel->getAll();
		$cityWanted = [];
		foreach ($companies as $entreprise) {
			if (!in_array($entreprise['city'], $cityWanted)) {
				$cityWanted[] = $entreprise['city'];
			}
		}
		$cityInfos = $cityModel->getCityInfos($cityWanted);

		$data = [
			"title" => "Administration",
			"companies" => $companies,
			"cities" => $cityInfos
		];
		return view('company/admin.php', $data);
	}

	public function adminEdit() //Edition des annonces (réservé aux admins)
	{
		$data = [
			"title" => "Modifier l'annonce"
		];
		return view('company/edit.php', $data);
	}

	public function showAdminAdd() //Ajout d’une annonce (réservé aux admins)
	{
		helper('form');
		$cityModel = new CityModel();
		$cities = $cityModel->getAll();

		$data = [
			'title' => 'Creation d\'une nouvelle tache',
			"cities" => $cities
		];

		echo view('company/add', $data);
	}
	public function adminAdd() //Ajout d’une annonce (réservé aux admins)
	{
		helper('form');
		$company = new CompanyModel();
		$contact = new ContactModel();

		$cityModel = new CityModel();
		$cities = $cityModel->getAll();

		$data = [
			'title' => 'Creation d\'une nouvelle tache',
			"cities" => $cities
		];

		if (!$this->validate([
			'name' =>
			'required|min_length[3]|max_length[30]',
			'phone' => 'required|min_length[10]|max_length[10]',
			'mail' => 'required|min_length[3]'
		], [
			'name' => [
				'min_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 30 caractères',
				'max_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 30 caractères',
				'required' => 'Vous devez remplir le nom de l\'entreprise'				
			],
			'phone' => [
				'min_length' => 'Le numéro de téléphone doit avoir 10 chiffres',
				'max_length' => 'Le numéro de téléphone doit avoir 10 chiffres',
				'required' => 'Vous devez remplir le numéro de téléphone'				
			],
			'mail' => [
				'min_length' => 'Le mail doit contenir au moins 3 caratères',
				'required' => 'Vous devez remplir le mail'				
			],
			
		])) {
			echo view('company/add', $data);
		} else {
			$company->save([
				'name' => $this->request->getVar('name'),
				'address' => $this->request->getVar('address'),
				'city' => $this->request->getVar('cities'),
			]);

			$contact->save([
				'firstname' => $this->request->getVar('firstname'),
				'name' => $this->request->getVar('lastname'),
				'phone' => $this->request->getVar('phone'),
				'mail' => $this->request->getVar('mail'),
				'idEnt' => $company->insertID,
			]);

			return redirect('admin');
		}
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
		if (!isset($_SESSION['userData'])) {
			$userModel = new UserModel();
			$userInfos = $userModel->getUserInfos('Visiteur');
			$_SESSION['userData'] = clone $userInfos[0];
		}
	}
}
