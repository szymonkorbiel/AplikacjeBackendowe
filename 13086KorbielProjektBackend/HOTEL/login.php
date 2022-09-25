<?php
session_start();
 
// sprawdzenie czy już zalogowany
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// załączenie pliku cfg
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// przetworzenie danych z formularza
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // login pusty
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj login.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // hasło puste
    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // walidacja danych z formularza
    if(empty($username_err) && empty($password_err)){
        // wyrażenie wypisujace dane z bazy
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($polaczenie, $sql)){
            // przypisanie zmiennych z wyrażenia jako parametr
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                // przechowanie wyciagnietych danych
                mysqli_stmt_store_result($stmt);
                
                // sprawdzenie loginu i weryfikacja hasła
                if(mysqli_stmt_num_rows($stmt) == 1){  
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // jeżeli hasło jest git to init sesji
                            session_start();
                            
                            // przechowanie danych
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // przekierowanie do strony start
                            header("location: welcome.php");
                        } else{
                            $login_err = "Złe hasło.";
                        }
                    }
                } else{
                    $login_err = "Zły login.";
                }
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
	<title>Logowanie Hotel - Continental Krakow </title>
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

    <div class="wrapper">

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Login&nbsp;</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Zaloguj">
            </div>
            <p>Nie masz konta? <a href="register.php">Zarejestruj tutaj</a>.</p>
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

 
