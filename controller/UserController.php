<?php 
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

$user = new User();
if (isset($_POST["sigin"])){

  $user->create_new($_POST, ["fname", "lname", "bday", "nation", "passport", "idcard", "email", "phone", "pswd"]);

  if($user->is_has_row()){
      $_SESSION['id'] = $user->get_id();
      $_SESSION['firstname'] = $user->get_data()["first_name"];
      $_SESSION['lastname'] = $user->get_data()["last_name"];
      $_SESSION['passport'] = $user->get_data()["passport"];
      $_SESSION['role'] = $user->get_data()["role"];
      if(isset($_GET['id'])){
      header("Location: ../view/reserve.php?id={$_GET['id']}");
      exit;
    }else{
        $_SESSION['state'] = "success";
        $_SESSION['message'] = "Votre Compte Creer avec Successer <i class='far fa-smile'></i>";
        header("Location: ../view/index.php");
        exit;
    }
  }
} elseif(isset($_POST["login"])){
  $user->login($_POST, ["lgemail", "lgpswd"]);
  if($user->is_has_row()){

    $_SESSION['id'] = $user->get_id();
    $_SESSION['firstname'] = $user->get_data()["first_name"];
    $_SESSION['lastname'] = $user->get_data()["last_name"];
    $_SESSION['passport'] = $user->get_data()["passport"];
    $_SESSION['role'] = $user->get_data()["role"];

    if(isset($_GET['id'])){
      header("Location: ../view/reserve.php?id={$_GET['id']}");
      exit;
    }else{
      $_SESSION['state'] = "success";
      $_SESSION['message'] = "Soyez Bienvenu Dans Votre Compte<i class='far fa-smile'></i>";
      header("Location: ../view/index.php");
      exit;
    }
  }else{
    $_SESSION['state'] = "danger";
    $_SESSION['message'] = "Email ou password incorrect";
    header("Location: ../view/sign.php");
  }
}else {
  header("Location: ../view/index.php");
}
?>