<?php
namespace App\Controllers;

use App\Models\CompanyModel;
use CodeIgniter\Controller;

class CompanyController extends Controller
{
    //Route accueil
    public function index() //Liste des annonces / Page d’accueil
	{
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Accueil",
			"companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}

	public function admin() //Toutes les offres - table CRUD
	{
		return view('company/admin.php');
	}

	public function adminEdit() //Edition des annonces (réservé aux admins)
	{
		return view('company/edit.php');
		
	}

	public function adminAdd() //Ajout d’une annonce (réservé aux admins)
	{
		return view('company/add.php');
	}

	public function adminRemove() //Suppression d’une annonces (réservé aux admins)
	{
		
	}

	public function internship() //Détails de l’annonce “id” (nécessite une connexion)
	{
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Entreprise",
			"companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}

	public function companies() //Liste de toutes les entreprises de la BDD
	{
		$companyModel = new CompanyModel();

		$data = [
			"title" => "Accueil",

			"companies" => $companyModel->getAll()
		];
		return view('company/companies.php', $data);
	}
}