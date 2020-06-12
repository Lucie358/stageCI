<?php
namespace App\Controllers;

use App\Models\CityModel;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\UserModel;


use CodeIgniter\Controller;

class CompanyController extends Controller
{
    //Route accueil
    public function index() //Liste des annonces / Page d’accueil
	{
		$companyModel = new CompanyModel();

		$data = [
			 "title" => "Acceuil"
			,"companies" => $companyModel->getAll()
		];
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
		$companyModel = new CompanyModel();

		$data = [
			 "title" => "Détails"
			,"companies" => $companyModel->getAll()
		];
		return view('company/index.php', $data);
	}

	public function companies() //Liste de toutes les entreprises de la BDD
	{
		$companyModel = new CompanyModel();

		$data = [
			 "title" => "Annonceurs"
			,"companies" => $companyModel->getAll()
		];
		return view('company/companies.php', $data);
	}
}