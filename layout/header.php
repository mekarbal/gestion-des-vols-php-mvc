<?php logout_prepare(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar bg-primary navbar-dark mb-5">
    <a class="navbar-brand" href="../view/index.php">TM Air</a>
        <?php if(isset($_SESSION['id']) && $_SESSION["role"] == "user") { ?>
        <span class="navbar-text mr-auto">
        <span class="text-white small"> <?php echo $_SESSION['firstname'];?> (<i class="fas fa-user"></i>)</span>
        </span>
        <a class="nav-link text-white" href="../view/profile.php"><i class="fas fa-id-card"></i> Profil</a>
        <a class="nav-link text-white" href="?log=logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>

        <?php }elseif(isset($_SESSION['id']) && $_SESSION["role"] == 'admin'){ ?>
        <span class="navbar-text mr-auto">
        <span class="text-white small"><?php echo $_SESSION['firstname'];?> (<i class="fas fa-user-cog"></i>)</span>
        </span>
        <a class="nav-link text-white" href="../view/profile.php"> <i class="fas fa-id-card"></i> Profil</a>
        <a class="nav-link text-white" href="../view/gestion_admin.php"><i class="fas fa-tasks"></i> Vols</a>
        <a class="nav-link text-white" href="?log=logout"> <i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        <?php }else{ ?>
        <a class="nav-link text-white ml-auto" href="../view/sign.php">Registre et Connexion</a>
        <?php } ?>
    </nav>