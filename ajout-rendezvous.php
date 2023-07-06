<?php
require_once('connexion.php');

$query = "SELECT * FROM patients";
$request = $db->query($query);
$patients = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout Rendezvous</title>
</head>
<body>
    <h2>Ajout Rendezvous</h2>
    <form method="post" action="./process_add_rendezvous.php">
        <label for="patientId">Выберите пациента:</label>
        <select name="patientId" required>
            <?php foreach ($patients as $patient) { ?>
                <option value="<?php echo $patient["id"]; ?>"><?php echo $patient["firstname"] . " " . $patient["lastname"]; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="dateHour">Дата и время рандеву:</label>
        <input type="datetime-local" name="dateHour" required><br><br>
        <input type="submit" value="Добавить рандеву">
    </form>
</body>
</html>