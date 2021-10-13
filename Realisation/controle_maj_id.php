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
        if ($_POST["maj_ID"]=='' || !isset($_POST["maj_ID"])){$errors["ID"]="le champ *Nom* n'est pas remplis";}
        
        //LES ERREURS DE COMPTABILITé
        $errors1=[];
        //Login
        if(!preg_match("#^[0-9]+$#",$_POST["maj_ID"])){$errors1["ID"]='Le champ *ID* ne doit centenir que des CHIFFRES.';}
       //L'ERREUR DE LOGIN DEJA EXISTANT DANS LA BASE DE DONNEES

        if(empty($errors)){
            if(empty($errors1)){
                $_SESSION["maj_ID"]=$_POST["maj_ID"];
              // header("Location: remplissage_database_client.php");
              echo"<script>
              document.location.href = 'Maj_compte.php'
              </script>";

            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
                                echo "<script>alert(\"$m\")</script>
                                <script>
                                document.location.href = 'maj_compte_id.php'
                                </script>";

            }
        }else{	$s='';
            foreach ($errors as $key => $value){$s=$s.'\n - '.$key;}
            $t="Vous n'avez pas remplis les champs suivants : ".$s;
            echo "<script>alert(\"$t\")</script>
            <script>
            document.location.href = 'maj_compte_id.php'
            </script>";
        
        
            
        }
         

    
    }





    


        ?>
    </body>
</html>