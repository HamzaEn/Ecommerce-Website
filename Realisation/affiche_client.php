<?php 
session_start()
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="Css.css">
  <link rel="stylesheet" href="acss.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>7anouti.ma</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="background-color:#F0F0F0">
<?php 
include "connexion.inc.php";
include "fonction.php";
include "navbar_membre_connected.php";

echo'<hr class="hr-danger" />

<center><b><h1>Les infos des clients</h1></b></center>
<hr class="hr-danger" /><br>';


echo'<center><table class="table" style="width:70%;">
<thead class="thead-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Login</th>
    <th scope="col">Password</th>
    <th scope="col">Nom</th>
    <th scope="col">Prenom</th>
  </tr>
</thead>
<tbody>';
$sql="SELECT * FROM client";
    $reponse = $lien->query($sql);
    while($client=$reponse->fetch(PDO::FETCH_ASSOC)){
        echo'<tr>
        <th scope="row">'.$client["ID"].'</th>
        <td>'.$client["Login"].'</td>
        <td>'.$client["Password"].'</td>
        <td>'.$client["Nom"].'</td>
        <td>'.$client["Prenom"].'</td>
        </tr>';
    }


    echo'</tbody>
         </table></center>';

?>
</body>
</html>