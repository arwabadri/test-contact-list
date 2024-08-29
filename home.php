<?php
    include_once "connexion.php";

    // An empty SQL query and search variable
    $sql = "SELECT * FROM liste";
    $search = "";

    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($db, $_GET['search']);
        
        // Modifying the SQL query to search in multiple columns
        $sql = "SELECT * FROM liste WHERE first_name LIKE '%$search%' 
                OR last_name LIKE '%$search%' 
                OR age LIKE '%$search%' 
                OR country LIKE '%$search%' 
                OR email LIKE '%$search%' 
                OR phone LIKE '%$search%'
                ORDER BY id ASC";
    }

    // SQL query execution
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("Error executing query: " . mysqli_error($db));
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contact List</title>
        <link rel="stylesheet" type="text/css" href="home.css" />
    </head>
    <body>
        <form class="contact-form" action="insert_contact.php" method="post" id="contactForm">
            <p>Ajouter un nouveau contact!</p>
            <input type="hidden" id="contactId">
            <input type="text" name="first_name" placeholder="Prénom" required>
            <input type="text" name="last_name" placeholder="Nom" required>
            <input type="number" name="age" placeholder="Âge" required>
            <input type="text" name="country" placeholder="Pays" required>
            <input type="email" name="email" placeholder="Adresse Email" required>
            <input type="text" name="phone" placeholder="Numéro de Téléphone" required>
            <button type="submit" name="send">Enregistrer</button>
        </form>
        <main>
        <h1>Contact List</h1>
            <form action="home.php" method="GET">
                <input type="text" class="search" name="search" placeholder="Rechercher..." value="<?php echo htmlspecialchars($search);?>">
                <button type="submit" name="search_btn">Rechercher</button>
            </form>
            <button class="insert" onclick="showInsertionForm()">Ajouter Contact</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Pays</th>
                        <th>Adresse Email</th>
                        <th>Numéro de Téléphone</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                if (mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['country']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><a class="modify" href="modify_contact.php?id=<?php echo $row['id']; ?>">Modifier Contact</a></td>
                        <td><a class ="delete" href="delete_contact.php?id=<?php echo $row['id']; ?>">Supprimer Contact</a></td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8'><p>Aucun contact trouvé!</p></td></tr>";
                }
                ?>
                </tbody>
            </table>
        </main>
        <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                
                echo "<script type='text/javascript'>";
                
                // Different messages for delete and insert actions
                if ($message == "DeleteSuccess") {
                    echo "alert('Contact deleted successfully!');";
                } elseif ($message == "DeleteFail") {
                    echo "alert('Failed to delete contact. Please try again.');";
                } elseif ($message == "InsertionSuccess") {
                    echo "alert('Contact inserted successfully!');";
                } elseif ($message == "InsertionFailed") {
                    echo "alert('Failed to add contact. Please try again.');";
                } elseif ($message == "PleaseFillAllFields") {
                    echo "alert('Please fill in all the fields.');";
                } elseif ($message == "UpdateSuccess"){
                    echo "alert('Modification Réussie')";
                }
                
                echo "</script>";
            }
            ?>
            <script>
        // JS function to show/hide the insertion form
        function showInsertionForm() {
            var form = document.getElementById('contactForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>

    </body>
</html>
