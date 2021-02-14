<?php
session_start();
include 'var.php';
ob_start();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>items</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/items.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.transform2d.js"></script>
    <script src="js/jquery.transform3d.js"></script>
    <script defer src="js/item.js"></script>
    
</head>
<body>

    <div id="all" style="display: block;">
    <form action="items.php" method="POST">

        <!--   shopping card icon-->
        <input type="submit" name="card_submit" value="<?php
           if($_SESSION['shopping_cart']){
               echo count($_SESSION['shopping_cart']);
           }

        ?>" id="shop_counter">
        </form>
        <img src="img/shop.png" id="shop_icon" alt="">
        <?php
        if (isset($_POST['card_submit'])){
        $_SESSION['payment_action']="sales";
        header('location:payment.php');

        }

?>

          <!--   shopping card icon-->

          <div class="parent_big_image"></div>
          <img src="" id="big_image" alt="">


<?php
include 'headre.php' ?>

    <!-- end of header -->
    
<!-- search -->
<div class="search">
<form action="items.php" method="get">
    <input type="search" name="e" placeholder="Search here..">
    <input type="submit" id="button" value="Search">
</div>
<!-- search -->

<!-- items parent div-->
<div class="parent_items">
<?php 
if(isset($_GET['e'])){
    $word=$_GET['e'];
$sql_get="select * from items_page where name like'%$word%'";
$run=mysqli_query($con,$sql_get);
while($row=mysqli_fetch_assoc($run)){

    $item_id=$row['item_id'];
    $name=$row['name'];
    $price=$row['price'];
    $desc=$row['short_desc'];
    $image=$row['img_url'];
 
?>
<!-- start of item part--> 
    <div class="item_part">
        <form target="no" action="items.php" method="POST">
        <input type="hidden" name="t_id" value="<?php echo $item_id; ?>">
        <input type="submit" name="submit" onclick="card_counter(this)" class="add" value="Get it">
</form>
<iframe name="no" src="" style="display:none;"></iframe>


        <img class="select" onclick="zoom_item(this)" src="<?php echo $image; ?>" />
        <p id="price">price EGP.<?php echo $price; ?></p>
        <p id="name"> <?php echo $name;?> </p> 
        <p id="desc">
        <?php echo $desc; ?>
         
        </p>
        <a href="<?php echo 'http://localhost/jet/item_detail.php?item='.$item_id; ?>">More</a>
        
    </div>
<!-- end of item part-->
<?php 
}
}else{

    $sql_get="select * from items_page";
$run=mysqli_query($con,$sql_get);
while($row=mysqli_fetch_assoc($run)){

    $item_id=$row['item_id'];
    $name=$row['name'];
    $price=$row['price'];
    $desc=$row['short_desc'];
    $image=$row['imageurl'];
 
?>
<!-- start of item part--> 
    <div class="item_part">
<?php
}
}
?>

</div>
<?php

if (isset($_POST['submit']) and $_POST['submit']=="Get it"){

      $id=$_POST['t_id'];
      $_SESSION['shopping_cart'][]=$id;
}

?>

  
<div class="footer">
    <p>All Rights &copy; Jet 2020 </p>
</div>


</div>
</body>
</html>