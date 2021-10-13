<?php 
session_start();



if(!isset($_SESSION["Panier"])){
    $a=array();
    $_SESSION["Panier"]=$a;
    header("Location:panier.php");
}else{
    if(isset($_POST["vider"])){
        
        $produit=$_SESSION["Panier"];
        foreach($produit as $key => $valeur){
            unset($produit[$key]);
        }
        $_SESSION["Panier"]=$produit;

    }else{
    $i=$_POST["id"];
    $produit=$_SESSION["Panier"];
    unset($produit[$i]);
    $_SESSION["Panier"]=$produit;
    }
    header("Location:panier.php");


}

?>