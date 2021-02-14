
<?php
ob_start();
include '../var.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/header.css">
<script src="../js/jquery.js"></script>
<script defer src="../js/login.js"></script>

</head>
<body>
    
<?php include '../headre.php'; ?>

<!-- start of login part -->
<div class="login_parent">

    <div class="login_part">
        <form action="login.php" method="POST">
        <h1>Login now</h1>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pass" onkeyup="password()" id="t_password" placeholder="*****">
        <p style="color: red;" id="err_password">Password error</p>
        <input type="submit" name="submit" id="btn" value="login">
        </form>
        
        <hr>
        <p>if you don't have account
            <a href="signup.php">Signup now</a> ?
        </p>
        <a href="forget.html">forget password</a>
        <div class="space"></div>
    </div>

</div>


<!-- end of login part -->

<?php

if(isset($_POST['submit']) and $_POST['submit']=="login"){

    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $omtokiss = '3LifeJoseph';   
$method = 'aes-256-cbc';     

// Must be exact 32 chars (256 bit)
$omtokiss = substr(hash('sha256', $omtokiss, true), 0, 32);
//echo "Password:" . $password . "\n";

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$enc_pass = base64_encode(openssl_encrypt($pass, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));



    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
     $check_email="select email,password from supplier where email='$email' and password='$enc_pass'";
     $sql_email=mysqli_query($con,$check_email);
     if(mysqli_num_rows($sql_email)>0){
            session_start();
            $_SESSION['s_supplier']=$email;
           
                header("location:setting.php");

            }else{
                echo '<script>alert("besure from your info");</script>';
        }

        }else{
            echo '<script>alert("bs sure from your info");</script>';
        }       

    }





?>

</body>
</html>