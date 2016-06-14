<br><br>
<?php
$id = $_GET['id'];
$nomtitre = $_GET['titre'];
$nomvalue = $_GET['tache'];
?>
<h4>Editer Tache</h4>
<h3 style="color: #128b08">Vous Editer la Tache : <?= $nomtitre ?></h3>
<form method="post" action="traitement.php">
    <input type="hidden" value="<?= $id ?>" name="id_tache">
    <input type="text" name="Titre" value="<?= $nomtitre ?>"><br>
    <input type="text" name="Tache" value="<?= $nomvalue ?>"><br>
    <input type="date" name="Date_de_fin" min="<?=  date("Y-m-d");?>"><br>
    <input type="submit" value="editer">
    </form>