<?php
$id = $_GET['id'];
include_once "connexion.php";

$sql = "DELETE FROM liste WHERE id = $id";

if(mysqli_query($db, $sql)){
    header("location:home.php?message=DeleteSuccess");

}else{

    header("location:home.php?message=DeleteFail");
}
?>