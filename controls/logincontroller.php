<?php

require_once 'models/loginmod.php';

session_start();

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = getUserByEmail($email);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: index.php");
        exit;
    } else {
        $loginError = "Adresse e-mail ou mot de passe incorrect.";
    }
}

require 'vue/login.php';

?>

