<?php
session_start();
include "fonction.php";
$aze=1;
?>
<!DOCTYPE html>
<?php 
    if(!isset($_SESSION["Panier"])){
      //  header("Location:remplissagepanier.php");
    //$_SESSION["Panier"]=0;
        $azert=0;
    }else{
        $azert=1;
    }
        
?>
<html>
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
                if(isset($_SESSION["Login"])){include "navbar_membre_connected.php";}
                else{include "navbar.inc.html";}
                include "connexion.inc.php";
                //if(!isset($_SESSION["Panier"])){
                //    header("Location: remplissagepanier.php");
               // }
    ?>
    

        <hr class="hr-danger" />

<center><b><h1>Votre Panier</h1></b></center>
<hr class="hr-danger" />

<center>
<form action="suppression_panier.php" method="POST">
<a href="index.php" type="button" class="btn btn-outline-success">Ajouter un autre produit</a>
<input type="submit" class="btn btn-outline-dark" name="vider" value="Vider le panier"></input>
<a href="Commander.php" type="button" class="btn btn-outline-danger">Commander</a>
</form>
</center>



<center><b>La cout totale de vos produits => <?php if($azert==1){echo calcul_somme($_SESSION["Panier"],$lien);}else{echo 0;}?> Dhs</b></center>
<center><b>La quantité total de vos produits => <?php if($azert==1){echo calcul_quantite($_SESSION["Panier"],$lien);}else{echo 0;}?> Unités</b></center>



<?php
    if($azert==1){
    affichage_produit_panier($_SESSION["Panier"],$lien);}
               // unset($_SESSION["Panier"]);
               else{
                   echo "<center><strong>Panier vide</strong></center>";
               }
              // unset($_SESSION["Panier"]);
?>


</body>

</html>