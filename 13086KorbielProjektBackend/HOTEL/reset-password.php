<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
require_once "config.php";
 
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // walidacja nowego hasla
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Wprowadź nowe hasło.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Hasło musi zawierać przynajmniej 6 znaków.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // walid potwierdz
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Hasła nie są takie same.";
        }
    }
        
    // sprawdzenie błędów danych
    if(empty($new_password_err) && empty($confirm_password_err)){

        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($polaczenie, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            

            if(mysqli_stmt_execute($stmt)){
                // update hasla i przekierowanie do strony log
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Coś poszło nie tak spróbuj ponownie.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($polaczenie);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zmiana hasła Hotel - Continental Krakow </title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="icon" type="image/x-icon" href="Grafika/logo.png"> 
	<meta name="author" content="Szymon Korbiel"/>
	<meta name="language" content="pl"/>
	<meta name="description" content="Hotel, Continental" />
</head>
<body>
    <aside>
					<div class="logo">
						<img src="Grafika/logo.png" class="foto" alt="Logo">
					</div>
						
					<h1 id="glowny">Hotel, w którym zechcesz spędzić więcej niż jedną noc...</h1><br>

    <div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div>
                <label>Nowe hasło</label>
                <input type="password" name="new_password" class=" <?php echo (!empty($new_password_err)) ? 'jest niepoprawne' : ''; ?>" value="<?php echo $new_password; ?>">
                <span><?php echo $new_password_err; ?></span>
            </div>
            <div>
                <label>Potwierdź</label>
                <input type="password" name="confirm_password" class=" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span><?php echo $confirm_password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Zmień">
                <a href="welcome.php">Anuluj</a>
            </div>
        </form>
    </div>    
</aside>
    	<article>
	<div id="blank"><a id="powrot"></a></div>
	<div id="zdjecia"></div>
	<h2>NAJWAŻNIEJSZE INFORMACJE</h2><br>
        <img src="Grafika/19.png" class="galeria" alt="zdj1"/>
	<p class="spec">Spełniamy marzenia od 1871 roku. Oferujemy najwyższe standardy wypoczynku w centrum Krakowa.</p>


	<img src="Grafika/20.png" class="galeria" alt="zdj2"/>
	<img src="Grafika/21.png" class="galeria" alt="zdj3"/>
	<img src="Grafika/22.png" class="galeria" alt="zdj4"/>
	<img src="Grafika/23.png" class="galeria" alt="zdj5"/>
	<img src="Grafika/24.png" class="galeria" alt="zdj6"/>
	
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