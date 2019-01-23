$(function(){
    console.log('READY');

    /* LOAD */
    $(window).on("load", function(){
        console.log("page chargée");
        $("#loader").fadeOut(800);
        $("body").removeClass("loading");
        
    });

    $(window).on("scroll", function(){
        var scrollPos = $(this).scrollTop();
        var hauteurDocument = $(document).height();
        console.log(scrollPos + " | " + hauteurDocument);
        $("#graph").css({
            top : 250 - scrollPos/4 + "px"
        });
    });

    var active = false;
    $("#btMenu").on("click", function(e){
        $(this).toggleClass('active');
        e.preventDefault();
        console.log('click');
        if(active == false){
            $("html, body").css("overflow", "hidden");
            active = true;
            $('header nav').animate({
                left: 0
            }, 500);
        }        
        else{
            $('html, body').css('overflow', 'auto');
            active = false;            
            $('header nav').animate({
                left: '-100%'
            }, 500); 
        }
    });
    $('nav li > .subMenu').parent().click(function() {
        var submenu = $(this).children('.subMenu');
        if ( $(submenu).is(':hidden') ) {
          $(submenu).slideDown(200);
        } else {
          $(submenu).slideUp(200);
        }
      });
});
