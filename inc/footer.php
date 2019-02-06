<footer>
    <div id="tel">
        <a href="tel:0321982321"><img src="img/phone-call.png" alt="contactez-nous"></a>
    </div>
    <div id="mail">
        <a href="mailto:contact@francois-ec.fr"><img src="img/mail.png" alt="contactez-nous"></a>
    </div>
    <div class="row align-middle">
        <div class="small-6 medium-8 columns copyright">
            <small>&copy 2018 <span>- Propulsé par <a href="https://www.createur-design.fr/" onclick="window.open(this.href); return false;"><img src="https://www.boucheriemerlierpaux.fr/wp-content/themes/twentyseventeen/assets/images/logo_createur_design_mail.png" alt="createur-design | conception de site WordPress à Wardrecques" class="logoCreateur"></a></span> - <a href="mentions-legales.php">mentions légales</a></small>
        </div>
        <div class="small-6 medium-4 columns flexEnd">
            <div id="btMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</footer> 
<!-- CSS -->
<link rel="stylesheet" href="css/foundation.min.css">
<link rel="stylesheet" href="css/app.min.css">
<!-- JS -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/jquery.cookie.min.js"></script>
<script src="js/app.min.js"></script>
<?php if($page === "agences"){
    echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>';
    echo '<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>';
}
?>