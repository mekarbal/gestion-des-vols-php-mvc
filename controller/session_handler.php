<?php
session_start();
function logout_prepare(){
    if(isset($_SESSION) && isset($_GET['log']) && $_GET['log'] == "out"){
        session_destroy();
        header("Location: index.php");
    }
}
function message(){
    $message = "";
    if(isset($_SESSION["message"]) && isset($_SESSION["state"])){
        $message .= "<div class='alert alert-{$_SESSION["state"]} alert-dismissible'>";
        $message .= "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
        $message .= "{$_SESSION["message"]}.</div>";
        unset($_SESSION["message"]);
        unset($_SESSION["state"]);
    }
    return $message;
}
?>