<?php
require_once("../controller/session_handler.php");
require_once("../model/functions.php");

$flight = new Flight();
if (isset($_POST["addPlane"])){

  $flight->create_new($_POST, ["plane", "Dplocation", "Dslocation", "dateFlight",  "places", "price", "isActive"]);
    $_SESSION['state'] = "success";
    $_SESSION['message'] = "A flight is added successfully";
    header("Location: ../view/flights_manager.php");
    
}elseif (isset($_POST["switch"])){
  $flight->create_from_id($_POST["switch"]);
  $toggel = ($flight->get_data()["is_active"] == 0) ? 1 : 0;
  $flight->update_row(array("is_active" => $toggel));
  $_SESSION['state'] = "success";
  $_SESSION['message'] = ($toggel == 0) ? "A flight is canceled successfully" : "A flight is enables successfully";
  header("Location: ../view/flights_manager.php");
}
else {
  header("Location: ../view/index.php");
}
?>