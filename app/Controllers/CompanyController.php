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
			"title" => "Accueil",
			"companies" => $companies,
			"cities" => $cityInfos
		];

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

	public function adminAdd() //Ajout d’une annonce (réservé aux admins)
	{
        helper('form');
		$company = new CompanyModel();
		$contact = new ContactModel();
		$cityModel = new CityModel();
		$cities = $cityModel->getAll();

		$data=['title' => 'Creation d\'une nouvelle
		tache', "cities" => $cities];

		echo view('company/add',$data);

		if ($this->validate(['name' =>
        'required|min_length[3]|max_length[30]'])) {
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
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Détails", "companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}

	public function companies() //Liste de toutes les entreprises de la BDD
	{
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Annonceurs", "companies" => $companyModel->getAll()
		];
		return view('company/companies.php', $data);
	}
}
