<?php 
session_start();
include "connexion.inc.php";

$login=$_SESSION["Login"];
$sql = "DELETE FROM client WHERE Login=?";
$prep=$lien->prepare($sql);
$prep->execute(array($login));

unset($_SESSION["Login"]);
header("Location: index.php");

?>