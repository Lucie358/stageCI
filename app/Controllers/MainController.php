<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller
{

    public function siteMap()//Mentions légales
    {
        $data = [
            'title' => 'Plan du site'
        ];
        return view('main/siteMap.php', $data);
    }

    public function legalNotices()//Plan du site
    {
        $data = [
            'title' => 'Mentions légales'
        ];

        return view('main/legalNotices.php', $data);
    }
}
