<?php
session_start();
 
// sprawdzenie czy zalog
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="pl-PL">
	<head>
	<title> Hotel - Continental Krakow </title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="icon" type="image/x-icon" href="Grafika/logo.png"> 
	<meta name="author" content="Szymon Korbiel"/>
	<meta name="language" content="pl"/>
	<meta name="description" content="Hotel, Continental" />
	</head>
    <body>
		<header>
            <div id="list">
            <ol>
            <li><a href="welcome.php" class="list">Strona główna</a></li>
            <li><a href="galeria.php" class="list">Galeria</a></li>
            <li><a href="rezerwacja.php" class="list">Rezerwuj!</a></li>  
            </ol>
            </div> 
		</header>
			
	<div id="special">
	<div id="blank"><a id="powrot"></a></div>
	<div id="zdjecia"></div>
	<h2>Kilka zdjęć</h2>
    <p class="spec">Tego wspaniałego hotelu.</p>
    <img src="Grafika/19.png" class="galeria" alt="zdj2"/>
	<img src="Grafika/20.png" class="galeria" alt="zdj3"/>
	<img src="Grafika/21.png" class="galeria" alt="zdj4"/>
	<img src="Grafika/22.png" class="galeria" alt="zdj5"/>
	<img src="Grafika/23.png" class="galeria" alt="zdj6"/>
        
        <a href="#powrot"><img src="Grafika/strzalka.jpg" id="return" alt="zdj7"/></a>
	</div>
			<footer>
                <a href="https://www.facebook.com/" target="_blank"> <img src="Grafika/fb.png"  class="soc" alt="fb" /></a>
				<a href="https://accounts.google.com/AddSession?hl=pl&continue=https://mail.google.com/mail&service=mail#identifier" target="_blank" >
				<img src="Grafika/gm.png" class="soc" alt="gm" /> </a>
                				<a href="https://twitter.com/?lang=pl" target="_blank"><img src="Grafika/tw.png"  class="soc" alt="tw" /></a>
			<p> Copyright 2022 &copy; Szymon Korbiel </p>
            <p>szymon.korbiel@gmail.com</p>
			</footer>
</body>
</html>