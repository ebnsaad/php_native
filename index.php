<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jet</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.transform2d.js"></script>
    <script src="js/jquery.transform3d.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script defer src="js/index.js"></script>
</head>
<body>
    <script>
        AOS.init();
      </script>
 

 <div class="loader">
    <img src="img/load2.gif" id="loader" alt="">
</div>
<div id="all" style="display: none;">

  
    <!-- start of login part -->
<div class="login_parent" onclick="close_login()" id="parent"></div>

    <div class="login_part" id="login">
        <b onclick="close_login()" style="color: black;font-size: 20px;
        float: right;margin:10px;">X</b>

        <h1>Login now</h1>
        <input type="text"  placeholder="Email">
        <input type="text" onkeyup="password()" id="t_password" placeholder="*****">
        <p style="color: red;" id="err_password">Password error</p>
        <button>Login</button>
        <hr>
        <p>if you don't have account
            <a href="signup.html">Signup now</a> ?
        </p>
        <a href="forget.html">forget password</a>
        <div class="space"></div>
    </div>

 

 
<!-- intro div --> 
<div class="main-intro"> 

    <div class="part fadein">
        <img src="img/view.jpeg"  alt="">
    </div>
    <div class="part fadein">
        <img src="img/view2.jpeg"  alt="">
    </div>
    <div class="part fadein">
        <img src="img/view3.jpeg"  alt="">
    </div>
    <div class="part fadein">
        <img src="img/view4.jpeg"  alt="">
    </div>


    <div class="search">
       <img src="images/search.png"  id="logo_search" class="logo_search">
        <input type="search" onkeyup="search()" class="search_input"
        id="search_input" placeholder="Search...">
        <!-- search area -->   
        <div class="search_result">
            <button id="close_search">X</button>
            <ul id="s_ul">
                <li><a href="#">iphone 7</a></li>
                <li><a href="#">iphone 11</a></li>
                <li><a href="#">i mac</a></li>
                <li><a href="#">pc dell i7</a></li>
                <li><a href="#">smart tv</a></li>
                <li><a href="#">labtop hp i5</a></li>
                <li><a href="#">smart devices</a></li>
                <li><a href="#">watch digital</a></li>
                <li><a href="#">iphone 12</a></li>
            </ul>
        </div>
        <!-- search area --> 
    </div>
  
    
  <div class="over">
    <button>Shopping Now</button>
    <h1>Take <span> three </span>  and let two </h1>
</div>



</div>
<!-- end  intro div -->


<div class="space"></div>
<!-- about us -->
<div class="about_us">
    <div class="photo">
         <img src="images/view.jpeg" alt=""> 
        </div>
    <div class="info">
        <h2>About us</h2>
        <div class="line"></div>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repudiandae officia quidem eius nisi sequi asperiores vitae nesciunt cupiditate temporibus nulla accusantium quos saepe sit sint, facilis voluptas similique iure. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repudiandae officia quidem eius nisi sequi asperiores vitae nesciunt cupiditate temporibus nulla accusantium quos saepe sit sint, facilis voluptas similique iure. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repudiandae officia quidem eius nisi sequi asperiores vitae nesciunt cupiditate temporibus nulla accusantium quos saepe sit sint, facilis voluptas similique iure. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet repudiandae officia quidem eius nisi sequi asperiores vitae nesciunt cupiditate temporibus nulla accusantium quos saepe sit sint, facilis voluptas similique iure. 
   
        </p>
        <div class="more">
          <a href="#">learn more</a>
          <div id="bar"></div>
        </div>

    </div>
</div>
<!-- end  about us -->

<div class="space"></div>

<!-- our products -->
<div class="products">
    <h1>Shopping now</h1>
    

    <div class="parent_items">

        <!-- start of item part-->
            <div class="item_part" data-aos="zoom-in">
                
                <img src="images/albert_einstein.jpeg" alt="">
                <p id="price">price EGP.500</p>
                <p id="name">Item Name</p>
               
            
            </div>
        <!-- end of item part-->
 <!-- start of item part-->
 <div class="item_part" data-aos="zoom-in">
                
    <img src="images/albert_einstein.jpeg" alt="">
    <p id="price">price EGP.500</p>
    <p id="name">Item Name</p>
   

</div>
<!-- end of item part-->
 <!-- start of item part-->
 <div class="item_part" data-aos="zoom-in">
                
    <img src="images/albert_einstein.jpeg" alt="">
    <p id="price">price EGP.500</p>
    <p id="name">Item Name</p>
   

</div>
<!-- end of item part-->
 <!-- start of item part-->
 <div class="item_part" data-aos="zoom-in">
                
    <img src="images/albert_einstein.jpeg" alt="">
    <p id="price">price EGP.500</p>
    <p id="name">Item Name</p>
   

</div>
<!-- end of item part-->
 <!-- start of item part-->
 <div class="item_part" data-aos="zoom-in">
                
    <img src="images/albert_einstein.jpeg" alt="">
    <p id="price">price EGP.500</p>
    <p id="name">Item Name</p>
   

</div>
<!-- end of item part-->
         <!-- start of item part-->
         <div class="item_part" data-aos="zoom-in">
          
            <img src="images/albert_einstein.jpeg" alt="">
            <p id="price">price EGP.500</p>
            <p id="name">Item Name</p>
          
            
        </div>
    <!-- end of item part-->
    
     <!-- start of item part-->
     <div class="item_part" data-aos="zoom-in">

        <img src="images/albert_einstein.jpeg" alt="">
        <p id="price">price EGP.500</p>
        <p id="name">Item Name</p>
        
       
    </div>
