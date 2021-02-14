<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/jquery.js"></script>
    <script defer src="js/signup.js"></script>
</head>
<body>
    <img src="images/menu.png" id="menu" alt="">
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
    <!-- end of header -->

<div class="parent">




<!-- start of desc -->
<div class="desc">
    <h1>Signup Now</h1>
    <video src="" controls poster="images/albert2.jpg"></video>
</div>
<!-- end of desc -->


<!-- start of signup div -->
<div class="signup">
    <!-- photo --> 
    <div class="photo">
        <img src="img/icon-image.png" id="upload" onclick="upload_image()" alt="">
         <img src="images/placeholder.png" onclick="upload_image()" id="image" alt="">
         <input id="file" onchange="show(event)" style="display: none;" type="file">
         </div>
    <!-- end photo -->
    
    <!-- user data -->
    <div class="user_data">
       
        <input type="text" onkeyup="valid_name()" id="name" placeholder="Full name">
        <p style="color: red;display: none;" id="err_name">Accept Only Char</p>
        <input type="tel" id="phone" onkeyup="valid_phone()" placeholder="Mobile Number">
        <p style="color: red;display: none;" id="err_phone">most be exactly 11 digit number</p>
      
        <input type="email" id="email" onkeyup="valid_email()" placeholder="E-mail">
        <p style="color: red;display: none;" id="err_email">Invalid email </p>
        <label>Gender</label>
        <select>
            <option>female</option>
            <option>male</option>
        </select>
        <label>BirthDate</label> 
        <input type="date">
        <input type="password" id="pass" onkeyup="valid_Pass()" placeholder="Your Password">
        <p style="color: red;display: none;" id="err_pass">password most contain one uppercase and number and symplos</p>
       
       
        <input type="password" minlength="8" id="confirm_pass" onkeyup="valid()" placeholder="Confirm Password">
       <p style="color: red;display: none;" id="err">Password dosn't match</p>
        <textarea>Your Address</textarea>
        <button>Signup</button>
    </div>
    <!-- user data -->
    
    </div>
    
    <!-- end of signup div -->
    
</div> 







</body>
</html>