<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="Css.css">
  <link rel="stylesheet" href="acss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>7anouti.ma</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
<body style="background-color:#F0F0F0">

<?php 
session_start();
include "fonction.php";
include "navbar_membre_connected.php";
?>
    <br><br>
    <hr class="hr-danger" />

<!-- Material form login -->
<center>
<div class="card" style="width:60%; height: 90%; margin-top: 30px;">

    <h5 class="card-header info-color white-text text-center py-4">
      <strong>Creer un compte</strong>
    </h5>
  
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
  
      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="controle_creation_compte.php" method="POST">
        
        <!-- Nom -->
        <div class="md-form">
        <label for="materialLoginFormEmail">Enter Firstname's Client:</label>
          <input type="text" id="materialLoginFormEmail" class="form-control" name="Nom" placeholder="Entrez le Nom du client">
        </div>
        <br>
        <!-- Prenom -->
        <div class="md-form">
        <label for="materialLoginFormEmail">Enter Lastname's Client:</label>
          <input type="text" id="materialLoginFormEmail" class="form-control" name="Prenom" placeholder="Entrez le Prenom du client">
        </div>
        <br>
        <!-- Login -->
        <div class="md-form">
        <label for="materialLoginFormEmail">Enter Login's Client:</label>
          <input type="text" id="materialLoginFormEmail" class="form-control" name="Login" placeholder="Entrez le Login du client">
        </div>
        <br>
        <!-- Password -->
        <div class="md-form">
        <label for="materialLoginFormPassword">Enter Password's Client:</label>
          <input type="password" id="materialLoginFormPassword" class="form-control" for="text"  name="Password" placeholder="Entrez votre mot de passe">
        </div>
            <br>
        <!-- Password -->
        <div class="md-form">
        <label for="materialLoginFormPassword">Validate Password's Client:</label>
          <input type="password" id="materialLoginFormPassword" class="form-control" for="text" name="Password2" placeholder="Re-saisissez le mot de passe du client">
        </div>
            <br>
        <div class="d-flex justify-content-around">
          <div>

          </div>
        </div>
  
        <!-- Sign in button -->
        <input class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Create" value="Creer"></input>  
      </form>
      <!-- Form -->
  
    </div>
  
  </div>
  <!-- Material form login -->
</center>


</body>
</html>
