<?php
session_start();
require 'dbconfig.php';


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {
    $sql = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $sql->bindValue(':email', $email);
    $sql->execute();
    $count = $sql->rowCount();
    if($count === 0) {
        $sql = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name); //binda apenas o valor
        $sql->bindValue(':email', $email);
        $sql->execute();
        header('location: index.php');
        exit;
    }
    $_SESSION['warning'] = 'O email digitado já foi cadastrado. Por favor preencha novamente';
    header('location: add.php');
    exit;
} else {
    header('location: add.php');
    exit;
}