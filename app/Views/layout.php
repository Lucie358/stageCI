<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&display=swap" rel="stylesheet">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto navbar-left">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url(route_to('index')) ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url(route_to('companies')) ?>">Entreprises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url(route_to('admin')) ?>">Administration</a>
                </li>

            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
<?php 
                if($_SESSION['userData']->lvlrights < 0)
                    {
?>
                    <a class="nav-link" href="<?= site_url(route_to('login')) ?>">Se connecter</a>
                    <?php
                    }
                    else
                    {
?>
                    <a class="nav-link" href="<?= site_url(route_to('logOut')) ?>">Déconnexion</a>
<?php
                    }

?>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-info " href="<?= site_url(route_to('signIn')) ?>">S'inscrire</a>
                </li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="title_header">
            <h1>Try n' Catch</h1>
            <h2>Trouves ton stage d'Exception !</h2>
        </div>
    </header>


    <main>
        <?= $this->renderSection('content') ?>
        <div class="content_admin">
            <?= $this->renderSection('content_admin') ?>
        </div>
    </main>
    <footer>
        <p>Réalisé par Emeric Durdos & Lucie Brochet - DU WEB - 2020</p>
        <p><a href="<?= site_url(route_to('legalNotices')) ?>" >Mentions légales</a> - <a href="<?= site_url(route_to('siteMap')) ?>" >plan du site</a> </p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>