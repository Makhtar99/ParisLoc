<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: reservation.php");
   exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: reservation.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-primary" value="Login" name="submit">
            </div>
        </form>
        <div><p>Not registered yet? <a href="registration.php">Register here</a></p></div>
    </div>
</body>
</html>
