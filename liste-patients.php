<?php

require_once('connexion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des patients</title>
</head>
<body>
    <h1>Liste des patients</h1>

    <a href="ajout-patient.php">Créer un nouveau patient</a><br><br>

    <?php
    
    
    $query = "SELECT * FROM patients";
    $request = $db->query($query);

    if ($request->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Prénom</th><th>Nom</th><th>Date de naissance</th>
        <th>Phone</th><th>Mail</th></tr>";
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['birthdate']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['mail']."</td>";
            echo '<td><a href="profil-patient.php?id='. $row['id'] .'">Profil du patient</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun patient trouvé.";
    }  
    ?>
</body>
</html>