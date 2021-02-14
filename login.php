<?php 
ob_start();
include 'var.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/header.css">
<script src="js/jquery.js"></script>
<script defer src="js/login.js"></script>



</head>
<body>
  <?php include 'headre.php'; ?>


<!-- start of login part -->
<div class="login_parent">

    <div class="login_part">
        <form action="login.php" method="POST">
        <h1>Login now</h1>
        <input type="email" name="email"  placeholder="Email">
        <input type="password" name="pass" onkeyup="password()" id="t_password" placeholder="*****">
        <p style="color: red;" id="err_password">Password error</p>
        <input type="submit" name="submit" id="btn" value="Login">
        </form>
        <hr>
        <p>if you don't have account
            <a href="signup.php">Signup now</a> ?
        </p>
        <a href="forget.php">forget password</a>
        <div class="space"></div>
    </div>

</div>


<!-- end of login part -->

<?php

if(isset($_POST['submit']) and $_POST['submit']=="Login"){

    $email=$_POST['email'];
    $pass=$_POST['pass'];



        $check_email="select email,password from custmor where email='$email' and password='$pass'";
        $sql_email=mysqli_query($con,$check_email);
        if(mysqli_num_rows($sql_email)>0){
            session_start();
            $_SESSION['customer_in']=$email;
            // if there is session or payment process
            if($_SESSION['payment_action']){
                header("location:payment.php");
            }else{
                header("location:profile.php");
            }
            

        }else{
            echo '<script>alert("be sure of your info");</script>';
        }

      
    
}



?>





</body>
</html>