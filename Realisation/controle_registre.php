<!DOCTYPE html>
<?php
session_start();
include "fonction.php";
?>
<html>
    <head>
        <title>7anouti.ma</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST["Register"])){
        //les erreurs d'exsistence
        $errors=[];
        //CHAMP Nom
        if ($_POST["Nom"]=='' || !isset($_POST["Nom"])){$errors["Nom"]="le champ *Nom* n'est pas remplis";}
        //CHAMP Prenom
        if ($_POST["Prenom"]=='' || !isset($_POST["Prenom"])){$errors["Prenom"]="le champ *Prenom* n'est pas remplis";}
        //CHAMP Login
        if ($_POST["Login"]=='' || !isset($_POST["Login"])){$errors["Login"]="le champ *Login* n'est pas remplis";}
        //CHAMP Password
        if ($_POST["Password"]=='' || !isset($_POST["Password"])){$errors["Password"]="le premier champ *Password* n'est pas remplis";}
        //Champ Password2
        if ($_POST["Password2"]=='' || !isset($_POST["Password2"])){$errors["Password2"]="le champ *Validate Password* n'est pas remplis";}


        
        //LES ERREURS DE COMPTABILITé
        $errors1=[];
        //Login
        if(!preg_match("#^[a-zA-Z\s]+[a-zA-Z0-9]+$#",$_POST["Login"])){$errors1["Login"]='Le champ *Login* doit commencer par un CHIFFRE .';}
        if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["Nom"])){$errors1["Nom"]='Le champ *Nom* doit contenir que des LETTRES .';}
        if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["Prenom"])){$errors1["Prenom"]='Le champ *Prenom* ne doit contenir que par des LETTRES .';}
        if(strcmp($_POST["Password"],$_POST["Password2"])!=0){$errors1["Password"]="les deux champs *Password* ne sont pas identique .";}

       //L'ERREUR DE LOGIN DEJA EXISTANT DANS LA BASE DE DONNEES
        $existe=is_existe_logine($_POST["Login"],$lien);
        if(!isset($existe["Login"])){   
        if(empty($errors)){
            if(empty($errors1)){
                $_SESSION["Nom_client"]=$_POST["Nom"];
                $_SESSION["Prenom_client"]=$_POST["Prenom"];
                $_SESSION["Login_client"]=$_POST["Login"];
                $_SESSION["Password_client"]=$_POST["Password"];
              // header("Location: remplissage_database_client.php");
              echo"<script>
              document.location.href = 'remplissage_database_client.php'
              </script>";

            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
								echo "<script>alert(\"$m\")</script>";
                                include "register.php";

            }
        }else{	$s='';
            foreach ($errors as $key => $value){$s=$s.'\n - '.$key;}
            $t="Vous n'avez pas remplis les champs suivants : ".$s;
            echo "<script>alert(\"$t\")</script>";
        
        
        
            include "register.php";
            
        }
         }
        else{
            $z="Le Login est déjà existant, veuillez choisir un autre";
            echo "<script>alert(\"$z\")</script>";
            include "register.php";

        }
    
    }





    


        ?>
    </body>
</html>