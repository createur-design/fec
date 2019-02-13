<?php
$page = "contact";
$titre = "Expert comptable à Saint Omer - le service de proximité";
$description = "Expert comptable en Hauts-de-France vous accompagne dans la gestion de votre entreprise et de votre patrimoine. Prenez un rendez vous avec notre expert comptable afin de découvrir nos services comptables et notre savoir-faire.";
?>
    <?php include 'inc/header.php'; ?>
    <main>

    <div class="row">
        <div class="small-12 columns">
            <h1>Prenons contact</h1>
            <div class="texteCenter">
                <p><b>Obtenez une étude personnalisée</b> en remplissant notre formulaire.</p>
                <p>Nous nous engageons à vous répondre dans les 4 jours ouvrés.</p>
            </div>            
        </div>
    </div>

    <section>
    <form id="contact-form" action="" method="post">
    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="nom" class="field-label">Nom*</label>
                <input type="text" id="nom" name="nom" class="field-input">
            </div>            
        </div>
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="prenom" class="field-label">Prénom*</label>
                <input type="text" id="prenom" name="prenom" class="field-input">
            </div>
        </div>
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="email" class="field-label">Email*</label>
                <input type="email" id="email" name="email" class="field-input">
            </div>
        </div>
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="tel" class="field-label">Téléphone</label>
                <input type="tel" id="ville" name="tel" class="field-input">
            </div>
        </div>
        <div class="small-12 columns">
            <div class="field">
                <label for="societe" class="field-label">Société</label>
                <input type="text" id="societe" name="societe" class="field-input">
            </div>
        </div>
        <div class="small-12 columns">
            <div class="field">
                <label for="activite" class="field-label">Activité de la société</label>
                <input type="text" id="activite" name="activite" class="field-input">
            </div>
        </div>
        <div class="small-12 columns">
            <div class="field">
                <label for="adresse" class="field-label">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="field-input">
            </div>
        </div>
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="cp" class="field-label">Code postal</label>
                <input type="number" id="cp" name="cp" class="field-input">
            </div>
        </div>
        <div class="small-12 medium-6 columns">
            <div class="field">
                <label for="ville" class="field-label">Ville</label>
                <input type="text" id="ville" name="ville" class="field-input">
            </div>
        </div>        
        <div class="small-12 columns">
            <div class="field fieldMessage">
                <label for="message" class="field-label">Message*</label>
                <textarea type="tel" id="message" name="message" class="field-input"></textarea>
            </div>
        </div>       
        <div class="small-12 columns">
            <div id="errors" class="errors"></div>            
            <div>
                <div class="g-recaptcha" data-sitekey="6LfZOpEUAAAAAH3jVcmLYIMbPHw22hjNaG7c3RWD"></div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
                
            </div>
            
        </div>
    </div>
    </form>

    </section>

    </main>
    <?php include 'inc/footer.php'; ?>     
</body>
</html>