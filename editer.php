<br><br>
<?php
$id = $_GET['id'];
$nom = $_GET['nom'];
?>
<h4>Editer Tache</h4>
<h3 style="color: #128b08">Vous Editer la Tache : <?= $nom ?></h3>
<form method="post" action="traitement.php">
    <input type="hidden" value="<?= $id ?>" name="id_tache">
    <input type="text" name="Titre"><br>
    <input type="text" name="Tache"><br>
    <input type="date" name="Date_de_fin" min="<?=  date("Y-m-d");?>"><br>
    <input type="submit" value="editer">
    </form>