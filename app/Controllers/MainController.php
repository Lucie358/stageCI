<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller
{

    public function siteMap()
    {
        return view('main/siteMap.php');
    }

    public function legalNotices()
    {
        return view('main/legalNotices.php');
    }
}
