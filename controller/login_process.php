<?php 
require_once("../controller/session_handler.php");
require_once("../model/functions.php");

$user = new User();
if (isset($_POST["singin"])){

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
        $_SESSION['message'] = "Your account is created successfully";
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
      $_SESSION['message'] = "Welcome back!";
      header("Location: ../view/index.php");
      exit;
    }
  }else{
    $_SESSION['state'] = "danger";
    $_SESSION['message'] = "The email or the password is not correct";
    header("Location: ../view/sing.php");
  }
}else {
  header("Location: ../view/index.php");
}
?>