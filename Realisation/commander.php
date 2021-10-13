<?php 
session_start();
include "connexion.inc.php";
$aze=2;
if(isset($_SESSION["Login"])){
 //   echo "<script>alert(\"Felicitation, votre commande vous sera livrer au plus tard dans 7 jours .\")</script>
  //  <script>";
  $login=$_SESSION["Login"];
  $sql0="SELECT * FROM client where Login=?";
  $prep=$lien->prepare($sql0);
  $prep->execute(array($login));
  $select=$prep->fetch();
    $id=$select["ID"];
    $date = date("F j, Y, g:i a");
    $sql="INSERT INTO commande(Date,IdClient) VALUES('$date','$id')";
    $lien->query($sql);
    $produit=$_SESSION["Panier"];
    foreach($produit as $key => $valeur){
        unset($produit[$key]);
    }
    $_SESSION["Panier"]=$produit;
    echo "<script>alert(\"Felicitation, votre commande vous sera livrer au plus tard d'içi  7 jours .\")</script>
    <script>
    document.location.href = 'index.php'</script>
    </script>";

}else{
    header("Location:connexion_compte.php");
}
?>