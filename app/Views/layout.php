<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <header>
        <h1>Gestion de stage</h1>
    </header>

    <nav>
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="<?= site_url(route_to('index')) ?>">Accueil</a></li>
                <li><a href="<?= site_url(route_to('companies')) ?>">Entreprises</a></li>
                <li><a href="<?= site_url(route_to('admin')) ?>">Administration</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
</body>

</html>