<?php
//dane polaczenia z baza
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hotel');
 
//laczenie z baza
$polaczenie = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// sprawdzenie polaczenia
if($polaczenie === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>