<?php
ob_start();
include '../var.php';
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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/items.css">
</head>
<body>
    

<?php include 'header.php'; ?>
<!-- items parent div-->
<div class="parent_items">
<?php
$email=$_SESSION['s_supplier'];
$sql_get="select * from items_page where supplier_email='$email'";
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
        <button id="add">Git it</button>
        <img class="select" onclick="zoom_item(this)" src="<?php echo $image; ?>" alt="">
        <p id="price">price EGP.<?php echo $price; ?></p>
        <p id="name"> <?php echo $name;?></p> 
        <p id="desc">
        <?php echo $desc; ?>
         
        </p>
   <form action="my_items.php"method="post">
       <input type="hidden" name="t_id" value="<?php echo $item_id; ?>">
       <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right" >
</form>
<form action="my_items.php"method="post">
       <input type="hidden" name="t_update" value="<?php echo $item_id; ?>">
       <input type="submit" name="submit" value="update" class="btn btn-success">
</form>
       

      
    </div>
     <!-- end of item part--> 

<?php } ?>
<?php
if(isset($_POST['submit']) and $_POST['submit']=="Delete"){
    $id=$_POST['t_del'];
    $email=$_SESSION['s_supplier'];
    $itemdel="delete from item_images where item_id='$id'";
    $del_item=mysqli_query($con,$itemdel);
 
    if($del_item){
        $del="delete from item where item_id='$id' and supplier_email='$email'";
        $del_run=mysqli_query($con,$del);
     
        header('location:my_items.php');
    }
}
if(isset($_POST['submit']) and $_POST['submit']=="Update"){
    $id=$_POST['t_update'];
    $_SESSION['edit_item']=$id;
    header('location:edit_item.php');
}

?>


</body>
</html>