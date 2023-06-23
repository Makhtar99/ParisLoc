<!DOCTYPE html>
<html lang="en">
<head>
    <title>Header</title>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <style>
        *{
    margin: 0;
    padding: 0;
}
@font-face {
    font-family: 'MonteCarlo';
    src: url("MonteCarlo/MonteCarlo-Regular.ttf");
  }
header{
    width: 100%;
    display: flex;
    height: 100px;
    align-items: center;
    justify-content: space-between;
    /* margin-right: 7%;
    margin-left: 7%; */
}
header .logo {
    width: 100%;
    height: 100%;
    justify-content: center;
    text-decoration: none;
    display: flex;
}
header .logo img{
    margin: 0;
}
button {
    height: 60px;
    width: 14%;
    background: black;
    border: 1px solid black;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1%;
}
button a{
    color: white;
    text-decoration: none;
    font-size: 15px;
}
button :hover{
    transform: scale(1.2) ;
    transition: 0.5s;
}
    </style>
</head>
<body>
        <header >
            <a class="logo" href="../welcome.php"><img src="components/logo.png"  alt="UNCO"></a>
            <!-- <button><a href="../welcome.php">Deconnexion</a></button> -->
        </header>
    <br>
</body>
</html>