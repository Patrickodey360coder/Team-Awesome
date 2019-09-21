<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="boy.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="signup.css">
    <title>Team-Awesome | Sign-up </title>
</head>
<body>

    <div class="awesome-sign-in">
        <img src="avatar.png" alt="" srcset="">
        <h1 class="signup">Sign Up</h1>
        <form name= "regForm" action="" method="post">
            <input type="text" name="username" class="input-box" placeholder="Username..." required>
            <input type="email" name="email" class="input-box" placeholder="Email..." required>
            <input type="password" name="password" class="input-box" placeholder="Password..." required>
            <input type="password" class="input-box" placeholder="Confirm Password..." required>
            <p id="error-message"></p>
            <p id="success-message"></p>
            <input type="submit" name="submit" class="login-button" value="SIGN UP" >
            <hr>
            <p>Already have an account? <a href="index.php">Log in</a></p>
        </form>
        <p class="or">OR</p>
        <button class="facebook-button">Login with Faceboook</button>
    </div>
    <?php  
        
        

        if(isset($_SESSION['use']))
         {
            header("Location:home.php"); 
         }


        if(isset($_POST["submit"]))
        {
            // check if user exist.
            $file=fopen("data.txt","r");
            $findusername = false;
            while(!feof($file))
            {
                $line = fgets($file);
                $array = explode("|",$line);
                if(trim($array[1]) == $_POST['username'])
                {
                    $findusername=true;
                    break;
                }
            }
            fclose($file);

            $file=fopen("data.txt","r");
            $findemail = false;
            while(!feof($file))
            {
                $line = fgets($file);
                $array = explode("|",$line);
                if(trim($array[3]) == $_POST['email'])
                {
                    $findemail=true;
                    break;
                }
            }
            fclose($file);

            // register user or pop up message
            if( $findusername )
            {
                echo "<script> document.getElementById('error-message').innerHTML = 'Username already exist'</script>";
                return "signup.php";
            }

            if( $findemail )
            {
                echo "<script> document.getElementById('error-message').innerHTML = 'Email already exist, login if you are existing user'</script>";
                return "signup.php";
            }

            else
            {
                $file = fopen("data.txt", "a");
                fputs($file, "\r\nUsername: |".$_POST["username"]."| Email: |".$_POST["email"]."| Password: |".$_POST["password"]."|");
                fclose($file);

                echo "<script> document.getElementById('success-message').innerHTML = 'Resgistration successful, Please login'</script>";


            }
        }
        else
        {
            return "signup.php";
        }
        ?>


</body>
</html>