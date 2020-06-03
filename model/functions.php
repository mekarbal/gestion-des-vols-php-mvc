<?php 
require_once("../model/User.php");
require_once("../model/Vol.php");
require_once("../model/Reservation.php");
require_once("../model/Passager.php");

$connection = null;
function open_connetion(){
    global $connection;
    $connection = mysqli_connect("localhost", "root", "", "vols_mvc");
    if(mysqli_connect_errno()){
        die("Database coonection error: ".mysqli_connect_error() ." (".mysqli_connect_errno().")");
    }
}

function close_connection(){
    global $connection;
     mysqli_close($connection);
}

function get_pass_objts($where=null){
    $objs = [];
    $query = "SELECT id_travler FROM passagers" . (!empty($where) ? " ".$where : "");
    $result = get_rows($query);
    while($row = mysqli_fetch_row($result)){
        $passager = new Passager();
        $passager->get_by_id($row[0]);
        $objs[] = $passager;
    }
    return $objs;
}

function get_flights_objects($where=null){
    $objs = [];
    $query = "SELECT id_flight FROM flight   " . (!empty($where) ? $where : "");
    $result = get_rows($query);
    while($row = mysqli_fetch_row($result)){
        $flight = new Vol();
        $flight->get_by_id($row[0]);
        $objs[] = $flight;
    }
    return $objs;
}

function get_rows($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    if($result){
        return $result;
    }else{
        die("Error in : " . $query . "<br>" . mysqli_error($connection));
    }
}

function data_regis($value,$name,&$saved){
    global $connection;
    if(isset($value[$name]) && trim($value[$name]) !== ""){
        return mysqli_real_escape_string($connection,trim($value[$name]));
    }else{
        $saved = false;
        return null;
    }
}
?>