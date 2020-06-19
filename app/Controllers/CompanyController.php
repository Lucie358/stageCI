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

		if ($_SESSION['userData']->lvlrights > 0) {
			$data = [
				"title" => "Administration",
				"companies" => $companies,
				"cities" => $cityInfos
			];
			return view('company/admin.php', $data);
		} else {
			return redirect()->route('login');
		}
	}

	public function adminEdit($id) //Edition des annonces (réservé aux admins)
	{
		if ($_SESSION['userData']->lvlrights > 0) 
		{
			helper('form');
			$contactModel = new ContactModel();
			$contactInfos = $contactModel->getContactByEn($id);
			
			$companyModel = new CompanyModel();
			$companyInfos = $companyModel->getCompanyInfos($id);

			$cityModel = new CityModel();
			$cities = $cityModel->getAll();

			$data = [
				"title" => "Modifier l'annonce"
				,"contact" => $contactInfos
				,"company" => $companyInfos
				,"cities" => $cities
			];
			return view('company/edit.php',$data);
		}
		 else 
		{
			return redirect()->route('login');
		}
	}

	public function adminUpdate()//récupération et mise à jour des données
	{
		helper('form');
		$contactModel = new ContactModel();
		$contactInfos = $contactModel->getContactByEn($this->request->getVar('id'));
		
		$companyModel = new CompanyModel();
		$companyInfos = $companyModel->getCompanyInfos($this->request->getVar('id'));

		$cityModel = new CityModel();
		$cities = $cityModel->getAll();

		

		if ($_SESSION['userData']->lvlrights > 0) 
		{

			//verification des données et mise à jour

			if (!$this->validate(
				[
					'name' =>
					'required|min_length[3]|max_length[50]',
					'phone' => 'required|min_length[10]|max_length[10]',
					'mail' => 'required|min_length[3]',
					'firstname' => 'required|min_length[3]',
					'lastname' => 'required|min_length[3]',
					'address' => 'required|min_length[3]',

				],
				[
					'name' => [
						'min_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 50 caractères',
						'max_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 50 caractères',
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
					'firstname' => [
						'min_length' => 'Le prénom doit contenir au moins 3 caratères',
						'required' => 'Vous devez remplir le prénom'
					],
					'lastname' => [
						'min_length' => 'Le nom doit contenir au moins 3 caratères',
						'required' => 'Vous devez remplir le nom'
					],
					'address' => [
						'min_length' => 'L\'adresse doit contenir au moins 3 caractères',
						'required' => 'Vous devez remplir l\'adresse'
					]
				]
			)) {
				$data = [
					"title" => "Modifier l'annonce"
					,"contact" => $contactInfos
					,"company" => $companyInfos
					,"cities" => $cities
				];
				return view('company/edit.php',$data);
			} 
			else 
			{
				//on ajoute les données
				$companyModel->update($this->request->getVar('id'),[
					'name' => $this->request->getVar('name'),
					'address' => $this->request->getVar('address'),
					'city' => $this->request->getVar('cities'),
				]);

				$contactModel
				->where('idEnt', $this->request->getVar('id'))
				->set([
					'firstname' => $this->request->getVar('firstname'),
					'name' => $this->request->getVar('lastname'),
					'phone' => $this->request->getVar('phone'),
					'mail' => $this->request->getVar('mail'),
				])
				->update();

				return redirect()->route('admin');
			}
		} else {
			return redirect()->route('login');
		}
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

		if ($_SESSION['userData']->lvlrights > 0) {
			$data = [
				'title' => 'Creation d\'une nouvelle tache',
				"cities" => $cities
			];

			if (!$this->validate(
				[
					'name' =>
					'required|min_length[3]|max_length[50]',
					'phone' => 'required|min_length[10]|max_length[10]',
					'mail' => 'required|min_length[3]',
					'firstname' => 'required|min_length[3]',
					'lastname' => 'required|min_length[3]',
					'address' => 'required|min_length[3]',
					'pic'=>'uploaded[pic]'
				],
				[
					'name' => [
						'min_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 50 caractères',
						'max_length' => 'Le nom de l\'entreprise doit être compris entre 3 et 50 caractères',
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
					'firstname' => [
						'min_length' => 'Le prénom doit contenir au moins 3 caratères',
						'required' => 'Vous devez remplir le prénom'
					],
					'lastname' => [
						'min_length' => 'Le nom doit contenir au moins 3 caratères',
						'required' => 'Vous devez remplir le nom'
					],
					'address' => [
						'min_length' => 'L\'adresse doit contenir au moins 3 caractères',
						'required' => 'Vous devez remplir l\'adresse'
					],
					'pic' => [
						'uploaded' => 'Un fichier doit être transmis',
					]
				]
			)) {
				echo view('company/add', $data);
			} else {

				$file = $this->request->getFile('picEnt');
				$nameCompany = $this->request->getVar('name');
				if ($file->isValid() && !$file->hasMoved()) {
					$file->move('./img/uploads', $file->getRandomName());
					// var_dump($file->getName());
					// exit;

					$company->save([
					'name' => $this->request->getVar('name'),
					'address' => $this->request->getVar('address'),
					'city' => $this->request->getVar('cities'),
					'pic' => $file->getName()
				]);

				$contact->save([
					'firstname' => $this->request->getVar('firstname'),
					'name' => $this->request->getVar('lastname'),
					'phone' => $this->request->getVar('phone'),
					'mail' => $this->request->getVar('mail'),
					'idEnt' => $company->insertID,
				]);
				}
					
				return redirect('admin');
			}
		} else {
			return redirect()->route('login');
		}
	}



	public function adminRemove($id) //Suppression d’une annonces (réservé aux admins)
	{

		if ($_SESSION['userData']->lvlrights > 0) {
			$contactModel = new ContactModel();
			$contactModel->deleteContactByEnt($id);
			$companyModel = new CompanyModel();
			$companyModel->deleteCompanyByID($id);
			return redirect()->route('admin');
		} else {
			return redirect()->route('login');
		}
	}

	public function internship($id) //Détails de l’annonce “id” (nécessite une connexion)
	{
		$this->sessionCheck();


		//si l'utilisateur est connecté
		if ($_SESSION['userData']->lvlrights != -1) {
			$companyModel = new CompanyModel();
			$contactModel = new ContactModel();
			//on récupère les infos sur l'entreprise en question
			$companyInfos = $companyModel->getCompanyInfos($id);
			$contactInfos = $contactModel->getContactByEn($id);
			//
			$data = [
				"title" => "Détails", "companyInfos" => $companyInfos, "contactInfos" => $contactInfos

			];
			return view('company/internship.php', $data);
		} else {
			return redirect()->route('login');
		}
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
