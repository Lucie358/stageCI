<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class MainController extends BaseController
{

    public function siteMap()//Mentions légales
    {
        $this->sessionCheck();
        $data = [
            'title' => 'Plan du site'
        ];
        return view('main/siteMap.php', $data);
    }

    public function legalNotices()//Plan du site
    {
        $this->sessionCheck();
        $data = [
            'title' => 'Mentions légales'
        ];

        return view('main/legalNotices.php', $data);
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
