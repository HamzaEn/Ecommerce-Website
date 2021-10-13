<!DOCTYPE html>

<link rel="stylesheet" href="Css.css">
  <link rel="stylesheet" href="acss.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
    include "connexion.inc.php";
    include "navbar.inc.html";
function affichage_produit($id_produits,$lien){
    echo'<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">';
    foreach($id_produits as $id){
        $info_produit=recuperer_produit_par_ref($id,$lien);

      echo'<div class="col-md-4 mt-2">
      <div class="card">
          <div class="card-body">
              <div class="card-img-actions"> <img src="'.$info_produit["Image"].'" class="card-img img-fluid" width="96" height="350" alt=""> </div>
          </div>
          <div class="card-body bg-light text-center">
              <div class="mb-2">
                  <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">'.$info_produit["Designation"].'</a> </h6> <a href="#" class="text-muted" data-abc="true">'.$info_produit["Categorie"].'</a>
              </div>
              <h3 class="mb-0 font-weight-semibold">'.$info_produit["Prix"].' Dh</h3>';?>
              <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
               <form action="remplissagepanier.php" method="POST">
                     <input type="hidden" name="id" value="<?php echo"$id";?>"></input>
                     Quantité :<input type="number" name ="quantite" class="form-control" id="age" value="1" min="1" max="80" required><br>
                     <input type="submit" name="produit"  value="Ajouter au panier" class="btn btn-primary"></input>
               </form>
               <?php echo'
          </div>
      </div>
  </div>';

    }
}

    function affichage_produit_panier($id_produits,$lien){
        echo'<div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">';
        foreach($id_produits as $id => $quantite){
            $info_produit=recuperer_produit_par_ref($id,$lien);
        echo'<div class="col-md-4 mt-2">
          <div class="card">
              <div class="card-body">
                  <div class="card-img-actions"> <img src="'.$info_produit["Image"].'" class="card-img img-fluid" width="96" height="350" alt=""> </div>
              </div>
              <div class="card-body bg-light text-center">
                  <div class="mb-2">
                      <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">'.$info_produit["Designation"].'</a> </h6> <a href="#" class="text-muted" data-abc="true">'.$info_produit["Categorie"].'</a>
                  </div>
                  <h3 class="mb-0 font-weight-semibold">';?><?php echo $info_produit["Prix"]*$quantite.' Dh </h3>';?>
                  <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                   <form action="suppression_panier.php" method="POST">
                         <input type="hidden" name="id" value="<?php echo"$id";?>"  ></input>
                         Quantité :<input type="number" name ="quantite" class="form-control" id="age" value="<?php echo"$quantite";?>" style="text-align: center" disabled><br>
                         <input type="submit" name="produit"  value="Supprimer du panier" class="btn btn-primary"></input>     
                   </form>
                   <?php echo'
              </div>
          </div>
      </div>';
    
        }
    }





        function recuperer_all_ref_produits($lien){
            $sql="SELECT Reference FROM produit";
            $reponse=$lien->query($sql);
            $id_produits=array();

            while($a=$reponse->fetch(PDO::FETCH_ASSOC)){
                array_push($id_produits,$a["Reference"]);
            };
            return $id_produits;
        }




        function recuperer_produit_par_ref($ref,$lien){

                $sql="SELECT * FROM produit where Reference=$ref";
                $reponse = $lien->query($sql);
                $info_produit=$reponse->fetch(PDO::FETCH_ASSOC);
                return $info_produit;
        }




        function calcul_somme($id_produits,$lien){
            $somme=0;
            foreach($id_produits as $key => $valeur){
                $produit=recuperer_produit_par_ref($key,$lien);
                $somme+=$produit["Prix"]*$valeur;
            }
            return $somme;
        }




        function calcul_quantite($id_produits,$lien){
            $quantite = 0;
            foreach($id_produits as $key => $valeur){
                    $quantite+=$valeur;
            }
            return $quantite;

        }




        function is_existe_logine($login,$lien){
            $sql="SELECT Login FROM client where Login=?";
            $prep=$lien->prepare($sql);
            //$reponse = $lien->query($sql);
            $prep->execute(array($login));
            //$select=$reponse->fetch(PDO::FETCH_ASSOC);
            return $prep->fetch();
        }



        function recupere_nom($log,$lien){
            $sql="SELECT * FROM client where Login=?";
            $prep=$lien->prepare($sql);
            $prep->execute(array($log));
            $select=$prep->fetch();
            return $select;

        }




        function is_admin($login,$lien){
            $sql="SELECT * FROM client where Login=?";
            $prep=$lien->prepare($sql);
            $prep->execute(array($login));
            $select=$prep->fetch();
            return $select["Admin"];

        }







/*      function recuperer_produit_par_des($des,$lien){

            $sql="SELECT * FROM produit where Designation=$des";
            $reponse = $lien->query($sql);
            $info_produit=$reponse->fetch(PDO::FETCH_ASSOC);
            return $info_produit;
    }
*/





  /*      function nom_client($lien){
            $sql="SELECT Nom FROM client where ID=$a";
            $reponse = $lien->query($sql);
            $nom=$reponse->fetch(PDO::FETCH_ASSOC);
            return $nom;
        }
*/





echo'


    </div>
</div>
 




</html>';