<?php 
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

if (isset($_REQUEST["id"]) && isset($_SESSION["id"])){
    $travler = new Passager();
    $flight = new Flight();
    $reserve = new Reservation();

    $travler->get_by_id($_REQUEST["id"]);
    $flight->get_by_id($travler->get_data()["id_flight"]);
    $reserve->get_by_id($travler->get_data()["id_resevation"]);

    $returned_data = [
        "travler" => $travler->get_data(),
        "flight" => $flight->get_data(),
        "reserve" => $reserve->get_data()
    ];
    echo json_encode($returned_data);
}
?>