
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unco</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <div class="wrapper">
            <h1>
                <a href="">
                    <img
                    class="logo"
                    src="assets/unco logo.png"
                    alt="logo">
                </a>
            </h1>

            <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">×</a>
                <ul>
                    <li><a href="#">Mon profil</a></li>
                </ul>
            </div>

                <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                </a>
        </div>
    
    </header>

<script>
    var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}
</script>

<style>
    header{
    background: white;
	width: 100%;
    padding: 15px 0;
}

header .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


header .logo{
    width: 100px;
    height: 60px;
}


header .search_bar {
    display: flex;
    align-items: center;
    

    background: rgba(255, 255, 255, 0.826);
    border-radius: 30px;
} 

header .search_bar span {
    font-family: 'Poppins';
    margin: 0 40px;
} 

header .search_bar hr {
    height: 30px;
}

</style>
