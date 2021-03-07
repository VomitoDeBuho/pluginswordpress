<?php
$user = "user";
$password = "aplicacions";
$server = "localhost";
$bdd = "pluginswordpress";
try {
    $connexio = new PDO("mysql:host=$server;dbname=$bdd",$user,$password);
}
catch (PDOException $e){
    echo $e->getMessage();
}
finally {
    $DBH = null;
}
?>
