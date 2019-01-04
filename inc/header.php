<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- A SUPPRIMER LORS DE LA MISE EN PROD -->
    <meta name="robots" content="noindex, nofollow">
    <!-- A SUPPRIMER LORS DE LA MISE EN PROD -->
    <title><?php echo $titre; ?></title>
    <meta name="description" content="<?php echo $description; ?>" />
    <style>
        .loading{
            overflow:hidden;
        }
        #loader{
            position:fixed;
            width:100%;
            height:100%;
            background-color: #ee3524;
            color:#fff;
            display:flex;
            justify-content: center;
            align-items : center;
            z-index: 9999;
        }
    </style>
</head>
<body class="<?php echo $page; ?> loading">
    <div id="loader">
        <div>chargement...</div>        
    </div>
    <header>
        <div class="row">
            <div class="small-12 columns">
                <div class="logoHeader">logo</div>
            </div>
        </div>        
        <div class="row">
            <div class="small-12 columns">
                <nav>
                    <ul>
                        <li <?php if($page == "accueil"){echo 'class="active"';} ?>><a href="index.php">accueil</a></li>
                        <li <?php if($page == "missions"){echo 'class="active"';} ?>><a href="missions.php">nos missions</a></li>
                        <li <?php if($page == "equipe"){echo 'class="active"';} ?>><a href="equipe-francois-expertise-comptable.php">l'équipe</a></li>
                        <li><a href="#">SDA</a></li>
                        <li><a href="#">BGE</a></li>
                        <li><a href="#">nous rencontrer</a></li>
                    </ul>
                    <div class="logo"><img src="img/logoFEC.png" alt=""></div>
                </nav>
            </div>
        </div>        
    </header>
    <div id="graph"></div>