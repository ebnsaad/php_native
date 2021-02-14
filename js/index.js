
 

$('#signup_as').hover(function(){
     $('.signup_as').show(); 
    
    });

$('.signup_as').hover(
    function(){
     $('.signup_as').show(); 
     },
    function(){
         $('.signup_as').hide(100); 
 }
 
 )

$(".more").mouseenter(function(){
    $("#bar").animate({width:'100%'},1000)
})



let index2=1;
function next(){
index2+=100;
if(index2 >=1300){
    index2=1
}
let parent=document.getElementById('p');
parent.scroll({left:index2,behavior:'smooth'})
}
function prev(){
index2-=100;
if(index2 <1){
index2=1;
}

let parent=document.getElementById('p');
parent.scroll({left:index2,behavior:'smooth'})
}


/*   main intro gallery */
    var index=0;
    play_gallery();
     function play_gallery(){
         let i;// first hide all 
         let part=document.getElementsByClassName("part");
         for(i=0;i < part.length;i++){
             part[i].style.display = "none";  
         }
         //end of hide all 
         index++; // global variable every time will increase by one
         if(index > part.length)
         {
             index=1
         }
         part[index-1].style.display = "block";  
        setTimeout(play_gallery,3000)
     }

/*   main intro gallery */



$("#logo_search").click(function(){
 
 let s=document.getElementById('search_input');
    s.classList.toggle('open_search');
  
})

    $("#close_search").click(function(){
        $('.search_result').hide(700)
    })
   $('#search_input').click(function(){
       $('.search_result').show(700);
   })
       
   function search(){
       let word,ul,li,a,index,result;
       // first transform all to upper or lower case any 
       word=document.getElementById('search_input').value.toUpperCase();
       ul=document.getElementById("s_ul");
       li=ul.getElementsByTagName("li");
       for(index=0;index< li.length;index++){
           a=li[index].getElementsByTagName("a")[0]; // get first value from a
           result=a.textContent || a.innerText;
           if(result.toUpperCase().indexOf(word) > -1){// if there is 0 or above 0 mean one char
               li[index].style.display="block";
           }else{
               li[index].style.display="none";
           }
       }
   }


$(document).ready(function(){

    $('#contact').click(function(){

    $('html,body').animate({scrollTop:'100px'},
    1000,"swing",function(){

    $(this).animate({scrollTop:$('.contact_us').offset().top},2000)
      })

  })




  $('#back_home').click(function(){

 $('html,body').animate({scrollTop:$('.header')
 .offset().top},2000)
      
      
  })






    $("#menu").click(function(){
                $(".header").slideToggle(1000);
     })


})

   






setTimeout(function(){
    let all=document.getElementById('all');
    let loader=document.getElementById('loader');
    document.getElementsByClassName('loader')[0].style.display="none";
    loader.style.display="none";
    all.style.display="block";
    
},1000)




// 
function zoom(position){
    let img=document.getElementsByClassName('t_img');
    img=[].slice.call(img)
  //  console.log(img.indexOf(position))
    index=img.indexOf(position)

    img[index].animate([{transform:'scale(1)'},{transform:'scale(1.1)'}],
    {duration:1000,iterations:1})
    
}



//






// settimeout
setTimeout(show_login,15000);

function show_login(){

    let login=document.getElementById('login');
    let parent=document.getElementById('parent');
    login.style.display="block";
    parent.style.display="block";

}
function close_login(){

    let login=document.getElementById('login');
    let parent=document.getElementById('parent');
    login.style.display="none";
    parent.style.display="none";



}







