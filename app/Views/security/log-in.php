<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form_container">
    <h1>Connexion</h1>
    <form action="<?= site_url(route_to('authentication')) ?>" method="post">
        <div class="form-group">
            <label for="id">Identifiant :</label>
            <input type="text" name="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe : </label>
            <input type="password" name="pwd" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <strong><?php echo $message ?></strong>
</div>
<?= $this->endSection() ?>