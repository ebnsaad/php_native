


    function password(){
        let error_password=document.getElementById('err_password');
 let password=document.getElementById('t_password').value;

 reg=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@*#$%^&-]).{8,}$/i;

   is_right=reg.test(password);
 if(is_right){
 error_password.style.display="none";
 }else{
    error_password.style.display="block";
 }

    }
$(document).ready(function(){
    
    $("#menu").click(function(){
                $(".header").slideToggle(1000);
     })
    })