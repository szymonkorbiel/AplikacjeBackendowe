<!DOCTYPE HTML>
<html>
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
            <li><a href="index.php" class="list">Strona główna</a></li>
            <li><a href="galeria.html" class="list">Galeria</a></li>
            <li><a href="rezerwacja.php" class="list">Rezerwuj!</a></li>  
            </ol>
            </div> 
		</header>
<?php

        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "hotel";
    
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    
    $osobyy = $_GET["osobyy"];
    $dnii = $_GET["dnii"];
    $pokojj = $_GET["pokojj"];


$usun = "DELETE FROM rezerwacje WHERE dni = '$dnii'";

if(mysqli_query($polaczenie, $usun)){
    echo "<script type='text/javascript'>alert('Rezerwacja odwołana!');</script>";
} else {
    $blad = mysqli_error($polaczenie);
    echo "<script type='text/javascript'>alert('Wystąpił błąd $blad');</script>";
}
mysqli_close($polaczenie);
?>
    <div id="special">
    <p class="spec">Przepraszamy, jeśli nie udało się nam spełnić państwa oczekiwań. Poprawimy się i czekamy na pomyślną współpracę w przyszłości :)</p>
	<div id="blank"><a id="powrot"></a></div>
	<div id="zdjecia"></div>
	<img src="Grafika/23.png" class="galeria" alt="zdj6"/>
        
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