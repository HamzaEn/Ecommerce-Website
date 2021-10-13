<!DOCTYPE html>
<?php
include "fonction.php";
?>
<html>
    <head>
        <title>7anouti.ma</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST["Create"])){
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
        if(!preg_match("#^[a-zA-Z\s]+[a-zA-Z0-9]+$#",$_POST["Login"])){$errors1["Login"]='Le champ *Login* doit commencer par une LETTRE .';}
        if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["Nom"])){$errors1["Nom"]='Le champ *Nom* doit contenir que des CHIFFRES .';}
        if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["Prenom"])){$errors1["Prenom"]='Le champ *Prenom* doit commencer par un CHIFFRES .';}
        if(strcmp($_POST["Password"],$_POST["Password2"])!=0){$errors1["Password"]="les deux champs *Password* ne sont pas identique .";}

       //L'ERREUR DE LOGIN DEJA EXISTANT DANS LA BASE DE DONNEES
        $existe=is_existe_logine($_POST["Login"],$lien);
        if(!isset($existe["Login"])){   
        if(empty($errors)){
            if(empty($errors1)){
                $nom=$_POST["Nom"];
                $prenom=$_POST["Prenom"];
                $log=$_POST["Login"];
                $pas=$_POST["Password"];
                $admin=0;
              // header("Location: remplissage_database_client.php");
              $sql="INSERT INTO client(Login,Password,Nom,Prenom,Admin) VALUES('$log','$pas','$nom','$prenom','$admin')";
              $reponse = $lien->exec($sql);
              echo"<script>alert(\"compte Creer (cliquer sur afficher les clients pour verifier)\")</script>
              <script>
              document.location.href = 'index.php'
              </script>";

            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
                                echo "<script>alert(\"$m\")</script>
                                <script>
                                document.location.href = 'Creer_compte.php'
                                </script>";
                                //include "Creer_compte.php";

            }
        }else{	$s='';
            foreach ($errors as $key => $value){$s=$s.'\n - '.$key;}
            $t="Vous n'avez pas remplis les champs suivants : ".$s;
            echo "<script>alert(\"$t\")</script>
            <script>
            document.location.href = 'Creer_compte.php'
            </script>";
        
        
        
            //include "Creer_compte.php";
            
        }
         }
        else{
            $z="Le Login est déjà existant, veuillez choisir un autre";
            echo "<script>alert(\"$z\")</script>
            <script>
            document.location.href = 'Creer_compte.php'
            </script>";
            //include "Creer_compte.php";

        }
    
    }





    


        ?>
    </body>
</html>