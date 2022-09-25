<?php
session_start();
 
// sprawdzenie czy zalog
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
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
            <li><a href="welcome.php" class="list">Strona główna</a></li>
            <li><a href="galeria.php" class="list">Galeria</a></li>
            <li><a href="rezerwacja.php" class="list">Rezerwuj!</a></li>  
            <li><a href="main.php" class="list">Sprawdź rezerwacje</a></li>
                
            </ol>
            </div> 
		</header>
	<?php
        
        
        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "hotel";
    
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    
    
    $osoby = $_GET["osoby"];
    $dni = $_GET["dni"];
    $pokoj = $_GET["pokoj"];
    
    $zapytanie = "insert into rezerwacje values ('','$pokoj','$dni','$osoby')";
        
    $wynik = $polaczenie -> query($zapytanie ) or die($polaczenie->error);
    
    $liczenie = @ mysqli_affected_rows($wynik);
    if($wynik){
	echo $liczenie."<script type='text/javascript'>alert('Rezerwacja powiodła się!');</script>";
    header("location: main.php");
    exit;
    }
    else{
	echo "<script type='text/javascript'>alert('Wystąpił błąd');</script>";}
        
    mysqli_close($polaczenie);
        
    ?>
        	<div id="special">
                <p class="spec">Gratulujemy udanej rezerwacji i życzymy miłego pobytu w naszym hotelu.</p>
	<div id="blank"><a id="powrot"></a></div>
	<div id="zdjecia"></div>
	<img src="Grafika/23.png" class="galeria" alt="zdj6"/>
        
	</div>

			<footer>
                <a href="https://www.facebook.com/" target="_blank"> <img src="Grafika/fb.png"  class="soc" alt="fb" /></a>
				<a href="https://accounts.google.com/AddSession?hl=pl&continue=https://mail.google.com/mail&service=mail#identifier" target="_blank" >
				<img src="Grafika/gm.png" class="soc" alt="gm" /> </a>
                				<a href="https://twitter.com/?lang=pl" target="_blank"><img src="Grafika/tw.png"  class="soc" alt="tw" /></a>
			<p> Copyright 2019 &copy; Szymon Korbiel </p>
            <p>szymon.korbiel@gmail.com</p>
			</footer>
</body>
</html>