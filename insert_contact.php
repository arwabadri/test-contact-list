<?php
$first_name = $_POST['first_name'];
$last_name  = $_POST['first_name'];
$age        = $_POST['first_name'];
$country    = $_POST['first_name'];
$email      = $_POST['first_name'];
$phone      = $_POST['first_name'];

if(isset($_POST['send'])){
    if(isset($first_name) && isset($last_name) && isset($age) && isset($country) && isset($email) && isset($phone)
    && $first_name != "" && $last_name != "" && $age != "" && $country != "" && $email != "" && $phone != "")
{
        include_once "connexion.php";
        extract($_POST);

        $sql = "INSERT INTO liste (first_name, last_name, age, country, email, phone)
                            VALUES ('$first_name', '$last_name', '$age', '$country', '$email', '$phone')";
        if (mysqli_query($db, $sql)){
            header("location:home.php?message=InsertionSucess");
        }else{
            header("location:home.php?message=InsertionFailed");
        }
    }
    else{
        header("location:home.php?message=Please fill all the fields");
    }
}
?>