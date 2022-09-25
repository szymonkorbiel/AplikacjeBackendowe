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
            <br><br>
            <ol>
            <li><a href="welcome.php" class="list">Strona główna</a></li>
            <li><a href="galeria.php" class="list">Galeria</a></li>
            <li><a href="rezerwacja.php" class="list">Rezerwuj!</a></li>
            <li><a href="main.php" class="list">Sprawdź rezerwacje</a></li>
            <li><a href="logout.php">Wyloguj z konta</a></li>    
            </ol>
            
            
            
            </div> 
		</header>
       
			<aside>
					<div class="logo">
						<img src="Grafika/logo.png" class="foto" alt="Logo">
					</div>
						
					<h1 id="glowny">Hotel, w którym zechcesz spędzić więcej niż jedną noc...</h1><br>
                <p class="h1a"> 6 gwiazdek w przewodniku Michelin. <br> Nasz hotel spełnia najwyższe standardy we wszystkich dziedzinach. Niejednokrotnie w naszym hotelu gościł Mr. John Wick.<br> - znany szerzej jako Keanu Reeves<br><br></p>
 
			</aside>

	<article>
	<div id="blank"><a id="powrot"></a></div>
	<div id="zdjecia"></div>
	<h2>WYPEŁNIJ FORMULARZ</h2><br>
        <img src="Grafika/20.png" class="galeria" alt="zdj1"/>
        <p class="spec">Spełniamy marzenia od 1871 roku. Oferujemy najwyższe standardy wypoczynku w centrum Krakowa.</p>
    <div class="galeria">
        <p class="h1a">Zarezerwuj!</p>
        <br>
        
        <form method="get" action="dodawanie.php">
        <table>
        <tr>    
          <tr>
        <td><p> Pokój: <select name="pokoj">
            <option value="apartament"> Apartament</option>
            <option value="kameralny"> Kameralny</option>
            <option value="sredniak"> Średniak</option>
            </select> </p></td><br>
         <br>
        </tr>
        <tr> 
        <td><p> Liczba dni<br> <input type="text" name="dni" required> </p></td> 
        <tr> 
        </tr>
        <tr> 
        <td><p> Osoby (ilość) <input type="text" name="osoby" required> </p> </td>   <br>
        </tr>
        </table>  
            <br>
        &nbsp; &nbsp;<input type="submit" value="Rezerwuj!">
        </form>
        <br>
    </div>
        <div class="galeria">
        <br>
        <p class="h1a">Usuń rezerwację!</p>
        <form method="get" action="usuwanie.php">
        <table>
        <tr>    
          <tr>
        <td><p> Pokój: <select name="pokojj">
            <option value="apartament"> Apartament</option>
            <option value="kameralny"> Kameralny</option>
            <option value="sredniak"> Średniak</option>
            </select> </p></td><br>
         <br>
        </tr>
        <tr> 
        <td><p> Liczba dni<br> <input type="text" name="dnii" required> </p></td> 
        <tr> 
        </tr>
        <tr> 
        <td><p> Osoby (ilość) <input type="text" name="osobyy" required> </p> </td>   <br>
        </tr>
        </table>  
            <br>
        &nbsp; &nbsp;<input type="submit" value="Usuń!">
        </form>
        <br>
    </div>
        
	<a href="#powrot"><img src="Grafika/strzalka.jpg" id="return" alt="zdj7"/></a>
	
	
	</article>
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