<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2><?php echo $title ?></h2>

        <form action="<?= site_url(route_to('addMember')) ?>" method="post">
            
            <div>
                <label for="id">Identifiant </label>
                <input type="text" name="id" id="id" required>
            </div>
            <div>
                <label for="pwd">Prénom : </label>
                <input  type="text" name="firstname" id="firstname" >
            </div>
            <div>
                <label for="pwd">Nom : </label>
                <input  type="text" name="name" id="name" >
            </div>
            <div>
                <label for="pwd">Mot de passe : </label>
                <input  type="password" name="pwd1" id="pwd1" required>
            </div>
            <div>
                <label for="pwd">Confirmez votre mot de passe : </label>
                <input  type="password" name="pwd2" id="pwd2" required>
            </div>
            <div>
                <label for="register">S'inscrire</label>
                <input type="submit" name=register value="signin">
            </div>
            <strong><?php echo $message ?></strong>
        </form>