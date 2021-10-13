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
      <strong>Modification du compte (1)</strong>
    </h5>
  
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
  
      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="controle_maj_id.php" method="POST">
        
        <!-- Nom -->
        <div class="md-form">
        <label for="materialLoginFormEmail">Enter The Client's ID:</label>
          <input type="text"  class="form-control" name="maj_ID" placeholder="Entrez l'ID du client">
        </div>
        <br>  
        <!-- Sign in button -->
        <input class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Register" value="Confirmer"></input>  
      </form>
      <!-- Form -->
  
    </div>
  
  </div>
  <!-- Material form login -->
</center>


</body>
</html>
