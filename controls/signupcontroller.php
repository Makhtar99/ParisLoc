<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: vue/login.php");  
   exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $Name = $_POST["Name"];
    $Familyname = $_POST["Familyname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    // ... (Validation des champs, vérification de l'unicité de l'utilisateur, etc.)

    // Si tout est valide, enregistrez l'utilisateur dans la base de données

    require_once "vue/database/Airbnb.sql";
    $sql = "INSERT INTO users (username, name, familyname, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $Name, $Familyname, $email, $passwordHash]);
    $_SESSION["user"] = $user; // Enregistrez l'utilisateur dans la session

    header("Location: vue/login.php");  
    exit;
}

require_once "vue/signup.php";
