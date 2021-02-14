<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php
     ob_start();
     session_start();
     include 'var.php';
     if(isset($_GET['item'])){
         $id=$_GET['item'];

     $sql_get="select * from items_page where item_id='$id'";
     $run=mysqli_query($con,$sql_get);
     $row=mysqli_fetch_assoc($run);
     $item_id=$row['item_id'];
     $name=$row['name'];
     $price=$row['price'];
     $desc=$row['short_desc'];
     $image=$row['imageurl'];
     $full=$row['full_desc'];
     $size=$row['size'];
     $unit=$row['unit'];
     $cat=$row['category'];
     $viewed=$row['viewed_number'];

     $sql_viewed="update item set viewed_number=viewed_number+2
     where item_id='$id'";
     $run_vi=mysqli_query($con,$sql_viewed);
     }
     
?>

    <title><?php echo $name;?> </title>
    <meta property="og:url"           content="<?php echo 'http://localhost/jet/item_detail.php?item='.$item_id; ?>"/>
    <meta property="og:type"          content="<?php echo $cat; ?>" />
    <meta property="og:title"         content="<?php echo $name; ?>" />
    <meta property="og:description"   content="<?php echo $desc; ?>" />
    <meta property="og:image"         content="<?php echo $image;?>" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/item_detail.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.transform2d.js"></script>
    <script src="js/jquery.transform3d.js"></script>
    <script defer src="js/itemdetail.js"></script>
</head>
<body>
      


  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=955730244775576&autoLogAppEvents=1" nonce="qT8r5jXy"></script>
<!--  start of header   -->
<?php include 'headre.php'; ?>
    <!-- end of header -->
    
    <!-- parent detail -->
     <div class="parent_detail">

        <div class="item_photo">
            <img id="big_image" src="<?php echo $image; ?>" alt="">
            <div class="over-photos">
                <?php
                if(isset($_GET['item'])){
                  $item_id=$_GET['item'];
                  $images="select * from item_images where item_id='$item_id' limit 4";
                  $run_images=mysqli_query($con,$images);
                  while($row2=mysqli_fetch_assoc($run_images)){
                      $image_url=$row2['image_url'];
                      ?>

                <img class="over" src="<?php echo $image_url; ?> " alt="">
                <?php
                  }
                }
                ?>
            </div>
        </div>
        <div class="item_data">
            <h1>Name:<?php echo $name; ?></h1>
            <p>Price:<?php echo $price; ?> </p>
            <p>Category<?php echo $cat; ?> </p>
            <p>size:<?php echo $size; ?></p>
            
            <p>unit: <?php  echo $unit;  ?></p>
            <form action="item_detail.php" method="post">
                <input type="hidden" name="t_id" value="<?php echo $item_id; ?>">
            <input type="submit" name="submit"  value="Buy Now">
            </form>

            <?php

if (isset($_POST['submit']) and $_POST['submit']=="Get it"){

      $id=$_POST['t_id'];
      $_SESSION['shopping_cart'][]=$id;
      header('location:payment.php');
}

?>

            <div class="fb-like" 
            data-href="<?php echo 'http://localhost/jet/item_detail.php?item='.$item_id; ?>" 
            data-width="" data-layout="standard" 
            data-action="like" data-size="small" data-share="true"></div>
        </div>
     </div>
    <!-- end parent detail -->
<!-- full description -->
<div class="desc">
    <h1>Full Description</h1>
    <p>
        <?php echo $full; ?>
    </p>
</div>
<!-- end full description -->
<!-- comments-->
<div class="comment">
   
    <div class="fb-comments"
     data-href="<?php echo 'http://localhost/jet/item_detail.php?item='.$item_id; ?>" data-numposts="5" data-width=""></div>
<div style="display: none;">
<input type="text" placeholder="Comment..">
<button>Post</button>
<ul>
    <li>Good PC</li>
    <li>very Good PC</li>
    <li>good very PC</li>
</ul>
</div>

</div>
<!-- end comments-->


<!-- items parent div-->
<div class="parent_items">
<h1>Also See this </h1>
    <!-- start of item part-->
        <div class="item_part">
            <button>ADD</button>
            <img src="images/albert_einstein.jpeg" alt="">
            <p id="price">price EGP.500</p>
            <p id="name">Item Name</p>
            <p id="desc">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
            </p>
            <a href="#">More</a>
        </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    
    <!-- start of item part-->
    <div class="item_part">
        <button>ADD</button>
        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        <p id="desc">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius exercitationem commodi corporis iure officiis doloribus ad tempore debitis repudiandae delectus, est velit rem culpa, accusantium laboriosam minus! Quas, eligendi perferendis?
        </p>
        <a href="#">More</a>
    </div>
    <!-- end of item part-->
    
    </div>
    
    
    <div class="footer">
        <p>All Rights &copy; Jet 2020 </p>
    </div>





</body>
</html>


