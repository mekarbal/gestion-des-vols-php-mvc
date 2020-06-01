<?php
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

$vol = new Vol();
if (isset($_POST["addPlane"])){

  $vol->create_new($_POST, ["plane", "Dplocation", "Dslocation", "dateFlight","hour_flight","minute_flight",  "places", "price", "isActive"]);
    $_SESSION['state'] = "success";
    $_SESSION['message'] = "Le vol ajouter avec successer";
    header("Location: ../view/gestion_admin.php");
    
}else if (isset($_POST["switch"])){
  $vol->get_by_id($_POST["switch"]);
  $change = ($vol->get_data()["is_active"] == 0) ? 1 : 0;
  $vol->update_row(array("is_active" => $change));
  $_SESSION['state'] = "danger";
  $_SESSION['message'] = ($change == 0) ? "le Vol bien Annulé" : "le Vol est activé";
  header("Location: ../view/gestion_admin.php");
}
else {
  header("Location: ../view/index.php");
}
?>