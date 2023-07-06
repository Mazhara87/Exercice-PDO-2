<?php
require_once('connexion.php');


// if ($dns->connect_error) {
//     die("Не удалось подключиться к базе данных: " . $dns->connect_error);
// }

// Получение списка пациентов
$sql = "SELECT * FROM patients";
$result = $dns->query($sql);

$patients = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

// Обработка формы изменения пациента
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientId = $_POST["patientId"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $birthdate = $_POST["birthdate"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];

    // Обновление информации о пациенте в базе данных
    $sql = "UPDATE patients SET lastname='$lastname', firstname='$firstname', birthdate='$birthdate', phone='$phone', mail='$mail' WHERE id=$patientId";

    if ($dns->query($sql) === TRUE) {
        echo "Ok.";
    } else {
        echo "Erroeur: " . $dns->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification Patient</title>
</head>
<body>
    <h2>Modification Patient</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="patientId">choose patient:</label>
        <select name="patientId" required>
            <?php foreach ($patients as $patient) { ?>
                <option value="<?php echo $patient["id"]; ?>"><?php echo $patient["firstname"] . " " . $patient["lastname"]; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <h3>ajout information:</h3>
        <label for="lastname">Nom:</label>
        <input type="text" name="lastname" required><br><br>

        <label for="firstname">Prenom:</label>
        <input type="text" name="firstname" required><br><br>

        <label for="birthdate">Date:</label>
        <input type="date" name="birthdate" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone"><br><br>

        <label for="mail">Email:</label>
        <input type="email" name="mail" required><br><br>

        <input type="submit" value="ajout">
    </form>
</body>
</html>


