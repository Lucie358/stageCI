<?= $this->extend('layout') ?>
<?= $this->section('content_admin') ?>
<h2>Ajouter une offre de stage: </h2>

<?= \Config\Services::validation()->listErrors(); ?>
<?php
    echo form_open('companyController/adminAdd');
    //<form action="/taches/creation">
    ?>
    <div class="form-group">
        <label for="name">Nom de l'entreprise</label>
        <input name="name" type="text" class="form-control">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
        <label for="address">Adresse</label>
        <input name="address"type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cities">Villes</label>
        <select name="cities" class="form-control" id="cities">
            <?php foreach ($cities as $city) : ?>
                <option value="<?php echo $city['name'] ?>"><?php echo $city['name'] ?></option>
            <?php endforeach ?>
        </select>

    </div>
    <hr>
    <p>Informations concernant l'encadrant du stage / La personne a contacter : </p>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input name="lastname" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input name="firstname"type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="mail">E-Mail</label>
        <input name="mail"type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input name="phone"type="text" class="form-control">
        <small id="contact" class="form-text text-muted">(Sous la forme 0XXXXXXXXXX)</small>

        <small id="contact" class="form-text text-muted">Les informations concernant l'encadrant du stage ne seront communiquées qu'aux personnes connectées au site</small>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?= $this->endSection() ?>