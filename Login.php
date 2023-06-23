<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: welcome.php");
   exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database/database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: welcome.php");
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
    <link rel="icon" type="image/png" href="components/logo2.png">
    <link rel="stylesheet" href="css js/login&signup.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <?php include 'components/Header-for-login.php'; ?>
    <section class="Connexion ">
        <div class="login">
            <div class="create">
                <h2>Connexion</h2>
            </div>
            <form action="login.php" method="post">

            <div class="field-wrap">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="field-wrap">
                <input  type="password" name="password" placeholder="Password">
            </div><br>
            <div class="remember-parent">
                <div class="remember">
                    <input type="checkbox">
                    <span>Se souvenir de moi</span>
                </div>
                <a href="#">Mot de passe oublier?</a>
            </div>
            <br>
            
            <input class="button-connect" value="Login" type="submit">Se connecter</input>
            </form>

            <br><br>
            <div class="barre">
                <div></div>
                <p>ou</p>
                <div></div>
            </div><br>
            <div>
                <label style="font-size: 18px;">Compte existant</label>
            </div><br>
            <button class="button-log-fake" onclick="window.location.href = 'signup.php';">S'inscrire</button>
        </div>
    </section>


</body>
</html>
