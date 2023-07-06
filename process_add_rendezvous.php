<?php
require_once('connexion.php');

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(
        isset($_POST['patientId']) && !empty($_POST['patientId'])
        &&isset($_POST['dateHour']) && !empty($_POST['dateHour'])
    ){
        // Добавление нового рандеву в базу данных
        $sql = "INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)";
        $request = $db->prepare($sql);
        $data = [
            ':dateHour' => $_POST['dateHour'],
            ':idPatients' => $_POST['patientId']
        ];
        $request->execute($data);
    }

    header('Location: liste-rendezvous.php');

}
?>