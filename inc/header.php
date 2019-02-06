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
                <div class="logoHeader"><img src="img/logoFEC.png" alt="Fraçois Expertise Comptable"></div>
            </div>
        </div>        
        <div class="row">
            <div class="small-12 columns">
                <nav>
                    <ul>
                        <li <?php if($page == "accueil"){echo 'class="active"';} ?>><a href="index.php">accueil</a></li>
                        <li <?php if($page == "missions"){echo 'class="active"';} ?>><a href="missions.php">nos missions</a></li>
                        <li <?php if($page == "equipe"){echo 'class="active"';} ?>><a href="nos-equipes-experts-comptable.php">l'équipe</a></li>
                        <li class="childrenMenu"><a href="nos-agences">nos agences</a><span>+</span>
                            <ul class="subMenu">
                                <li <?php if($page == "fec"){echo 'class="active"';} ?>><a href="francois-expertise-comptable.php">FEC</a></li>
                                <li <?php if($page == "sda"){echo 'class="active"';} ?>><a href="#">SDA</a></li>
                                <li <?php if($page == "dkec"){echo 'class="active"';} ?>><a href="#">DKEC</a></li>
                            </ul>
                        </li>     
                        <li><a href="#">créateur</a></li>                   
                        <li><a href="#">nous rencontrer</a></li>
                    </ul>
                    <div class="logo"><img src="img/logoFEC.png" alt="Fraçois Expertise Comptable"></div>
                </nav>
            </div>
        </div>        
    </header>    