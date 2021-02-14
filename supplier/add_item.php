<?php
ob_start();
include '../var.php';
session_start();

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
<?php include 'header.php'; ?>
    <div class="container">
    <form action="add_item.php" method="POST" enctype="multipart/form-data">
    
    


        <div class="form-row">
           
            <div class="form-group col-md-6">
                <label>Item Name</label>
                <input type="text" name="item_name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Price</label>
                <input type="number" name="t_price" class="form-control">
            </div>
     
            <div class="form-group col-md-6">
                <label>Item Size</label>
                <input type="text" name="t_size" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>unit</label>
                <input type="number" name="t-unit" class="form-control">
            </div>
     
            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="t-cat" class="form-control">
                    <option>PC</option>
                    <option>labtop</option>
                    <option>phones</option>
                    <option>elctronics</option>
                </select>
     </div>

     <div class="form-group col-md-6">
        <label>Production Date</label>
        <input type="date" name="t_date" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label>Short Description</label>
        <input type="text" name="t_short" class="form-control">
    </div>
    <div class="form-group col-md-12">
        <label>Full Description</label>
       <textarea class="form-control" name="t-full"></textarea>
    </div>
    <div class="form-group col-md-6">
               
        <input type="submit" name="submit" value="Add Item" class="btn btn primary">
     </div>

     <div class="form-group col-md-6">
         <label>Upload item Photo</label>
         <input type="file" name="t_photo[]" multiple class="form-control-file">
     </div>


     
        </div>

    </div>
    </form>
    <?php
    if(isset($_POST['submit']) and $_POST['submit']=="Add Item"){
    $name=$_POST['item_name'];
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
    $image=$_FILES['t_photo']['name'];
    if(empty($image)){
        echo '<script>alert("you should upload one image or more");</script>';
    }else{
        foreach($_FILES['t_photo']['name'] as $key=>$v){
$image_name=basename($_FILES['t_photo']['name'][$key]); //name
$image_folder="items_photo/".$image_name; //folser location
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
        

        //add item data

        $add="insert into item values('$item_id','$name','$price','$size','$unit','$category',
        '$short_description','$full_description','$email','','$viewed','$production_date')";
        $run_this=mysqli_query($con,$add);
        if($run_this){

            echo '<script>alert ("item added");</script>';
        
        }else{

            echo "bad". mysqli_error($con);
            //echo <script>alert("pleas check your internet");</script>';
        }



        //
     
      

    }

}
    ?>


</body>

</html>