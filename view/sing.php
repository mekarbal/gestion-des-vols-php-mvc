<?php
require_once("../controller/session_handler.php");
include("../layout/header.php");
?>
<div class="container">
  <?php echo message();?>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#login">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#singin">Create New Account</a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane container active" id="login">
      <h1>Login:</h1>
      <form action="../controller/login_process.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : ''; ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        <div class="row">
          <div class="col-xs-12 col-sm-6 my-2">
            <div class="form-group">
              <label for="lgemail">Your Email:</label>
              <input type="email" class="form-control" id="lgemail" placeholder="Enter Your Email" name="lgemail"
                required>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 my-2">
            <div class="form-group">
              <label for="lgpwd">Password:</label>
              <input type="password" class="form-control" id="lgpwd" placeholder="Enter password" name="lgpswd"
                required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3" name="login">Submit</button>
      </form>
    </div>
    <div class="tab-pane container fade" id="singin">
      <h1>Create New Account:</h1>
      <form action="../controller/login_process.php<?php echo isset($_GET['id']) ? '?id='.$_GET['id'] : '' ?>"
        method="POST" class="needs-validation mt-4" novalidate>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" placeholder="Your first name" name="fname" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" id="lname" placeholder="Your last name" name="lname" required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="bday">Bithday:</label>
              <input type="date" class="form-control" id="bday" placeholder="Enter your birthday" name="bday" required>
            </div>
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="nation">Nationality:</label>
              <input type="text" class="form-control" id="nation" placeholder="Enter your country" name="nation"
                required>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="passport">Passport N°:</label>
              <input type="text" class="form-control" id="passport" placeholder="Enter your passport N°" name="passport"
                required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="idcard">ID Card:</label>
              <input type="text" class="form-control" id="idcard" placeholder="Enter card ID" name="idcard" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 my-2">
              <label for="phone">Phone N°:</label>
              <input type="phone" class="form-control" id="phone" placeholder="Ex: +0123-456-789" name="phone" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6 my-2">
              <label for="pwd">Password:</label>
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