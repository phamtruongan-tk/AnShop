$(document).ready(function(){
    $('.slide').slick({
        dots: false,
        arrows: false,
        autoplay:true,	
        autoplaySpeed:1400,
        fade:true,
        fadeSpeed:1000
    });
});
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
$('.btn_topTop').click(function(){
    $("html, body").animate({scrollTop: 0}, 600);
})
$(window).scroll(function(){
    let widthTop = $(window).scrollTop();
    if(widthTop >500){
        $('.btn_topTop').css({'opacity':'1','pointer-events': 'auto'})
    }else{
        $('.btn_topTop').css({'opacity':'0', 'pointer-events': 'none'})
    }
})
$('.register').click(function(){
    $('.overlay').css({
        'opacity':'1','pointer-events': 'auto',
    })
    $('.register').css({
        'dislay':'block',
        'transform': 'scale(1)'
    })

})
$('.close').click(function(){
    $('.overlay').css({
        'opacity':'0','pointer-events': 'none',
    })
    $('.register').css({
        'transform': 'scale(0)'
    })
})