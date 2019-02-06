$(function(){
    console.log('READY');

    if ( $.cookie('cookiebar') === undefined ) {        
        $('body').append('<div class="cookie-bar" id="cookie-bar">En poursuivant votre navigation sur ce site, <b>vous acceptez l’utilisation de Cookies</b> pour réaliser des statistiques de visites anonymes.<div><span class="bt_cookie"><a href="http://www.dennlys-parc.com/mentions-legales.php">En savoir plus</a></span><span class="bt_cookie cookie_btn" id="cookie_btn">Ok</span></div></div>');
    
        $('#cookie_btn').click(function(e){        
            e.preventDefault();        
            $("#cookie-bar").fadeOut();        
            $.cookie('cookiebar', "viewed", {expires: 30 * 12});        
        })
    };
        

    /* LOAD */
    $(window).on("load", function(){
        console.log("page chargée");
        $("#loader").fadeOut(800);
        $("body").removeClass("loading");

        //$("main").prepend('<div id="graph"></div>');
        
    });

    $(window).on("scroll", function(){
        var scrollPos = $(this).scrollTop();
        var hauteurDocument = $(document).height();
        console.log(scrollPos + " | " + hauteurDocument);
        $("#graph").css({
            top : 150 - scrollPos/4 + "px"
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
    $('li.childrenMenu span').on("click", function() {
        $('.subMenu').slideToggle(200);
        $(this).css({
            //transform: "rotate(45deg)"
        })
      });


    if($('body').hasClass("agences")){
        console.log('agence');
      
        // MAPS
        var map = L.map('map', {
            scrollWheelZoom: false
        }).setView([50.707661, 2.347827], 9);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // var LeafIcon = L.Icon.extend({
        //     options: {
        //         shadowUrl: 'leaf-shadow.png',
        //         iconSize:     [38, 95],
        //         shadowSize:   [50, 64],
        //         iconAnchor:   [22, 94],
        //         shadowAnchor: [4, 62],
        //         popupAnchor:  [-3, -76]
        //     }
        // });

        // var greenIcon = new LeafIcon({iconUrl: 'leaf-green.png'}),
        //     redIcon = new LeafIcon({iconUrl: 'leaf-red.png'}),
        //     orangeIcon = new LeafIcon({iconUrl: 'leaf-orange.png'});


        var Longuenesse = 
        "<h3>FEC & SDA</h3>" +
        "<p>agence de Longuenesse</p>";

        var Dunkerque = 
        "<h3>DKEC</h3>" +
        "<p>agence de Dunkerque</p>";

        L.marker([50.707661, 2.347827]).bindPopup(Longuenesse).addTo(map);
        L.marker([51.034771, 2.377253]).bindPopup(Dunkerque).addTo(map);
        // L.marker([51.495, -0.083], {icon: redIcon}).bindPopup("I am a red leaf.").addTo(map);
        // L.marker([51.49, -0.1], {icon: orangeIcon}).bindPopup("I am an orange leaf.").addTo(map);
    }


});
