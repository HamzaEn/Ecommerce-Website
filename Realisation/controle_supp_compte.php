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
        
        if(isset($_POST["supp"])){
        //les erreurs d'exsistence
        $err=[];
        //CHAMP Nom
        if ($_POST["supp_ID"]=='' || !isset($_POST["supp_ID"])){$err["ID"]="le champ *ID* n'est pas remplis";}
        
        //LES ERREURS DE COMPTABILITé
        $errors1=[];
        //Login
        if(!isset($err["ID"])){if(!preg_match("#^[0-9]+$#",$_POST["supp_ID"])){$errors1["ID"]='Le champ *ID* ne doit contenir que CHIFFRES .';}}
        
       //L'ERREUR DE LOGIN DEJA EXISTANT DANS LA BASE DE DONNEES
            if(empty($err)){ 
            if(empty($errors1)){
                $id=$_POST['supp_ID'];
                $sql="DELETE FROM client WHERE ID='$id'";
                $reponse=$lien->exec($sql);
                if($reponse){
                echo "<script>alert(\"compte Supprimer\")</script>
                <script>
                document.location.href = 'index.php'
                </script>
               ";
                }else{
                    echo"a";
                }
            }else{
                $n='';
							foreach ($errors1 as $key => $value){$n=$n.'\n - '.$value;}
								$m="Veuillez reglez les problémes suivants avant de valider: ".$n;
                                echo "<script>alert(\"$m\")</script>
                                <script>
                                document.location.href = 'Suppression_compte.php'
                                </script>";
                                //header("Location: maj_mon_compte.php");

            }
            

        
    }else{
        header("Location: index.php");
    }
    
    
}
    







        ?>
    </body>
</html>