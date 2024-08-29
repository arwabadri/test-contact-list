<?php
include "connexion.php";

$id = $_GET['id'];
$id = mysqli_real_escape_string($db, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);

    // Update query
    $sql = "UPDATE liste SET first_name='$first_name', last_name='$last_name', age='$age', country='$country', email='$email', phone='$phone' WHERE id='$id'";
    
    if (mysqli_query($db, $sql)) {
        header("location:home.php?message=UpdateSuccess");
    } else {
        echo "Error updating contact: " . mysqli_error($db);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modification</title>
    <link rel="stylesheet" type="text/css" href="home.css" />
</head>
<body>
    <h1>Modification</h1>
    <?php
    // Get contact details
    $sql = "SELECT * FROM liste WHERE id='$id'";
    $result = mysqli_query($db, $sql);

    // Check if the query was successful
    if (!$result) {
        echo "Error: " . mysqli_error($db);
        exit;
    }
    
    if ($row = mysqli_fetch_assoc($result)) {
    ?>
    <p>Modifier le contact de l'id <?= $id ?>!</p>
    <form class="form-update" action="modify_contact.php?id=<?= $id ?>" method="post">
        <input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>" placeholder="Prénom" required>
        <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>" placeholder="Nom" required>
        <input type="number" name="age" value="<?= htmlspecialchars($row['age']) ?>" placeholder="Âge" required>
        <input type="text" name="country" value="<?= htmlspecialchars($row['country']) ?>" placeholder="Pays" required>
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" placeholder="Adresse Email" required>
        <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" placeholder="Numéro de Téléphone" required>
        <button type="submit">Mettre à jour</button>
    </form>
    <?php 
    } else {
        echo "Contact not found.";
    }
    ?>
</body>
</html>
