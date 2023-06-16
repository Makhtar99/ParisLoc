
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="components/logo2.png">
    <link rel="stylesheet" href="Login&Signup.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <?php include 'components/Header-for-login.php'; ?>

    <section class="Connexion ">
        <div class="login">
            <div class="create">
                <ion-icon class="return" name="arrow-back-outline"></ion-icon>
                <h2>Connexion</h2>
            </div>

            <div class="field-wrap">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="field-wrap">
                <input  type="password" name="password" placeholder="Password">
            </div><br><br>


            <div class="remember-parent">
                <div class="remember">
                    <input type="checkbox">
                    <span>Se souvenir de moi</span>
                </div>
                <a href="#">Mot de passe oublier?</a>
            </div>
            <br><br>
            
            <button class="button-connect" type="submit">Se connecter</button>

            <br><br>
            <div class="barre">
                <div></div>
                <p>ou</p>
                <div></div>
            </div><br>
            <div>
                <label style="font-size: 18px;">Compte existant</label>
            </div><br>
            <button href='Signup.php' class="button-log-fake"><a href="Signup.php">S'inscrire</a></button>
        </div>
    </section>

    <?php include 'components/Footer-for-login.php'; ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>






