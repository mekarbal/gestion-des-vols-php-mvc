<?php
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

if (isset($_POST["reserve"])){
    $reservation = new Reservation();
    $passager = new Passager();

    $reservation->create_new($_POST, ['idFlight', 'idUser']);
    $_POST['idReservation'] = $reservation->get_id();

    $passager->create_new($_POST, ['idUser', 'idFlight', 'idReservation', 'firstname', 'lastname', 'passport']);
    if($reservation->is_has_row() && $passager->is_has_row()){
        $_SESSION['state'] = "success";
        $_SESSION['message'] = "Votre resrvztion ajouter avec successer";
        header("Location: ../view/index.php");
        exit;
    }else{
        $_SESSION['state'] = "danger";
        $_SESSION['message'] = "Vous avez quelque chose erroné";
        header("Location: ../view/reserve.php?id={$_POST['idFlight']}");
    }

}else{
    header("Location: ../view/index.php");
}
?>


