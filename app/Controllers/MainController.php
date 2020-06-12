<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller
{

    public function siteMap()//Mentions légales
    {
        return view('main/siteMap.php');
    }

    public function legalNotices()//Plan du site
    {
        return view('main/legalNotices.php');
    }
}
