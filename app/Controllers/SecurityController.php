<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SecurityController extends BaseController
{

  public function login() //Pour se connecter
  {
    $data = [
      "title" => "Inscription", "message" => ''
    ];
    return view('security/log-in.php', $data);
  }


  public function authentication()
  {
    $userModel = new UserModel();
    $userInfos = $userModel->getUserInfos($_POST['id']);
    $autorized = false;

    if (count($userInfos) > 0) {
      
      $userInfos = $userModel->getUserInfos($_POST['id'])[0];
    }

    if (isset($userInfos->pwd) && $_POST['pwd']) 
    {
      if (password_verify($_POST['pwd'],$userInfos->pwd)) 
      {
        $autorized = true;
      }
    }
    if ($autorized) {
      $_SESSION['userData'] = clone $userInfos;
      return redirect()->route('index');
    } else {
      $data = [
        "title" => "Inscription", "message" => 'Informations incorrectes'
      ];
      return view('security/log-in.php', $data);
    }
  }



  public function signIn() //Pour s’inscrire
  {
    $data = [
      "title" => "Inscription", "message" => ''
    ];
    return view('security/sign-in.php', $data);
  }

  public function addMember() //Pour s’inscrire
  {

    $userModel = new UserModel();

    //Infos récupérées
    $mdp1 = $_POST['pwd1'];
    $mdp2 = $_POST['pwd2'];
    $id = $_POST['id'];

    //l'ajout est il réussi ?
    $sucess = false;

    //message qu'on affichera à l'utilisateur en cas d'erreur
    $message = '';

    if ($mdp1 == $mdp2) 
    {
      $userInfos = $userModel->getUserInfos($id);
      
      if (count($userInfos) == 0) 
      {
        $db      = \Config\Database::connect();
        $hashed_password = password_hash($mdp1, PASSWORD_DEFAULT);
        $builder = $db->table('User');
        //on fait la requete d'ajout
        $new_user = [
          'username' => $id, 'firstname'  => $_POST['firstname'], 'name'  => $_POST['name'], 'pwd'  => $hashed_password
        ];
        $builder->insert($new_user);
        $sucess = true;
      } else {
        $message .= 'Ce nom d\'utilisateur est indisponible ';
      }
    } else {
      $message .= 'Les mots de passe entrés diffèrent ';
    }

    if ($sucess) {
      return redirect()->route('login');
    } else {
      $data = [
        "title" => "Inscription", "message" => $message
      ];
      return view('security/sign-in.php', $data);
    }
  }





  public function logOut() //Pour se déconnecter
  {
    //logout
    session_destroy();
    return redirect()->route('index');
  }
}
