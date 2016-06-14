<?php
include('Config.php');
//$page = $_GET['page'];
$id = null;
if (isset($_POST['id_tache']))
{
    $id = $_POST['id_tache'];
}
$titre = $_POST['Titre'];
$tache = $_POST['Tache'];
$cat = $_POST['categorie'];
$dated = date("Y-m-d H:i:s");
$datef = $_POST['Date_de_fin'];


if ($id === null) {
    $sql = "INSERT INTO 
      tache(titre, tache, date_debut, date_fin,categories) 
      VALUES ('$titre', '$tache','$dated','$datef','$cat')";

    $query = $db->query($sql);
} else {
    $query = $db->query
    ("UPDATE tache SET titre = '$titre',tache = '$tache',date_debut = '$dated',date_fin = '$datef' WHERE cle_tache = '$id' ");
}
if (!$query) {
    echo "Erreur lors de la requête : $db->error";
    exit();
}
header('Location: index.php');
exit();