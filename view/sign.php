<?php
require_once("../controller/session_msgs.php");
include("../layout/header.php");
?>
<div class="container ">
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabsmx-auto justify-content-center" >
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#login"><i class="fas fa-unlock-alt"></i> Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#singin"> <i class="fas fa-user-plus"></i> Créer Nouveau Comte</a>
    </li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane mt-5 container  mx-auto active" id="login">
    <?php echo message();?>
      <h1 class="text-center ">Login</h1>
      <form action="../controller/UserController.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : ''; ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        
        
        <div class="row ">
          <div class="col-xs-12 col-sm-5 mx-auto">
            <div class="form-group">
              <label for="lgemail">Votre Email</label>
              <input type="email" class="form-control" id="lgemail" placeholder="Votre Email" name="lgemail"
                required>
            </div>          
            <div class="form-group">
              <label for="lgpwd"> Votre Mot de passe</label>
              <input type="password" class="form-control" id="lgpwd" placeholder="Votre Mot de passe" name="lgpswd"
                required>
            </div>
            <div class="form-group mx-auto ">
          <button type="submit" class="btn btn-primary mx-auto mb-3 justify-content-center" name="login">Submit</button>
          </div>
      </form>
          </div>
          
         
        </div>
        
    </div>
    <div class="tab-pane container fade" id="singin">
      <h1 class="text-center mt-5">Enregistrer Vos informations</h1>
      <form action="../controller/UserController.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : '' ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="fname">Nom</label>
              <input type="text" class="form-control" id="fname" placeholder="Nom" name="fname" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="lname">Prenom</label>
              <input type="text" class="form-control" id="lname" placeholder="Prenom" name="lname" required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="bday">Anne de naissance</label>
              <input type="date" class="form-control" id="bday" placeholder="ADN" name="bday" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="nation">Nationalité</label>
              <input type="text" class="form-control" id="nation" placeholder="Nationalité" name="nation"
                required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="passport">N° Passport :</label>
              <input type="text" class="form-control" id="passport" placeholder="passport " name="passport"
                required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="idcard">CIN</label>
              <input type="text" class="form-control" id="idcard" placeholder="CIN" name="idcard" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="phone">N° Télephone :</label>
              <input type="phone" class="form-control" id="phone" placeholder="Télephone" name="phone" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="pwd">Mot de passe<</abel>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2"></div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3" name="singin">Submit</button>
      </form>
    </div>
  </div>
</div>
<script src="js/script.js"></script>
</body>

</html>