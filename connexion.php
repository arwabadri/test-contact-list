<?php
$host = "sql108.infinityfree.com";
$username = "if0_37202947";
$password = "contact147";
$dbname = "if0_37202947_contact";

$db = mysqli_connect($host, $username, $password, $dbname);

//check connexion
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
?>
