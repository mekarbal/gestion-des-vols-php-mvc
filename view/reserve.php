<?php 
require_once("../controller/session_msgs.php");
require_once("../model/functions.php");
include("../layout/header.php");

if(!(isset($_SESSION['id']) && isset($_GET['id']))){
    header("Location: ../view/index.php");
    exit;
}

$flight = new Vol();
$flight->get_by_id((int) $_GET['id']);
?>

<div class="container">
<?php echo message();?>

    <ul class="nav nav-tabs justify-content-center" style="max-width:450px;">
        <li class="nav-item ">
            <a class="nav-link bg-success text-white active" data-toggle="tab" href="#user">Je Reserve </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-success text-white " data-toggle="tab" href="#guest">Pour Autres</a>
        </li>
    </ul>
    

    <div class="tab-content mx-auto mt-5" >
        <div class="tab-pane container m-0 p-0 active" id="user">
            <div class="card bg-info" >
                <div class="card-header">
                    <h4 class="card-title text-center">Confirmer Les informations de vol</h4>
                </div>
                <div class="card-body p-4 text-center">
                    <p>De <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['depart']?></span> à
                        <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['distination']?></span></p>
                    <p>Reservation Pour <span
                            class="text-dark font-weight-bold"><?php echo $_SESSION['firstname']. ' '.$_SESSION['lastname']?></span></p>
                    <p>Nom de Vol <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['n_flight']?></span></p>
                    <p>Date de départ <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['date_flight']?></span></p>
                </div>
                <div class="card-footer" style="display: flex; justify-content: space-between;">
                    <div>
                        <p class="card-text">Total Price: <span
                                class="text-dark font-weight-bold"><?php echo $flight->get_data()['price']?>Dhs</span></p>
                    </div>
                    <form action="../controller/proc_vol.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION['id'];?>">
                        <input type="hidden" name="idFlight" value="<?php echo (int) $_GET['id'];?>">
                        <input type="hidden" name="firstname" value="<?php echo $_SESSION['firstname'];?>">
                        <input type="hidden" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
                        <input type="hidden" name="passport" value="<?php echo $_SESSION['passport'];?>">
                        <button type="submit" class="btn btn-success mx-auto" name="reserve">Valider Votre </button>
                    </form>
                </div>
            </div>
        </div>


        <div class="tab-pane container m-0 p-0 fade" id="guest">

            <form action="../controller/proc_vol.php" method="POST" class="needs-validation" novalidate>

                <div class="card bg-info"  >
                    <div class="card-header">
                        <h4 class="card-title text-center">Remplire les informations</h4>
                    </div>
                    <div class="card-body p-4 text-center">

                        <p>De <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['depart']?></span> a
                            <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['distination']?></span></p>
                        <p>Nom <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['n_flight']?></span></p>
                        <p>Depart <span class="text-dark font-weight-bold"><?php echo $flight->get_data()['date_flight']?></span></p>
                        Les informations de Passager

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nom" name="firstname"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Prenom" name="lastname"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Passport Number" name="passport"
                                required>
                        </div>

                    </div>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <div>
                            <p class="card-text">Total Price: <span
                                    class="text-dark font-weight-bold"><?php echo $flight->get_data()['price']?>Dhs</span></p>
                        </div>

                        <input type="hidden" name="idUser" value="<?php echo $_SESSION['id'];?>">
                        <input type="hidden" name="idFlight" value="<?php echo (int) $_GET['id'];?>">
                        <button type="submit" class="btn btn-success" name="reserve">Confirmer la reservation</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="js/script.js"></script>
</body>
</html>