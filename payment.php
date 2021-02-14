<?php
ob_start();
include 'var.php';
session_start();
if(! $_SESSION['customer_in']){ 
  header("location:login.php");
  die();
}
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     
    </style>

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
       <link rel="stylesheet" href="css/header.css">

  </head>
  

  <body class="bg-light">
    
  <!--  start of header   -->
  <div class="header">
      <img src="images/albert.jpg"  alt="logo">
      <ul>
          <li> <a href="index.html">Home </a> </li>
          <li> <a href="items.html">Items </a> </li>
          <li> <a href="contact.html">Contact Us </a> </li>
          <li> <a href="login.html">Login </a> </li>
          <li> <a href="signup.html">Signup </a> </li>
          
      </ul>
      </div>

  
  <div class="container">


  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['shopping_cart']); ?></span>
      </h4>
      <ul class="list-group mb-3">
        <?php
        if($_SESSION['shopping_cart']){
          $ids=array();
          $ids=$_SESSION['shopping_cart'];
          for($i=0;$i<count($ids);$i++){
            $id=$ids[$i];
            $sql_get="select * from item_page where item_id='$id'";
            $run_get=mysqli_query($con,$sql_get);
            if($run_get){
              $row=mysqli_fetch_assoc($run_get);
              $id=$row['item_id'];
              $name=$row['name'];
              $price=$row['price'];
              $cat=$row['category'];
              $total+=$row['price'];

              echo '  
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">'.$name.'</h6>
                  <small class="text-muted">'.$cat.'</small>
                </div>
                <span class="text-muted">$'.$price.'</span>
                <a href="http://localhost/jet/payment.php?del='.$i.'">Delete</a>
              </li>
              
              ';
            }
          }
  
        }
        
  if(isset($_GET['del'])){
    $id=$_GET['del'];
    unset($_SESSION['shopping_cart'][$id]);
    $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]); // reset the session
   header("location:payment.php");
   
  }
        ?>
        
       
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong><?php echo $total; ?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <?php

$email=$_SESSION['customer_in'];
$getuser="select * from customer where email='$email'";
$rungetuser=mysqli_query($con,$getuser);
$row=mysqli_fetch_assoc($rungetuser);
$user_name=$row['name'];
$phone=$row['phone'];
$address=$row['address'];
$email=$row['email'];

?>

      <form class="needs-validation" action="payment.php" method="POST" novalidate>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="firstName">First name</label>
            <input type="text" value="<?php echo $user_name; ?>" name="name" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        


        </div>

      

        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" value="<?php echo $address; ?>" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Phone </label>
          <input type="text" value="<?php echo $phone; ?>" name="phone" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

      
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        
        <input class="btn btn-primary btn-lg btn-block"
         type="submit" name="submit" value="Continue">
      </form>
    </div>
  </div>
<?php
if(isset($_POST['submit'])and $_POST['submit']=="Continue"){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$sql_check="select email from customer where email='$email'";
$run_check=mysqli_query($con,$sql_check);
if($run_check){
  $ids_item=array();
$ids_item=$_SESSION['shopping_cart'];
for($i=0;$i<count($ids_item);$i++){
  $id=$ids_item[$i];
  $sql_payment="insert into payment_info(item_id,c_name,c_phone,c_email,c_address,timedate)
  values('$id','$name','$phone','$email','$address','')";
  $runpayment=mysqli_query($con,$sql_payment);
 
}
//email to customer
$to=$email;
$subject="sales report from jet inc";
$message="your items will be ready at 5 pm \n
total price:$total \n
meeting point: $address \n
we will call you at this number:$phone \n
for support pls call us at 01022584 \n
mohamed ashraf jet sales team
";
$header="from jet sales team";

mail($to,$subject,$message,$header);

}else{
  echo '<script>alert("check your intertnet connection and try again")</script>';
}

}


?>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Jet</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/form-validation.js"></script></body>
</html>
