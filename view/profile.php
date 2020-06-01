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
  <div class="container">
    <?php echo message();?>
    <h1 class="text-center">Vos Information</h1>
    <div class="row mt-4" style="background-color: rgba(202, 233, 253, 0.7);">
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">Nom: </div>
          <div class="col-8"><?php echo $user->get_data()['first_name']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">Prénom: </div>
          <div class="col-8"><?php echo $user->get_data()['last_name']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">N° Passport: </div>
          <div class="col-8"><?php echo $user->get_data()['passport']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">CIN: </div>
          <div class="col-8"><?php echo $user->get_data()['cin']; ?></div>
        </div>
        
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">Email: </div>
          <div class="col-8"><?php echo $user->get_data()['email']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">Pays </div>
          <div class="col-8"><?php echo $user->get_data()['nationality']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">N° Téléphone: </div>
          <div class="col-8"><?php echo $user->get_data()['phone']; ?></div>
        </div>
        <div class="row my-2">
          <div class="col-4 text-success font-weight-bold">Role: </div>
          <div class="col-8"><?php echo ucfirst($user->get_data()['role']); ?></div>
        </div>
      </div>
    </div>
  </div>
<hr>
  <h1 class="text-center text-white mt-5 mb-5">Toutes Vos reservations</h1>
  <hr>
<div class="container">

  <?php 
  if(!empty($reservations)){
?>
  <table class="table table-striped mt-4 reserve" style="background-color: rgba(202, 233, 253, 0.7);">
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
          $pour = ($reservation->get_data()["passport"] == $_SESSION['passport']) ? "Moi" : "". $reservation->get_data()["first_name"] ."". $reservation->get_data()["last_name"];

        ?>

          <tr onclick="loadInfo(<?php $reservation->get_data()['id_resevation'];?>)" data-toggle="modal" data-target="#showInfo">
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
    <div class="modal-content">

      <div class="modal-header text-center">
        <h5 class="modal-title text-center" >Les informations de reservation</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="row my-2">
          <div class="col-6 text-success">Pour</div>
          <div class="col-6"><span id="fullName"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-success">Date Reservation: </div>
          <div class="col-6"><span id="dateR"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-success">Depart / Destination: </div>
          <div class="col-6"><span id="line"></span></div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
      <div class="row my-2">
          <div class="col-6 text-success">l'heure de départ </div>
          <div class="col-6"><span id="dateD"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-success">Nom de vol</div>
          <div class="col-6"><span id="planName"></span></div>
        </div>
        <div class="row my-2">
          <div class="col-6 text-success">Price: </div>
          <div class="col-6"><span id="price"></span></div>
        </div>
      </div>
    </div>
      </div> <!--close modal-body -->
    </div>
  </div>
</div>

<script src="js/script.js"></script>
</body>

</html>