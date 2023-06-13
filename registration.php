<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");  
   exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $Name = $_POST["Name"];
    $Familyname = $_POST["Familyname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = [];

    if (empty($username) || empty($Name) || empty($Familyname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        array_push($errors, "All fields are required"); 
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      array_push($errors, "Email is not valid");

    }

    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    if ($password !== $passwordRepeat) {
        array_push($errors, "Passwords do not match");
    }

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $row_count = $stmt->rowCount(); 

    if ($row_count > 0) {
        array_push($errors, "Email already exists");
    }

    if (count($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'> $error</div>";
        }
    } else {
        $sql = "INSERT INTO users (username, name, familyname, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $Name, $Familyname, $email, $passwordHash]);
        echo "<div class='alert alert-success'> You are registered successfully.</div>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="Name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="Familyname" placeholder="Familyname">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
    <div><p>Already registered <a href="login.php">login here</a></p></div>
</div>

</body>
</html>
