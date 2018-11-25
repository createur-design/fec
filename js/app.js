$(function(){
    console.log('READY');

    /* LOAD */
    $(window).on("load", function(e){
        console.log("page chargée");
    });

    var active = false;
    $('#btMenu').on('click', function(e){
        $(this).toggleClass('active');
        e.preventDefault();
        console.log('click');
        if(active == false){
            $('html, body').css('overflow', 'hidden');
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
});
