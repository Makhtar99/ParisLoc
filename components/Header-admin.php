<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unco</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <header>
        <div>
            <a href=""><img class="logo" src="./components/logo.png" alt="logo"></a>
            <ion-icon id="showButton" name="menu-outline"></ion-icon>
        </div>
        <div id="sidebar">
            <ion-icon name="close-outline" id="closeButton"></ion-icon>
            <ul>
                <li><a href="#">Ajouter un logement</a></li>
                <li>____________</li>
                <li><a href="#">Reservations</a></li>
                <li>____________</li>
                <li><a href="#">Messagerie</a></li>
                <li>____________</li>
                <li><a href="#">Clients</a></li>
            </ul>
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
        html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}








        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            width: 86%;
            padding: 15px 0;
            display: flex;
            height: 100px;
            margin-right: 7%;
            margin-left: 7%;
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
            margin-top: 15px;
        }
        ul li a {
            list-style: none;
            width: 100%;
            text-decoration: none;
            font-size: 18px;
            color: black;
            text-decoration: underline 0.15em rgba(255, 255, 255, 0);
        }
        ul li a:hover{
            color: #515151;
        }
        ul li {
            
            margin: 15px 20px;
        }

        #sidebar {
            border: 1px solid black;
            border-radius: 15px 0px;
            background-color: white;
            color: black;
            padding: 0px 20px;
            position: fixed;
            display: block;
            top: 0;
            right: 0;
            padding-bottom: 15px;
            width: 250px;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 99;
        }
    </style>
</body>
</html>
