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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php include 'header.php'; ?>
<?php
$id=$_SESSION['edit_item'];
$sql_select="select * from items_page where item_id='$id'";
$run=mysqli_query($con,$sql_select);
$row=mysqli_fetch_assoc($run);
$item_id=$row['item_id'];
$name=$row['name'];
$price=$row['price'];
$cat=$row['category'];
$unit=$row['unit'];
$size=$row['size'];
$production=$row['production_date'];
$short=$row['short_desc'];
$full=$row['full_desc'];

?>
    <div>
     <?php
     $get_images="select * from item_images where item_id='$item_id'";
     $run=mysqli_query($con,$get_images);
     while($row=mysqli_fetch_assoc($run)){
       $image=$row['image_url'];
     ?>
     <img src="<?php echo $image; ?>" width="100" height="100" alt="">
     <?php
     }
     ?>
     </div>
    
    <form action="edit_item.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" value="<?php echo $item_id;?>" name="item_id">
    
        <div class="form-row">
           
            <div class="form-group col-md-6">
                <label>Item Name</label>
                <input type="text" name="t_name" value="<?php echo $name;?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Price</label>
                <input type="number" name="t_price" value="<?php echo $price;?>" class="form-control">
            </div>
     
            <div class="form-group col-md-6">
                <label>Item Size</label>
                <input type="text" name="t_size" value="<?php echo $size;?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>unit</label>
                <input type="number" name="t-unit" value="<?php echo $unit;?>" class="form-control">
            </div>
     
            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="t-cat" class="form-control">
                <option><?php echo $cat;?></option>
                    <option>PC</option>
                    <option>labtop</option>
                    <option>phones</option>
                    <option>elctronics</option>
                </select>
     </div>

     <div class="form-group col-md-6">
        <label>Production Date</label>
        <input type="date" name="t_date" value="<?php echo $production;?>" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label>Short Description</label>
        <input type="text" name="t_short" value="<?php echo $short;?>" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label>Full Description</label>
       <textarea class="form-control" name="t-full"><?php echo $full;?></textarea>
    </div>
    <div class="form-group col-md-6">
               
        <input type="submit" name="submit" value="Edit Item" class="btn btn-primary">
     </div>

     <div class="form-group col-md-6">
         <label>Upload item Photo</label>
         <input type="file" name="t_photo[]" multiple class="form-control-file">
     </div>


     
        

    </div>
    </form>
    </div>
    <?php
    if(isset($_POST['submit']) and $_POST['submit']=="Edit Item"){
    $item_id=$_POST['item_id'];
    $name=$_POST['t_name'];
    $price=$_POST['t_price'];
    $size=$_POST['t_size'];
    $unit=$_POST['t_unit'];
    $category=$_POST['t_cat'];
    $short_description=$_POST['t_short'];
    $full_description=$_POST['t_full'];
    $production_date=$_POST['t_date'];
    $email=$_SESSION['s_supplier'];
    // set item id

    $number=mt_rand(1, 999);
    $res=$number*2;
    $item_id=$res + 1;
    $sql_ran="select item_id from item where item_id='$item_id'";
    $run_ran=mysqli_query($con,$sql_ran);
    if(mysqli_num_rows($run_ran)>0){
        $item_id++;
    }
    //
    // check if there is images
    $image=array_filter($_FILES['t_photo']['name']);
    if(! empty($image)){
         // delete images 
   $del="delete from item_images where item_id='$item_id'";
   $delrun=mysqli_query($con,$del);
   //if he upload images  update info and images***
   $add="update item set name='$name',price='$price',size='$size',
  unit='$unit',category='$cat',short_desc='$short',full_desc='$full',
  production_date='$date' where item_id='$item_id' and supplier_email='$email'";
  $run_this=mysqli_query($con,$add);
 foreach($_FILES['t_photo']['name'] as $key=>$v){
$image_name=basename($_FILES['t_photo']['name'][$key]); //name
$image_folder="items_photo/".$image_name; //folder location
$image_file=$_FILES['t_photo']['tmp_name'][$key]; //file
//then upload fie
if(move_uploaded_file($image_file,$image_folder)){

    $image_url="http://localhost/jet/supplier/items_photo/".$image_name;
    $insert="insert into item_images values('','$item_id','$image_url')";
    $run=mysqli_query($con,$insert);

}else{ //error upload
    echo  '<script>alert("check your conn and try again")</script>';

}

} //end foreach
header('location:my_items.php');
}else{
        

        //if not then update info
        $add="update item set name='$name',price='$price',size='$size',
  unit='$unit',category='$cat',short_desc='$short',full_desc='$full',
  production_date='$date' where item_id='$item_id' and supplier_email='$email'";
        $run_this=mysqli_query($con,$add);
        header('location:my_items.php');
       
     
      

    }

}
    ?>


</body>

</html>