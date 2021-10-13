<?php
session_start();
include "connexion.inc.php";

if(isset($_SESSION["recherche"])){
    unset($_SESSION["recherche"]);   
}

$sql="SELECT * FROM produit WHERE ";

if(isset($_POST["Search_co"])){
    if($_POST["search_barre_co"]!='' && isset($_POST["search_barre_co"])){
        $a=$_POST["search_barre_co"];
        $sql.="Designation LIKE '%$a%' "; 
    } 

    if($_POST["marque_co"]!="Marque"){
        if($_POST["search_barre_co"]!='' && isset($_POST["search_barre_co"])){
            $sql.="AND ";
        }
        $b=$_POST["marque_co"];
        $sql.="Marque='$b' ";
    }

    if($_POST["cat_co"]!="Categorie"){
        if($_POST["search_barre_co"]!='' && isset($_POST["search_barre_co"]) || $_POST["marque_co"]!="Marque"){
            $sql.="AND ";
        }
    $c=$_POST["cat_co"];
    $sql.="Categorie='$c' ";
    }
    
   // $sql.=";";

}else{
    if($_POST["search_barre_deco"]!='' && isset($_POST["search_barre_deco"])){
        $aa=$_POST["search_barre_deco"];
        $sql.="Designation LIKE '%$aa%' "; 
    } 

    if($_POST["marque_dec"]!="Marque"){
        if($_POST["search_barre_deco"]!='' && isset($_POST["search_barre_deco"])){
            $sql.="AND ";
        }
        $bb=$_POST["marque_dec"];
        $sql.="Marque='$bb' ";
    }

    if($_POST["cat_deco"]!="Categorie"){
        if($_POST["search_barre_deco"]!='' && isset($_POST["search_barre_deco"]) ||  $_POST["marque_dec"]!="Marque"){
            $sql.="AND ";
        }
    $cc=$_POST["cat_deco"];
    $sql.="Categorie='$cc' ";
    }
    
    //$sql.=";";
}

$prep=$lien->prepare($sql);
$prep->execute();
//$select=$prep->fetch(PDO::FETCH_ASSOC);
//$reponse=$lien->query($sql);
//echo $sql;
//echo $select["Reference"];
$produit_rec=array();
while($select=$prep->fetch(PDO::FETCH_ASSOC)){
//$produit_rec[$select["Reference"]]=$select["Reference"];
//echo $aaa;
array_push($produit_rec,$select["Reference"]);
}






//echo $sql;
   // echo $produit_rec;
   
    $_SESSION["recherche"]=$produit_rec;
    echo"<script>
    document.location.href = 'index.php'
    </script>";
