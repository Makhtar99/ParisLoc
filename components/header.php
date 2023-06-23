<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unco</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../css js/style.css" />
</head>

<body>
    <header>
        <div class="wrapper">
            <div>
                <a href="welcome.php"><img class="logo" src="assets/Logo.svg" alt="logo"></a>
                <ion-icon id="showButton" name="menu-outline"></ion-icon>
            </div>
            <div id="sidebar">
                <ion-icon name="close-outline" id="closeButton"></ion-icon>
                <ul>
                    <li><a href="#">Ajouter un logement</a></li>
                    <li><a href="#">Reservations</a></li>
                    <li><a href="#">Messagerie</a></li>
                    <li><a href="#">Clients</a></li>
                </ul>
            </div>
        </div>
    </header>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        var sidebar = document.getElementById("sidebar");
        var showButton = document.getElementById("showButton");
        var closeButton = document.getElementById("closeButton");

        showButton.addEventListener("click", function() {
            sidebar.style.transform = "translateX(0)";
        });

        closeButton.addEventListener("click", function() {
            sidebar.style.transform = "translateX(100%)";
        });
    </script>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background: white;
            width: 100%;
            padding: 15px 0;
            display: flex;
        }

        header div {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        #showButton{
            font-size: 60px;
        }
        #closeButton{
            font-size: 28px;
        }
        ul li a {
            list-style: none;
            width: 100%;
            text-decoration: none;
            font-size: 18px;
            color: black;
            text-decoration: underline 0.15em rgba(255, 255, 255, 0);
        }
        ul li {
            
            margin: 15px 20px;
        }

        #sidebar {
            background-color: #f3f3f3;
            color: #333;
            padding: 20px;
            position: fixed;
            display: block;
            top: 0;
            right: 0;
            width: 250px;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 99;
        }
    </style>
</body>
</html>