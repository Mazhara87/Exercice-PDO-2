<?php


require_once('connexion.php');

// var_dump($_POST);

if(
    isset($_POST['first_name']) && !empty($_POST['first_name'])
    &&isset($_POST['last_name']) && !empty($_POST['last_name'])
    &&isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    &&isset($_POST['phone']) && !empty($_POST['phone'])
    &&isset($_POST['mail']) && !empty($_POST['mail'])
){
    $data = [
        'firstname' => $_POST['first_name'],
        'lastname' => $_POST['last_name'],
        'birthdate' => $_POST['birthdate'],
        'phone' => $_POST['phone'],
        'mail' => $_POST['mail'],
    ];
    $sql = "INSERT INTO patients (firstname, lastname, birthdate, phone, mail) VALUES (:firstname, :lastname, :birthdate, :phone, :mail)";
    $request= $db->prepare($sql);
    $request->execute($data);
}
header('Location: liste-patients.php')
?>