<?php
require_once('connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des rendez-vous</title>
</head>
<body>
    <h1>Liste des rendez-vous</h1>

    <a href="ajout-rendezvous.php">Créer un nouveau rendez-vous</a><br><br>

    <?php
    $query = "SELECT * FROM appointments";
    $request = $db->query($query);

    if ($request->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Nom</th><th>Prenom</th><th>Date et heure du rendez-vous</th></tr>";
        while ($appointment = $request->fetch($db::FETCH_ASSOC)) {

            $query = "SELECT * FROM patients WHERE id = :id";
            $req = $db->prepare($query);
            $req->bindParam(':id', $appointment['idPatients'], $db::PARAM_INT);
            $req->execute();
            $patient=$req->fetch();


            echo "<tr>";
            echo "<td>".$patient['lastname']."</td>";
            echo "<td>".$patient['firstname']."</td>";
            echo "<td>".$appointment['dateHour']."</td>";     
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Il n'y pas de RDV disponible.";
    }
    ?>
</body>
</html>