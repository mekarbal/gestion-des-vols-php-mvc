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
      <a class="nav-link" data-toggle="tab" href="#signin"> <i class="fas fa-user-plus"></i> Créer Nouveau Comte</a>
    </li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane mt-5 container bg-info  mx-auto active" id="login" style="border-radius:30px;">
    <?php echo message();?>
      <h1 class="text-center ">Login</h1>
      <form action="../controller/UserController.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : ''; ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        
        
        <div class="row ">
          <div class="col-xs-12 col-sm-5 mx-auto">
            <div class="form-group">
              <label for="login_email">Votre Email</label>
              <input type="email" class="form-control" id="login_email" placeholder="Votre Email" name="login_email"
                required>
            </div>          
            <div class="form-group">
              <label for="login_pwd"> Votre Mot de passe</label>
              <input type="password" class="form-control" id="login_pwd" placeholder="Votre Mot de passe" name="login_pwd"
                required>
            </div>
            <div class="form-group mx-auto ">
          <button type="submit" class="btn btn-success mx-auto mb-3 justify-content-center" name="login">Submit</button>
          </div>
      </form>
          </div>
          
         
        </div>
        
    </div>
    <div class="tab-pane container bg-info fade" id="signin" style="border-radius:30px;">
      <h1 class="text-center ">Créer Nouveau Compte </h1>
      <form action="../controller/UserController.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : '' ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        <div class="form-group ">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="first_name">Nom :</label>
              <input type="text" class="form-control" id="first_name" placeholder="Your first name" name="first_name" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="last_name">Prénom:</label>
              <input type="text" class="form-control" id="last_name" placeholder="Your last name" name="last_name" required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
          <div class="col-xs-12 col-sm-6  my-2">
              <label for="passport">N° Passport :</label>
              <input type="text" class="form-control" id="passport" placeholder="Enter your passport N°" name="passport"
                required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="address">Adresse:</label>
              <input type="text" class="form-control" id="address" placeholder="Enter your country" name="address"
                required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="cin">CIN:</label>
              <input type="text" class="form-control" id="cin" placeholder="Enter card ID" name="cin" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="phone">N° Télèphone :</label>
              <input type="phone" class="form-control" id="phone" placeholder="Ex: +0123-456-789" name="phone" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="pwd">Mot de passe:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
            </div>
          </div>
        </div>

       

        <button type="submit" class="btn btn-success mb-3 justify-content-center" name="signin">Submit</button>
      </form>
    </div>
  </div>
</div>
<script src="js/script.js"></script>
</body>

</html>
