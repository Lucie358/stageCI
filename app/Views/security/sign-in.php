<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<p>signIn</p>

        <form action="form.php" method="get">
            
            <div>
                <label for="id">Identifiant </label>
                <input type="text" name="id" id="id" required>
            </div>
            <div>
                <label for="pwd">Mot de passe : </label>
                <input  type="password" name="pwd" id="pwd" required>
            </div>
            <div>
                <label for="pwd">Confirmez votre mot de passe : </label>
                <input  type="password" name="pwd" id="pwd" required>
            </div>
            <div>
                <label for="register">S'inscrire</label>
                <input type="submit" name=register value="signin">
            </div>
        </form>