<!-- end of item part-->

 <!-- start of item part-->
 <div class="item_part" data-aos="zoom-in">
 
    <img src="images/albert_einstein.jpeg" alt="">
    <p id="price">price EGP.500</p>
    <p id="name">Item Name</p>
   
  
</div>
<!-- end of item part-->

    </div>        

    

</div>
<!-- end products-->

<div class="space"></div>
<!-- our team -->
<div class="team">
    <h1>Our Team</h1>
  
    <div class="all_team">   
        
    <div class="team_member">
        <img class="t_img"  src="img/employee_2.jpg" onmouseover="zoom(this)" alt="">
        <p id="name">Nghd ksjdn lsdkd</p>
        <p id="bio">CEO</p>
    </div>
    <div class="team_member">
        <img class="t_img" src="img/images.jpg" onmouseover="zoom(this)" alt="">
        <p id="name">Nghd ksjdn lsdkd</p>
        <p id="bio">COO</p>
    </div>
    <div class="team_member">
        <img class="t_img" src="img/alan-saks-employee-engagement-banner-1120x575.jpg" onmouseover="zoom(this)" alt="">
        <p id="name">Nghd ksjdn lsdkd</p>
        <p id="bio">CTO</p>
    </div>

</div>

</div>
<!-- end our team -->

<div class="space"></div>
 <!-- my app-->
 <div class="myapp">
     <h1>Download Our App</h1>
    <div class="photo"> 
        <img src="img/our-app.png" alt="">
    </div>
    <div class="app_desc">
        <h4>Why?</h4>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde temporibus voluptate, non fuga ratione quibusdam magnam obcaecati repudiandae minus! Excepturi, cupiditate fugit! Aliquid temporibus assumenda repudiandae autem quaerat expedita iste.
       Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione nulla maiores voluptate quisquam voluptates ut enim? Non ad incidunt est aut consequatur! Consequatur dignissimos ex quisquam nihil consequuntur, cumque aliquid!
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam cum tempora officiis ipsa odio ea, velit sequi labore dolores animi, minus sapiente possimus deleniti non corrupti repellat, amet voluptatum sunt?
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, perspiciatis sunt error veritatis labore ab a quasi. Veniam omnis voluptatibus laudantium! Soluta illum amet nam minima, itaque consequuntur dignissimos delectus!
       Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sequi tempore enim sit, dolorum error pariatur ad nam tenetur? Voluptatum dolorum animi nulla suscipit earum quibusdam veritatis eum beatae nobis.
       
        </p>
        <div class="our_app">
        <img src="img/google-play-badge-342x132.png" id="android" alt="">
       
    </div>
    </div>
</div>
<!-- my app-->

<!-- work with -->

<div class="space"></div>
<h1 id="h1">Our Partners</h1>
<div class="parent_big">

<div class="parent_inc" id="p">
    <ul>
        <li>
            <img src="images/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view2.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view3.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view4.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/pexels-photo-824877.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="images/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view2.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view3.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view4.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/pexels-photo-824877.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="images/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view2.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="images/view.jpeg" alt="">
            <p>inc Logo</p>
        </li>
        <li>
            <img src="img/view2.jpeg" alt="">
            <p>inc Logo</p>
        </li>
    </ul>
</div>
<img src="images/left.png" id="left" onclick="prev()">
<img src="images/right.png" id="right" onclick="next()">

</div>

    <!-- work with -->

    <div class="space"></div>

<!-- contact us part-->
<div class="contact_us">
    
<img  id="back_home" src="img/home.png" alt="">

    <h1>Contact Us</h1>

    <div class="inputs">
       <input type="text" placeholder="Your Name">
       <input type="email" placeholder="Your Email">
       <input type="tel" placeholder="Mobile Number">
    <textarea>
    Your Message
    </textarea>
      <input type="submit" value="Send"/>
    </div>
     
</div>
<!-- end  contact us part-->

<div class="site_map">
<!-- *************************** -->
    <div class="links">
        <ul class="ul">
        <li> <a href="index.html">Home </a> </li>
        <li> <a href="items.html">Items </a> </li>
        <li> <a href="#" id="contact">Contact Us </a> </li>
        <li> <a href="#" onclick="show_login()">Login </a> </li>
        <li> <a href="signup.html">Signup </a> </li>
        </ul>
    </div> 
<!-- *********************** -->

<!-- *************************** -->
<div class="links">
    <ul class="ul">
    <li> <a href="#">FaceBook </a> </li>
    <li> <a href="#">Twitter </a> </li>
    <li> <a href="#">Instgram </a> </li>
    <li> <a href="#">Gmail </a> </li>
    <li> <a href="#">Yahoo </a> </li>
    </ul>
</div>
<!-- *********************** -->
<!-- *************************** -->
<div class="links">
    <ul class="ul">
    <li> <a href="#">The Best </a> </li>
    <li> <a href="#">Work with us </a> </li>
    <li> <a href="#">24 support </a> </li>
    <li> <a href="#">help </a> </li>
    <li> <a href="#">A Q </a> </li>
    </ul>
</div>
<!-- *********************** -->



</div>

<div class="footer">
    <p>All Rights &copy; Jet 2020 </p>
</div>





</div>


</body>
</html>