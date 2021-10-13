<?php 
session_start();
include "fonction.php";
$log=$_SESSION["Login_client"];
$pas=$_SESSION["Password_client"];
$nom=$_SESSION["Nom_client"];
$prenom=$_SESSION["Prenom_client"];
$admin="0";
$sql="INSERT INTO client(Login,Password,Nom,Prenom,Admin) VALUES('$log','$pas','$nom','$prenom','$admin')";
$reponse = $lien->exec($sql);

if($reponse){
    $_SESSION["Login"]=$_SESSION["Login_client"];
    echo"<script>
    document.location.href = 'index.php'
    </script>";

//header("Location:Principale.php");
}else{
    header("Location:test.php");
}

unset($_SESSION["Login_client"]);
unset($_SESSION["Password_client"]);
unset($_SESSION["Nom_client"]);
unset($_SESSION["Prenom_client"]);

