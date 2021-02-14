<?php include 'header.php'; ?>
   
<?php

session_start();
if(! $_SESSION['s_supplier']){
   header('location:login.php');
   die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


  
</body>
</html>