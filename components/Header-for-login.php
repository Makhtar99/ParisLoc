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
    justify-content: center;
}
header a {
    width: 100%;
    height: 100%;
    justify-content: center;
    text-decoration: none;
    font-style: none;
    display: flex;
}
header a img{
    margin: 0;
}
    </style>
</head>
<body>
        <header href="Homepage.php">
            <a href="../welcome.php"><img src="components/logo2.png"  alt="UNCO"></a>
        </header>
    <br>
</body>
</html>