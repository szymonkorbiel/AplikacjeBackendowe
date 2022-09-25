<!DOCTYPE HTML>
<html>
<head>
    <title> Hotel - Continental Krakow </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div>
        <h1> Hotel - Continental Krakow </h1>
            <?php
        
        
        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "hotel";
    
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    
    
        $wyrazenie = trim($_GET["wyrazenie"]);
        $metoda = $_GET['metoda'];
    
   $zapytanie1 = "select * from rezerwacje where ". $metoda." like '%".$wyrazenie."%'";
    
    $zapytanie2 = "select count(*) from rezerwacje where ". $metoda." like '%".$wyrazenie."%'";   
        
    $wynik1 = $polaczenie -> query($zapytanie1 ) or die($polaczenie->error);
    
    $wynik2 = $polaczenie -> query($zapytanie2 ) or die($polaczenie->error);
    
    $wiersz1=$wynik1->fetch_assoc();   
        
    $ilosc_wierszy1 =  mysqli_num_rows($wynik1);
    $ilosc_wierszy2 =  mysqli_num_rows($wynik1);
    for($i=0;$i<$ilosc_wierszy1;$i++){
                
        echo("<p class='h1a'>Pokoj: ".$wiersz1["pokoj"]."  Dni: ".$wiersz1['dni']."  Osoby: ".$wiersz1["osoby"]."</p><br>");
    }
    $wynik1 -> free();
    $wynik2 -> free();
    mysqli_close($polaczenie);
    ?>
        
    </div>
</body>
</html>