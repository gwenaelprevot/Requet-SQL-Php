<?php
// connexion à la base////////////////////////////////
$db = mysqli_connect('localhost', 'root', '10', 'todolist');
//////////////////////////////////////////////////////

//Verifie Ci je suis bien connecter a la base de donner///////////
//if (!$db) {
//    echo "<p style='color: crimson'>connexion echouer</p><br>";
//    exit();
//}
//echo "<p style='color: #35ff10'>connection reussi</p><br>";
