<?php
ob_start();
include '../var.php';


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

   

    <div class="container">
        <form action="signup.php" method="POST" enctype="multipart/form-data">
       
        <div class="form-row">

            <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" name="t-first" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="t-last" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label>National ID</label>
                <input type="number" name="t_national" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>email</label>
                <input type="email" name="t-mail" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>mobile number</label>
                <input type="tel" name="t-phone" class="form-control">
            </div>



            <div class="form-group col-md-8">
                <label>address</label>
                <input type="text" name="t_mail" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label>Post Code</label>
                <input type="number" name="t_num"  class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="t_cat"  class="form-control">
                    <option>PC</option>
                    <option>labtop</option>
                    <option>phones</option>
                    <option>elctronics</option>
                </select>
                
            </div>
            <div class="form-group col-md-6">
                <label>Country</label>
                <select name="t_country"  class="form-control">
                    <option>Egy</option>
                    <option>ksa</option>
                    <option>uae</option>
                    <option>kwt</option>
                </select>
                
            </div>


            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="password" name="t_pass"  class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>Confirm Password</label>
                <input type="password" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label>Bio</label>
               <textarea name="t_bio"  class="form-control">Bio</textarea>
            </div>

            <div class="form-group col-md-6">
               
               <input type="submit" name="submit" value="signup" class="btn btn-primary">

            </div>

            <div class="form-group col-md-6">
                <label>Upload Your Photo</label>
                <input type="file" name="t_photo" class="form-control-file">
            </div>





       </div>

</form>



    </div>

    <?php
   
   if(isset($_POST['submit']) and $_POST['submit']=="signup"){

    $national=$_POST['t_national'];
    $first_name=$_POST['t-first'];
    $last_name=$_POST['t-last'];
    $email=$_POST['t-mail'];
    $post_code=$_POST['t_num'];
    $mobile_num=$_POST['t_phone'];
    $address=$_POST['t_mail'];
    $category=$_POST['t_cat'];
    $country=$_POST['t_country'];
    $password=$_POST['t_pass'];
    $bio=$_POST['t_bio'];
      
                             
$omtokiss = '3LifeJoseph';   
$method = 'aes-256-cbc';     

// Must be exact 32 chars (256 bit)
$omtokiss = substr(hash('sha256', $omtokiss, true), 0, 32);
//echo "Password:" . $password . "\n";

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$enc_pass = base64_encode(openssl_encrypt($password, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));



  //check email
  $sql_check="select email from supplier where email='$email'";
  $run_this=mysqli_query($con,$sql_check);
  if(mysqli_num_rows($run_this)>0){
      echo '<script>alert("your email exist reset password");</script>';
  }else{
 


//upload image to server
$image_name=$_FILES['t_photo']['name'];
$image_folder ="supplier_photo/".$image_name;
$image_url="http://localhost/jet/supplier/supplier_photo/".$image_name;

$image_file=$_FILES['t_photo']['tmp_name'];
move_uploaded_file($image_file,$image_folder);
//

$sql_add="insert into supplier values('$national','$first_name','$mobile_num','$email','$enc_pass','$address',
'$bio','$post_code','$image_url',
'$category','$country','$last_name')";
$run=mysqli_query($con,$sql_add);
if($run){
    session_start();
$_SESSION['s_supplier']=$email;
header('location:setting.php');

}else{
    echo "bad".mysqli_error($con);
    //echo '<script>alter("")</script>';
}


}




   }


?>







    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>