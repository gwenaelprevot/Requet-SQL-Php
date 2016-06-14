<?php
include ('Config.php');
$test = $_POST['supression'];
    $db->query
    (" DELETE FROM tache WHERE cle_tache = '$test'");
header('Location: index.php');
