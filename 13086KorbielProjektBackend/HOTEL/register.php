<?php
require_once "config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj login.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Login może zawierać tylko litery i cyfry.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($polaczenie, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ten login jest zajęty.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Coś poszło nie tak spróbuj później.";
            }


            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi mieć conajmniej 6 znaków.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła się nie zgadzają.";
        }
    }
    

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($polaczenie, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // szyfrowanie
            
            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
            } else{
                echo "Coś poszło nie tak spróbuj później.";
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
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class=" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class=" <?php echo (!empty($password_err)) ? 'jest niepoprawne' : ''; ?>" value="<?php echo $password; ?>">
                <span><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Masz już konto? <a href="login.php">Zaloguj się</a>.</p>
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

 