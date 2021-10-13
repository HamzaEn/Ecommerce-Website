<?php 
session_start();




if(isset($_POST["produit"])){
if(!isset($_SESSION["Panier"])){

    $produit[$_POST["id"]]=$_POST["quantite"];
    $_SESSION["Panier"]=$produit;


}else{

    $produit=$_SESSION["Panier"];
    if(isset($produit[$_POST["id"]])){
    $produit[$_POST["id"]]=$produit[$_POST["id"]]+$_POST["quantite"];
    }else{
    $produit[$_POST["id"]]=$_POST["quantite"];
    }
    $_SESSION["Panier"]=$produit;

}
}

header("Location:index.php");
