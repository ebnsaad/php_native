$(document).ready(function(){
    $('.over').click(function(){
        let image_src=$(this).attr('src');
        $('#big_image').fadeOut(100,function(){
            $(this).attr('src',image_src);
        }).fadeIn(100);
    })




    

$("#menu").click(function(){
    $(".header").slideToggle(1000);
})




})

