<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller
{


    public function siteMap()
    {
        return view('siteMap.php');
    }

    public function legalNotices()
    {
        $data = [
            'title' => 'Mentions légales'
        ];

        return view('legalNotices.php', $data);
    }
}
