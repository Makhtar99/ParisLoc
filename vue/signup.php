<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="components/logo2.png">
    <link rel="stylesheet" href="css js/Login&Signup.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Signup</title>
</head>
<body>

    <?php include 'components/header.php'; ?>

    <section class="Creation ">
        <div class="signup" >
            <div class="create">
                <a href="login.php"><ion-icon  class="return" name="arrow-back-outline"></ion-icon></a>
                <h2>Création de compte</h2>
            </div>
            <form action="./controls/signupcontroller.php" method="post">
            <div class="field-wrap">
                <input type="text" name="username" placeholder="username">
            </div>
            <div class="field-wrap">
                <input type="text" name="Name" placeholder="Name">
            </div>
            <div class="field-wrap">
                <input type="text" name="Familyname" placeholder="Familyname">
            </div>
            <div class="field-wrap">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="field-wrap">
                <input  type="password" name="password" placeholder="Password">
            </div>
            <div class="field-wrap">
                <input type="password" name="repeat_password" placeholder="Repeat Password">
            </div><br>

            <div class="remember">
                <input type="checkbox">
                <label for="">Se souvenir de moi</label>
            </div><br>
            
            <button class="button-log " type="submit">S'inscrire</button>

            <br><br>
            </form>
            <div class="barre">            
                <div></div>
                <p>ou</p>
                <div></div>
            </div><br>
            <div>
                <label style="font-size: 18px;">Compte existant</label>
            </div><br>
            <button  class="button-connect-fake "><a href="login.php">Se connecter</a></button>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
