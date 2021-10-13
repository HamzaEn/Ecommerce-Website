<!DOCTYPE html>
<?php
session_start();
include "connexion.inc.php";
//include "navbar_membre_connected.php";

function recupere_nom($log,$lien){
    $sql="SELECT * FROM client where Login=?";
    $prep=$lien->prepare($sql);
    $prep->execute(array($log));
    $select=$prep->fetch();
    return $select;

}



function is_existe_logine($login,$lien){
    $sql="SELECT Login FROM client where Login=?";
    $prep=$lien->prepare($sql);
    //$reponse = $lien->query($sql);
    $prep->execute(array($login));
    //$select=$reponse->fetch(PDO::FETCH_ASSOC);
    return $prep->fetch();
}

?>
<html>
    <head>
        <title>7anouti.ma</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST["Modifier"])){
        //les erreurs d'exsistence
        $err=[];
        //CHAMP Nom
        if ($_POST["maj_Nom"]=='' || !isset($_POST["maj_Nom"])){$err["Nom"]="le champ *Nom* n'est pas remplis";}
        //CHAMP Prenom
        if ($_POST["maj_Prenom"]=='' || !isset($_POST["maj_Prenom"])){$err["Prenom"]="le champ *Prenom* n'est pas remplis";}
        //CHAMP Login
        if ($_POST["maj_Login"]=='' || !isset($_POST["maj_Login"])){$err["Login"]="le champ *Login* n'est pas remplis";}
        //CHAMP Password
        if ($_POST["maj_Password"]=='' || !isset($_POST["maj_Password"])){$err["Password"]="le champ *Password* n'est pas remplis";}


        
        //LES ERREURS DE COMPTABILITé
        $errors1=[];
        //Login
        if(!isset($err["Login"])){if(!preg_match("#^[a-zA-Z\s]+[a-zA-Z0-9]+$#",$_POST["maj_Login"])){$errors1["Login"]='Le champ *Login* doit commencer par une LETTRE .';}}
        if(!isset($err["Nom"])){if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["maj_Nom"])){$errors1["Nom"]='Le champ *Nom* ne doit contenir que des LETTRES .';}}
        if(!isset($err["Prenom"])){if(!preg_match("#^[a-zA-Z\s]+$#",$_POST["maj_Prenom"])){$errors1["Prenom"]='Le champ *Prenom* ne doit contenir que LETTRES .';}}

        
       //L'ERREUR DE LOGIN DEJA EXISTANT DANS LA BASE DE DONNEES
       if(!isset($err["Login"])){$existe=is_existe_logine($_POST["maj_Login"],$lien);}
            if(count($err)!=4){ 
        if(!isset($existe["Login"])){   
            if(empty($errors1)){
                $sql0="UPDATE client SET ";
                if(!isset($err["Nom"])){$nom=$_POST["maj_Nom"];$sql0=$sql0."Nom = '$nom',";}
                if(!isset($err["Prenom"])){$prenom=$_POST["maj_Prenom"];$sql0=$sql0."Prenom = '$prenom',";}
                if(!isset($err["Login"])){$login=$_POST["maj_Login"];$sql0=$sql0."Login = '$login',";}
                if(!isset($err["Password"])){$password=$_POST["maj_Password"];$sql0=$sql0."Password = '$password',";}
                $sql=substr($sql0,0,strlen($sql0)-1);
                $id = recupere_nom($_SESSION["Login"],$lien)["ID"];
                $sql=$sql." WHERE ID ='$id'";
                $reponse=$lien->exec($sql);
                if(!isset($err["Login"])){$_SESSION["Login"]=$_POST["maj_Login"];}
                

                //echo "<script>alert(\"compte modifier\")</script>";
                //header("Location: Principale.php");
                echo "<script>alert(\"compte modifier\")</script>
                <script>
                document.location.href = 'index.php'
                </script>
               ";
            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
                                echo "<script>alert(\"$m\")</script>
                                <script>
                                document.location.href = 'maj_mon_compte.php'
                                </script>";
                                //header("Location: maj_mon_compte.php");

            }
            
        
        
         
        }else{
            $z="Le Login est déjà existant, veuillez choisir un autre";
            echo "<script>alert(\"$z\")</script>
            <script>
            document.location.href = 'maj_mon_compte.php'
            </script>";

        }
    }else{
        header("Location: index.php");
    }
    
    
       
    




}


        ?>
    </body>
</html>