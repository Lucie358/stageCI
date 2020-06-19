
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="form_container">
    <h1>Inscription</h1>
    <form action=<?= site_url(route_to('addMember')) ?> method="post">
        <div class="form-group">
            <label for="id">Pseudo :</label>
            <input type="text" name="id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Nom : </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd1">Mot de passe : </label>
            <input type="password" name="pwd1" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd2">Confirmez votre mot de passe : </label>
            <input class="form-control" type="password" name="pwd2" id="pwd2" required>
        </div>
        <button type="submit" name="register" value="signin" class="btn btn-primary">S'inscrire</button>
        <strong><?php echo $message ?></strong>
    </form>

</div>
<?= $this->endSection() ?>