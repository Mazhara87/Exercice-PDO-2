<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du patient</title>
</head>
<body>
    <h1>Profil du patient</h1>

    <?php
    require_once('connexion.php');

    try {
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $query = "SELECT * FROM patients WHERE id = :id";
            $request = $db->prepare($query);
            $request->bindParam(':id', $_GET['id'], $db::PARAM_INT);
            $request->execute();

            if ($request->rowCount() > 0) {
                $patient = $request->fetch($db::FETCH_ASSOC);
                echo "<p><strong>Prénom :</strong> " . $patient['firstname'] . "</p>";
                echo "<p><strong>Nom :</strong> " . $patient['lastname'] . "</p>";
                echo "<p><strong>Date de naissance :</strong> " . $patient['birthdate'] . "</p>";
                echo "<p><strong>Téléphone :</strong> " . $patient['phone'] . "</p>";
                echo "<p><strong>Email :</strong> " . $patient['mail'] . "</p>";

                echo "<a href='update-patient.php?id=" . $patient['id'] . "'>Modifier le patient</a>";
            } else {
                echo "Aucun patient trouvé.";
            }
        } else {
            echo "Identifiant du patient non valide.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
    ?>
</body>
</html>
