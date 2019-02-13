$(function(){
    console.log('READY');        

    /* LOAD */
    $(window).on("load", function(){
        console.log("page chargée");  
        $("#loader").fadeOut(800);
        $("body").removeClass("loading");

        if ( $.cookie('cookiebar') === undefined ) {        
            $('body').append('<div class="cookie-bar" id="cookie-bar">En poursuivant votre navigation sur ce site, <b>vous acceptez l’utilisation de Cookies</b> pour réaliser des statistiques de visites anonymes.<div><span class="bt_cookie"><a href="http://www.dennlys-parc.com/mentions-legales.php">En savoir plus</a></span><span class="bt_cookie cookie_btn" id="cookie_btn">Ok</span></div></div>');
        
            $('#cookie_btn').click(function(e){        
                e.preventDefault();        
                $("#cookie-bar").fadeOut();        
                $.cookie('cookiebar', "viewed", {expires: 30 * 12});        
            })
        };

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
    var view = false;
    $('li.childrenMenu span').on("click", function() {
        if(view === false){
            $(this).html("-");
            view = true;
        }
        else{
            $(this).html("+");
            view = false;
        }        
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
        }).setView([50.80, 2.25], 9);

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

        var redIcon = new L.Icon({
            iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
          });

        L.marker([50.707661, 2.347827], {icon: redIcon}).bindPopup(Longuenesse).addTo(map);
        L.marker([51.034771, 2.377253], {icon: redIcon}).bindPopup(Dunkerque).addTo(map);
        // L.marker([51.495, -0.083], {icon: redIcon}).bindPopup("I am a red leaf.").addTo(map);
        // L.marker([51.49, -0.1], {icon: orangeIcon}).bindPopup("I am an orange leaf.").addTo(map);
    }

    if($('body').hasClass("contact")){
        $('.field-input').focus(function(){
            $(this).parent().addClass('is-focused has-label');
          });
        
          // à la perte du focus
          $('.field-input').blur(function(){
            $parent = $(this).parent();
            if($(this).val() == ''){
              $parent.removeClass('has-label');
            }
            $parent.removeClass('is-focused');
          });
        
          // si un champs est rempli on rajoute directement la class has-label
          $('.field-input').each(function(){
            if($(this).val() != ''){
              $(this).parent().addClass('has-label');
            }
          });


          $('#contact-form').submit(function(e) {
            e.preventDefault();
            $('#errors').empty().css({
                "display": "none"
            });
            var postdata = $('#contact-form').serialize();
            
            $.ajax({
                type: 'POST',
                url: 'php/contact.php',
                data: postdata,
                dataType: 'json',
                success: function(json) {
                     
                    if(json.isSuccess) 
                    {
                        console.log('Envoyé');
                        $('#errors').css({"display": "none"})
                        $('#contact-form').append("<div class='row'><div class='small-12 columns'><p class='thank-you'>Votre message a bien été envoyé.)</p></div></div>");
                        $('#contact-form')[0].reset();
                    }
                    else
                    {
                        console.log('errors');
                        $('#errors').css({
                            display: "block"
                        });
                        $('#errors').append("<p>" + json.nomError + "</p>");
                        $('#errors').append("<p>" + json.prenomError + "</p>");
                        $('#errors').append("<p>" + json.emailError + "</p>");
                        $('#errors').append("<p>" + json.telError + "</p>");
                        $('#errors').append("<p>" + json.messageError + "</p>");
                        $('#errors').append("<p>" + json.reCAPTCHAError + "</p>");
                    }                
                }
            });
        });

    }


});
