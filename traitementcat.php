<?php
include ('Config.php');

$cat = $_POST['nomcat'];
$sql = "INSERT INTO 
      categorie(categorie) 
      VALUES ('$cat')";

$query = $db->query($sql);
header('Location: index.php');