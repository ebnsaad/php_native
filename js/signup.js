$(document).ready(function(){
    
    $("#menu").click(function(){
                $(".header").slideToggle(1000);
     })
    })

    
// render photo 
function upload_image(){
    let file=document.getElementById('file');
    file.click();
    
}


function show(event){
    let reader=new FileReader();
    reader.onload=function(){
        let img=document.getElementById('image');
        img.src=reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);

}





// name method
function valid_name(){

    let name=document.getElementById('name').value;
    let err_name=document.getElementById('err_name');

    reg=/^([A-Za-z\s]{3,})$/i;  
    res=reg.test(name);
    if(res){
       
        err_name.style.display="none";
    }else{
     
        err_name.style.display="block";
    }
}


// name method
function valid_phone(){
let phone=document.getElementById('phone').value;
let err_phone=document.getElementById('err_phone');
reg=/^([0-9]{11})$/i;  
res=reg.test(phone);
if(res){
    err_phone.style.display="none";
}else{
    err_phone.style.display="block";
}
}


// name method
function valid_email(){
let email=document.getElementById('email').value;
let err_email=document.getElementById('err_email');
// ali22@gmail-kj.com ali-@gmail.com  ali@dev_google.com  .edu.eg

reg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
res=reg.test(email);
if(res){
    err_email.style.display="none";
}else{
    err_email.style.display="block";
}
}
 

// name method
function valid_Pass(){
let pass=document.getElementById('pass').value;
let err_pass=document.getElementById('err_pass');
reg=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@*#$%^&-]).{8,}$/i;
res=reg.test(pass);
if(res){
    err_pass.style.display="none";
}else{
    err_pass.style.display="block";
}
}
 


    function valid(){
        let pass=document.getElementById('pass').value;
        let confirm_pass=document.getElementById('confirm_pass').value;
        let error=document.getElementById('err');
        if(pass != confirm_pass){
            error.style.display="block";
        }else{
            error.style.display="none";
        }
    }
    