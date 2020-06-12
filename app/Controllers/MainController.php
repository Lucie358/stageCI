<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller
{

    public function siteMap()//Mentions légales
    {
        return view('siteMap.php');
    }

    public function legalNotices()//Plan du site
    {
        $data = [
            'title' => 'Mentions légales'
        ];

        return view('legalNotices.php', $data);
    }
}
