<?php
   // session_start();
    //include "fonction.php";
    //$nom_client=$_SESSION["Nom"];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Css.css">
  <link rel="stylesheet" href="acss.css">
  <link rel="stylesheet" href="abc.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>7anouti.ma</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>


    <body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="A">
        <div class="logo">
            <a href="index.php">
        <img src="img/12345.png">
            </a>
        </div>  
                  <!-- 7anouti -->
        <a class="navbar-brand" href="index.php">7anouti</a>
          <ul class="navbar-nav mr-auto">
          <span class="vertical-line" style="margin-top: 13px"></span>
            <!-- morocco -->
           <!-- <div class="form-inline">
            <span class="vertical-line"></span>
            <img src="img/map_marker1.png" class="form_inline">
            <li class="nav-item form-inline"><a class="nav-link navbar-brand " href="#" id="mor" style="color: pink">Morocco</a></li>
            <span class="vertical-line"></span>
            </div>-->
                      <!-- Dropdown Categori 
            <li class="nav-item dropdown form-inline">
              <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Categorie</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">HTML et CSS</a>
                <a class="dropdown-item" href="#">JavaScript</a>
                <a class="dropdown-item" href="#">PHP et MySQL</a>
              </div>
            </li>-->
            <div class="form-inline">
            <div class="dropdown">
            <button class="btn btn-danger" style="width: 150px; height:43px; margin-top:-36px;"><strong>Vos Infos :</strong></button>
            <div class="dropdown-content">
            <a>Login  : <?php echo recupere_nom($_SESSION["Login"],$lien)["Login"]; ?></a>
            <div class="dropdown-divider"></div>
            <a>Nom :  <?php echo recupere_nom($_SESSION["Login"],$lien)["Nom"]; ?></a>
            <div class="dropdown-divider"></div>
            <a>Prenom :  <?php echo recupere_nom($_SESSION["Login"],$lien)["Prenom"]; ?> </a>
            </div>

              <!--<a class="navbar-brand"><input type="text" disabled value="<?php //echo recupere_nom($_SESSION["Login"],$lien); ?>" maxlength="10" size="10"></input></a>-->
              <span class="vertical-line" style="margin-left:5px;margin-top:3px"></span>
   
            </div>
            <div class="form-inline">
              <a href="deconnexion_compte.php" class="navbar-brand btn btn-danger" style="width:160px;">Se deconnecter</a>
              <span class="vertical-line" style="margin-left: -10px"></span>
   
            </div>
  
            <!-- Search -->
            <form class="form-inline"  action="Search.php" method="POST">
            <select class="form-control mr-sm-1" size="1" style="width:120px;" name="cat_co">
            <option value="Categorie">Categorie</option>
            <option value="Telephone">Telephone</option>
            <option value="Tv">Tv</option>
            <option value="Pc">Pc</option>
            </select>

            <select class="form-control mr-sm-1" size="1" style="width:105px;" name="marque_co">
              <option value="Marque">Marque</option>
              <option value="Samsung">Samsung</option>
              <option value="Apple">Apple</option>
              <option value="Oppo">Oppo</option>
              <option value="Infinix">Infinix</option>
              <option value="Xiaomi">Xiaomi</option>
              <option value="Visio">Visio</option>
              <option value="Revolution">Revolution</option>
              <option value="Hisense">Hisense</option>
              <option value="Philips">Philips</option>
              <option value="Hp">Hp</option>
              <option value="Philips">Dell</option>
              <option value="Lenovo">Lenovo</option>
              <option value="Toshiba">Toshiba</option>
              <option value="Asus">Asus</option>

            </select>

             <input class="form-control mr-sm-2" id="span0" type="search" name="search_barre_co" placeholder="Search" value='' aria-label="Search" style="width:210px;"></input>

          <!--  <input class="form-control mr-sm-2" id="span0" type="search" placeholder="Search" aria-label="Search">-->
        <!--  <select class="form-control mr-sm-1" size="1">
              <option>Couleur</option>
              <option>Noir</option>
              <option>Bleu</option>
              <option>Blanc</option>
              <option>Vert</option>
              <option>Rouge</option>
              <option>Gold</option>

            </select>-->


          <button class="btn btn-outline-info my-3 my-sm-0" type="submit" name="Search_co">Search</button>
                      <!--Panier -->
            <span class="vertical-line"></span>
            <a href="panier.php" class="abc" style="text-decoration: none; margin-left:18px">
            <img src="img/panier.png" style="margin: 50" alt="Panier">
                       <br /> <span style="color: white; margin-left:-13px">Mon Panier</span>
            </a>

            </form>
            <?php
            if(is_admin($_SESSION["Login"],$lien)==1){
            echo' 
            <span class="vertical-line"></span>
            <div class="dropdown">
            <button class="btn btn-danger">Admin</button>
            <div class="dropdown-content">
            <div class="dropdown-divider"></div>
            <a href="affiche_client.php">Afficher les clients</a>
            <a href="Suppression_compte.php">Supprimer un Compte</a>
            <div class="dropdown-divider"></div>
            <a href="Creer_compte.php">Creer un compte</a>
            <div class="dropdown-divider"></div>
            <a href="maj_compte_id.php">modifier un compte</a>
            </div>
          </div>';
          }else{
            echo' 
            <span class="vertical-line"></span>
            <div class="dropdown">
            <button class="btn btn-danger">Mon compte</button>
            <div class="dropdown-content">
            <a href="Maj_mon_compte.php">Modifier mon compte compte</a>
            <div class="dropdown-divider"></div>
            <a href="Suppression_mon_compte.php">Supprimer mon compte</a>
            </div>
          </div>';

          }
            ?>
          </ul>
           <ul class="navbar-nav mr-auto ">
           <!-- <li class="nav-item mr-auto"><a class="nav-link " href="#">Articles</a></li>
            <li class="nav-item"><a class="nav-link " href="#">Contact</a></li>-->
          </ul>
        </nav>
      </div>
      
  <br><br>
    </body>
  </html>