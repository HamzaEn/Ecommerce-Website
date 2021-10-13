<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>7anouti.ma</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST["Sign"])){
        //les erreurs d'exsistence
        $errors=[];
        //CHAMP Login
        if ($_POST["Login"]=='' || !isset($_POST["Login"])){$errors["Login"]="le champ *Login* n'est pas remplis";}
        //CHAMP Password
        if ($_POST["Password"]=='' || !isset($_POST["Password"])){$errors["Password"]="le premier champ *Password* n'est pas remplis";}
        //Champ Password2
        //if ($_POST["Password2"]=='' || !isset($_POST["Password2"])){$errors["Password2"]="le deuxiéme champ *Password* n'est pas remplis";}



        //LES ERREURS DE COMPTABILITé
        $errors1=[];
        //Login
        if(!preg_match("#^[a-zA-Z\s]+[a-zA-Z0-9]+$#",$_POST["Login"])){$errors1["Login"]='Le champ *Login* doit commencer par une LETTRE .';}
       // if($_POST["Password"]==$_POST["Password2"]){$errors1["Password"]="les deux champs *Password* ne sont pas identique .";}
        

        if(empty($errors)){
            if(empty($errors1)){
                $login=$_SESSION["Login"]=$_POST["Login"];
                $mdp=$_SESSION["Password"]=$_POST["Password"];
                //verifier si le le mot de passe appartient a l'id saisie
                include "connexion.inc.php";
                $sql="SELECT * FROM client WHERE Login='$login'";
                $reponse = $lien->query($sql);
                $select=$reponse->fetch(PDO::FETCH_ASSOC);
                if(isset($select["Login"])){
                $_SESSION["Login"]=$select["Login"];
                if($select["Password"]==$mdp){
                header("Location: index.php");
                //header("Location: Panier.php");
                       }
                else{
                    echo "<script>alert('le mot de passe incorrecte' )</script>";
                    include "connexion_compte.php";
     
                }}
                else{
                    echo "<script>alert('Votre login est introuvable , veuillez creez votre compte ')</script>";
                    include "connexion_compte.php";

                }
            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
								echo "<script>alert(\"$m\")</script>";
								include "connexion_compte.php";

            }
        }else{	$s='';
            foreach ($errors as $key => $value){$s=$s.'\n - '.$key;}
            $t="Vous n'avez pas remplis les champs suivants : ".$s;
            echo "<script>alert(\"$t\")</script>";
        
        
        
            include "connexion_compte.php";
            
        }
    }






    


        ?>
    </body>
</html>