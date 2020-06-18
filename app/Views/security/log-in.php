<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>logIn</h1>

        <form action="<?= site_url(route_to('authentication')) ?>" method="post">
            
            <div>
                <label for="id">Identifiant </label>
                <input type="text" name="id" id="id" required>
            </div>
            <div>
                <label for="pwd">Mot de passe : </label>
                <input  type="password" name="pwd" id="pwd" required>
            </div>
            <div>
                <label for="connect">Se connecter</label>
                <input type="submit" name=connect value="login">
            </div>
        </form>
