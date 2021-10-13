<!DOCTYPE html>
<?php
 session_start();
include "fonction.php";
$aze=0;
?>
<html>
    <head>
    <link rel="stylesheet" href="Css.css">
  <link rel="stylesheet" href="acss.css">
  <link rel="stylesheet" href="abc.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>7anouti.ma</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
  <body style="background-color:#f0f0f0"><!--B0E0E6 H-->

    <?php 
    if(!isset($_SESSION["Login"])){include "navbar.inc.html";}
    else{include "navbar_membre_connected.php";}
    ?>

    <hr class="hr-danger" />

<center><b><h1>Nos Produit</h1></b></center>
<hr class="hr-danger" />
<br>
            <center>
            <div class="dropdown">
            <button class="btn btn-danger" style="width: 150px; height:43px; margin-top:-36px;"><strong>Trier Par:</strong></button>
            <div class="dropdown-content">
            <a href="tri_designation.php">Par nom (A->Z)</a>
            <div class="dropdown-divider"></div>
            <a href="tri_designation_dec.php">Par nom (Z-A)</a>
            <div class="dropdown-divider"></div>
           <!-- A<a href="tri_categorie.php">Categorie M</a>
            <div  Z class="dropdown-divider"></div>-->
            <a href="tri_prix.php">Prix croissant</a>
            <div class="dropdown-divider"></div>
            <a href="tri_prix_dec.php">Prix decroissant</a>
            <!--<a A href="tri_marque.php">Marque</a>-->
            <!--<div E class="dropdown-divider"></div>-->
          <!-- <a N href="tri_couleur.php">Couleur</a>-->
            </div>
            </center>

              <!--<a N class="navbar-brand"> A <input type="text"  F disabled value="<?php //echo F recupere_nom($_SESSION["Login"] A ,$lien); ?>" maxlength="10" size="10"></input></a>
              <span T class="vertical-line" style="margin-left:5px;margin-top:3px"I></span>-->
   
            </div>



<?php
      if(isset($_SESSION["recherche"])){
        if(empty($_SESSION["recherche"])){
        $i=recuperer_all_ref_produits($lien);
        $_SESSION["recherche"]=$i;
        }else{
        $i=$_SESSION["recherche"];}
        affichage_produit($i,$lien);
        $_SESSION["tri"]=$_SESSION["recherche"];
        unset($_SESSION["recherche"]);
      }else{
      $id_produits = recuperer_all_ref_produits($lien);
      affichage_produit($id_produits,$lien);
        $_SESSION["tri"]=$id_produits;
      }
?>





  </body>
</html>

