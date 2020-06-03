<?php
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

// processuss of flight
$vol = new Vol();
if (isset($_POST["add_flight"])){

  $vol->add_new($_POST, ["plane", "Dplocation", "Dslocation", "dateFlight","hour_flight","minute_flight",  "places", "price", "isActive"]);
       $_SESSION['state'] = "success";
       $_SESSION['message'] = "Le vol ajouter avec successer";
    header("Location: ../view/gestion_admin.php");
    
}else if (isset($_POST["change"])){
          $vol->get_by_id($_POST["change"]);
          $change = ($vol->get_data()["statut"] == 0) ? 1 : 0;
          $vol->update_row_table(array("statut" => $change));
          $_SESSION['state'] = "danger";
          $_SESSION['message'] = ($change == 0) ? "le Vol bien Annulé" : "le Vol est activé";
          header("Location: ../view/gestion_admin.php");
}
else {
          header("Location: ../view/index.php");
}

//processsuss of reservation
if (isset($_POST["reserve"])){
      $reservation = new Reservation();
      $passager = new Passager();

      $reservation->add_new($_POST, ['idFlight', 'idUser']);
      $_POST['idReservation'] = $reservation->get_id();

      $passager->add_new($_POST, ['idUser', 'idFlight', 'idReservation', 'firstname', 'lastname', 'passport']);
  if($reservation->row() && $passager->row()){
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

//detaits de la reservation 

if (isset($_REQUEST["id"]) && isset($_SESSION["id"])){
      $passager = new Passager();
      $flight = new Vol();
      $reserve = new Reservation();

      $passager->get_by_id($_REQUEST["id"]);
      $flight->get_by_id($passager->get_data()["id_flight"]);
      $reserve->get_by_id($passager->get_data()["id_resevation"]);

  $getData = [
      "passager" => $passager->get_data(),
      "flight" => $flight->get_data(),
      "reserve" => $reserve->get_data()
  ];
  echo json_encode($getData);
}
?>