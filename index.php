<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="boy.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Team-Awesome | Login</title>
</head>
<body>

    <div class="awesome-sign-in">
        <img src="avatar.png" alt="" srcset="">
        <h1>Log in</h1>
        <form name="loginForm" action="" method="post">
            <input type="email" name="email" class="input-box" placeholder="Email..." required>
            <input type="password" name="password" class="input-box" placeholder="Password..." required>

            <label for="remember">
            <p ><span id=""><input type="checkbox" name="remember" id="remember"></span> Remember me</p>
            </label>
            <p id="error-message"></p>
            <input type="submit" name="submit" class="login-button" value="LOG IN">
            <hr>
        </form>
        <p class="or">OR</p>

        <button class="facebook-button">Login with Faceboook</button>
        <p>Don't have an account? <a href="signup.php">sign up</a></p>
    </div>
 <script src="login.js"></script>

 <?php

	if(isset($_SESSION['use']))   
	 {
	    header("Location:home.php"); 
	 }
	

	if(isset($_POST['submit']))  
	{
	     $email = $_POST['email'];
	     $pass = $_POST['password'];

	    if(isset($_POST["submit"])){
	    $file = fopen('data.txt', 'r');
	    $good=false;
	    while(!feof($file)){
	        $line = fgets($file);
	        $array = explode("|", $line);
	    if(trim($array[3]) == $_POST['email'] && trim($array[5]) == $_POST['password']){
	            $good=true;
	            break;
	        }
	    }

	    if($good){
	    $_SESSION['use'] = $email;
	        echo '<script type="text/javascript"> window.open("home.php","_self");</script>';  
	    }else{
	        echo "<script> document.getElementById('error-message').innerHTML = 'Email or password incorrect'</script>";
	    }
	    fclose($file);
	    }
	    else{
	        return "index.php";
	    }

	}
?>

</body>
</html>