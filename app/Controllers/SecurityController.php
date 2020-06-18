<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SecurityController extends BaseController
{
 
    public function login() //Pour se connecter
    {
		  return view('security/log-in.php');
    }

    public function authentication()
    {
      $userModel = new UserModel();
      $userInfos = $userModel->getUserInfos($_POST['id']);
      $autorized = false;

        if(count($userInfos) > 0)
        {
          $userInfos = $userModel->getUserInfos($_POST['id'])[0];
        }

        if(isset($userInfos->pwd) && $_POST['pwd'])
        {
            if($userInfos->pwd == $_POST['pwd'])
            {
              $autorized = true;
            }

        }


        if($autorized)
        {
          $_SESSION['userData'] = clone $userInfos;
                $data = [
                  "title" => "Accueil"
              ];
              return redirect()->route('index');
        }
        else
        {
          return view('security/log-in.php');
        }
    }

    public function signIn() //Pour s’inscrire
    {
		  return view('security/sign-in.php');
    }

    public function addMember() //Pour s’inscrire
    {
		  return view('security/sign-in.php');
    }

    public function logOut() //Pour se déconnecter
    {
        //logout
        session_destroy();
        return redirect()->route('index');
    }

    /*public function goodLoginInfos($info)
    {
      $_SESSION['userData'] = clone $info;
      $data = [
        "title" => "Accueil"
       ,"userData" => $_SESSION['userData']
     ];
    return view('test.php', $data);
    }

    public function badLoginInfos()
    {
      //return redirect()->route('index');
      //header('Location: '.site_url(route_to('login')));
      
      
    }*/
}