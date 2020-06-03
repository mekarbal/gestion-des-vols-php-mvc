<?php 
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");


if (isset($_POST["signin"])){

  open_connetion();
  $user = new User();
  $user->add_new($_POST, ["first_name", "last_name", "cin","passport", "address",  "email", "pass", "phone"]);

  if($user->row()){
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
        $_SESSION['message'] = "Votre copmte est créer avec successer ". $_SESSION['firstname'];
        header("Location: ../view/index.php");
        exit;
    }
  }
  close_connection();

} elseif(isset($_POST["login"])){

  open_connetion();
  $user = new User();

  $user->login($_POST, ["login_email", "login_pwd"]);
  if($user->row()){

    $_SESSION['id'] = $user->get_id();
    $_SESSION['firstname'] = $user->get_data()["first_name"];
    $_SESSION['lastname'] = $user->get_data()["last_name"];
    $_SESSION['passport'] = $user->get_data()["passport"];
    $_SESSION['role'] = $user->get_data()["role"];

    if(isset($_GET['id'])){
      header("Location: ../view/reserve.php?id={$_GET['id']}");
      exit;
    }else{
      $_SESSION['state'] = "success ";
      $_SESSION['message'] = "Bonjour  ".$_SESSION['firstname'] ." Vous êtes maintenant dans votre Compte ";
      header("Location: ../view/index.php");
      exit;
    }
  }else{
    $_SESSION['state'] = "danger";
    $_SESSION['message'] = "Email ou mot de passe incorrect Ressayer aurtre fois";
    header("Location: ../view/sign.php");
  }
  close_connection();
}else {
  header("Location: ../view/index.php");
}
?>