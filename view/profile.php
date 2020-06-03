<?php 
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");

if(!isset($_SESSION['id'])){
    header("Location: ../view/index.php");
    exit;
}
include("../layout/header.php");
open_connetion();
$user = new User();
$reservations = null;
$user->get_by_id($_SESSION['id']);
if(isset($_SESSION['id'])){
  $reservations = get_pass_objts("WHERE id_user = {$_SESSION['id']} ORDER BY id_travler DESC");
}
close_connection();
?>
<div class=" mb-0 mt-5">
  <div class="container text-dark bg-info" style="border-radius:30px">
    <?php echo message();?>
    <h1 class="text-center">Vos Information</h1>
    <div class="row mt-4 bg-info" >
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">Nom: </div>
          <div class="col-8"><?php echo $user->get_data()['first_name']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4  font-weight-bold">Prénom: </div>
          <div class="col-8"><?php echo $user->get_data()['last_name']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">N° Passport: </div>
          <div class="col-8"><?php echo $user->get_data()['passport']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">CIN: </div>
          <div class="col-8"><?php echo $user->get_data()['cin']; ?></div>
        </div>
        
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">Email: </div>
          <div class="col-8"><?php echo $user->get_data()['email']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">Pays </div>
          <div class="col-8"><?php echo $user->get_data()['address']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">N° Téléphone: </div>
          <div class="col-8"><?php echo $user->get_data()['phone']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-dark font-weight-bold">Role: </div>
          <div class="col-8"><?php echo ucfirst($user->get_data()['role']); ?></div>
        </div>
      </div>
    </div>
  </div>

  
  
<div class="container text-dark bg-info " style="border-radius:30px">
<h1 class="text-center text-dark mt-5 p-3 mb-2">Toutes Vos reservations</h1>
  <?php 
  if(!empty($reservations)){
?>
  <table class="table table-striped mt-4 reserve" ">
    <thead>
      <tr class="text-center">
        <th>Reserver Pour</th>
        <th>Date de Reservation</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php foreach($reservations as $reservation){
          $flight = new Vol();
          $resere = new Reservation();

          $flight->get_by_id($reservation->get_data()["id_flight"]);
          $resere->getId($reservation->get_data()["id_resevation"]);

          $date = $resere->get_data()["date_resevation"];
          $pour = ($reservation->get_data()["passport"] == $_SESSION['passport']) ? "Moi" : " ". $reservation->get_data()["first_name"] ." ". $reservation->get_data()["last_name"];

        ?>

        <tr  onclick=get_infos(<?php echo $reservation->get_id(); ?>);
        data-toggle="modal" data-target="#showInfo" >
          
            <td><?php echo $pour ?></td>
            <td><?php echo $date ?></td>
            
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php }else { ?>
  <h3 class="text-white text-center mt-4">Il y a pas des reservations pour le moment</h3>
  <?php } ?>
</div>

</div>
<!-- info modal -->
<div class="modal fade" id="showInfo">
  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content text-dark bg-info" style="border-radius:30px">

      <div class="modal-header text-center">
        <h5 class="modal-title text-center" >Les informations de reservation</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-6 text-dark">Pour</div>
          <div class="col-6"><span id="Fname"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-dark">Date Reservation: </div>
          <div class="col-6"><span id="date_reser"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-dark">Depart / Destination: </div>
          <div class="col-6"><span id="dep_des"></span></div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
      <div class="row my-2">
          <div class="col-6 text-dark">l'heure de départ </div>
          <div class="col-6"><span id="h_dep"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-dark">Nom de vol</div>
          <div class="col-6"><span id="flight_name"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-dark">Prix: </div>
          <div class="col-6"><span id="prix"></span></div>
        </div>
      </div>
    </div>
      </div> <!--close modal-body -->
    </div>
  </div>
</div>
<script>
  function get_infos(P_ID) {
    let request = new XMLHttpRequest();
    request.onload = function() {
        if (this.status == 200) {
            let infos = JSON.toString(this.responseText);
            //fullName, dateR, line, dateD, planName, price
            document.getElementById("Fname").innerHTML = infos["travler"]["first_name"] + " " + infos["travler"]["last_name"];
            document.getElementById("date_reser").innerHTML = infos["reserve"]["date_resevation"];
            document.getElementById("dep_des").innerHTML = "<b>" + infos["flight"]["depart"] + "</b> à <b>" + infos["flight"]["distination"] + "</b>";
            document.getElementById("h_dep").innerHTML = infos["flight"]["date_flight"];
            document.getElementById("flight_name").innerHTML = infos["flight"]["plane_name"];
            document.getElementById("price").innerHTML = infos["flight"]["price"] + "DH";
        }
    }
    request.open("GET", "../controller/proc_vol.php?id=" + P_ID, true);
    request.send();
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>
</body>

</html>