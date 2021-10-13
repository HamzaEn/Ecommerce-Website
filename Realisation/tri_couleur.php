<?php 
session_start();
include "fonction.php";
include "connexion.inc.php";

if(isset($_SESSION["recherche"]) || isset($_SESSION["tri"])){
$a=$_SESSION["tri"];
unset($_SESSION["tri"]);
}else{
$a=recuperer_all_ref_produits($lien);
}

$recherche=array();

foreach($a as $key){
/*$sql="SELECT * FROM produit WHERE Reference=$key";
$reponse=$lien->query($sql);
$select=$reponse->fetch(PDO::FETCH_ASSOC);
array_push($recherche,$select["Reference"]);
*/
$b=recuperer_produit_par_ref($key,$lien);
$convert[$key]=$b["Couleur"];
}
echo"<br><br><br><br><br>";
//var_dump($convert);
//echo"<br><br>";
$aze = new ArrayObject($convert);
$aze->asort();
//sort($convert,SORT_STRING);
//var_dump($convert);

/*foreach($convert as $key=>$value){
    $d=array();
    $c=recuperer_produit_par_des($value,$lien);
    array_push($d,$c["Reference"]);
}*/
//echo"<br><br>";
//echo"<br><br>";
//echo"<br><br>";

foreach($aze as $key=>$value){
    array_push($recherche,$key);
    //echo $key ."=>". $value."<br>";
}
unset($aze);
unset($a);
//echo"<br><br>";

//var_dump($recherche);



$_SESSION["recherche"]=$recherche;
//echo $a[5];
echo"<script>
document.location.href = 'index.php'
</script>";
