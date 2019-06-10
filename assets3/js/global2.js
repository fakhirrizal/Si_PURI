$(document).ready(function(){
    $(".select2").select2();
    // $(".full-bg").parent().css("overflow", "hidden");

    var height_footer   = $("footer").height();
    var height_header   = $("header").height();

    // $(".full-bg #top-content").height( "calc(100vh - "+height_header+"px - "+height_footer+"px)" );
});

function slider_kekiri(){
    var byk = $(".slider-risalah").find(".slider-image").length;
    var ris = $(".slider-risalah").find(".slider-image");
    var num = 1;

    var aw  = 0;
    $.each(ris, function(index, element){
        if( $(element).hasClass('active') ){
            num = aw;
        }
        aw++;
    });

    // console.log(num);
    num--;
    var pilih   = (num+byk)%byk;
    
    $(".slider-risalah").find(".slider-image.active").removeClass('active').fadeOut();
    $(ris[pilih]).addClass('active').fadeIn();
}

function slider_kekanan(){
    var byk = $(".slider-risalah").find(".slider-image").length;
    var ris = $(".slider-risalah").find(".slider-image");
    var num = 1;

    var aw  = 0;
    $.each(ris, function(index, element){
        if( $(element).hasClass('active') ){
            num = aw;
        }
        aw++;
    });

    num++;
    var pilih   = num%byk;
    
    $(".slider-risalah").find(".slider-image.active").removeClass('active').fadeOut();
    $(ris[pilih]).addClass('active').fadeIn();
}

$(".slider-risalah").ready(function(){
    setInterval(function(){
        slider_kekanan();
    },3000);
});

$("body").click(function(){
    if( $("#form-show").hasClass('active') ){
        $("#form-hide").toggle("slide", {
            direction: "left"
        });
        $("#form-show").find("button").data('search', false);
        $("#form-show").toggleClass('active');
    }
});

$("#form-hide *").on("click",function(event){
    // alert("wkwk");
    // event.preventDefault();
    event.stopPropagation();
});

function open_search(elem, ev){
    ev.preventDefault();
    ev.stopPropagation();
    var isSearch    = $(elem).data('search');
    if( !isSearch ){
        ev.preventDefault();
        $("#form-hide").toggle("slide", {
            direction: "left"
        });
        // $(elem).parent().css("left", "calc(100% - 48px)").addClass('active');
        $(elem).parent().toggleClass('active');
        $(elem).data('search', true);
    }else{
        $(elem).parents('form').submit();
    }
}

$("#tab-menu a").click(function(){
    var id  = $(this).attr('href');
    $("#tab-menu a").removeClass('active');
    $(this).addClass('active');

    $(".tab-content.active").fadeOut(function(){
        $(".tab-content").removeClass('active');
    });
    $(""+id).fadeIn(function(){
        $(this).addClass('active');
    })
});

function fullDocument(elem){
    $(elem).parent().parent().toggleClass('half').toggleClass('full').siblings().toggleClass('full').toggleClass('half');
    
    $(window).scrollTop( $("#iframe-dokumen").offset().top );

    $(elem).toggleClass('active');
    $("body").toggleClass('disabled');
}

$('a[href*="#"]')
// Remove links that don't actually link to anything
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event) {
  // On-page links
  if (
    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
    && 
    location.hostname == this.hostname
  ) {
    // Figure out element to scroll to
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    // Does a scroll target exist?
    if (target.length) {
      // Only prevent default if animation is actually gonna happen
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }
  }
});

$("body").click(function(){
    $("ul.nav-account-menus").removeClass('active');
});

$("#nav-account .prof").click(function(event){
    event.preventDefault();
    event.stopPropagation();
    $("ul.nav-account-menus").toggleClass('active');
});