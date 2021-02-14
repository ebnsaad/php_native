
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

$(document).ready(function(){
    
    $("#menu").click(function(){
                $(".header").slideToggle(1000);
     })

let count=0;
$('#add').click(function(){
    count++;
    $('#shop_counter').attr('value',count);
})

})
function card_counter(position){
    let add=document.getElementsByClassName('add');
    add=[].slice.call(add)
    add.indexOf(position)
   counter_items=document.getElementById('shop_counter').getAttribute('value');
   counter_items++;
    document.getElementById('shop_counter').setAttribute('value',counter_items);
    
}


function zoom_item(position){
    let img=document.getElementsByClassName('select');
    img=[].slice.call(img)
    index=img.indexOf(position)
    let image_src=img[index].getAttribute('src');
    // get image src
    $('.parent_big_image').show(100);
    $('#big_image').show(100,function(){
        $(this).attr('src',image_src);
    })

}

$('.parent_big_image').click(function(){
        $('#big_image').hide(100);
        $(this).hide(100);
    })


 

setTimeout(function(){
    let all=document.getElementById('all');
    let loader=document.getElementById('loader');
    document.getElementsByClassName('loader')[0].style.display="none";
    loader.style.display="none";
    all.style.display="block";
    
},4000)

let count=0;
$('#add').click(function(){
    count+=1;
    $('#shop_counter').attr('value',count);
    
})

