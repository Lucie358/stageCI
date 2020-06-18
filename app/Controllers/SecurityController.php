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
      
      if(count($userInfos) > 0)
      {
      $userInfos = $userModel->getUserInfos($_POST['id'])[0];
      }
      else 
      {
        $this->badLoginInfos();
      }

      if(isset($userInfos->pwd) && $_POST['pwd'])
      {
        if($userInfos->pwd == $_POST['pwd'])
        {
          $this->goodLoginInfos($userInfos);
        }
        else 
        {
          $this->badLoginInfos();
        }
      }
      else 
      {
        $this->badLoginInfos();
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
    }

    public function goodLoginInfos($datas)
    {
      $_SESSION['userData'] = clone $datas;
      $data = [
        "title" => "Accueil"
       ,"userData" => $_SESSION['userData']
       ,"datas" => $datas
     ];
      return view('test.php', $data);
    }

    public function badLoginInfos()
    {
      return redirect()->back();
      //header('Location: '.site_url(route_to('login')));
      //return view('security/log-in.php');
    }
}