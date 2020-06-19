<?= $this->extend('layout') ?>
<?= $this->section('content_admin') ?>
<div class="form_container">
    <h2>Ajouter une offre de stage: </h2>

    <?php
    $validation = \Config\Services::validation();
    ?>
    <?php
    echo form_open_multipart('companyController/adminAdd');
    ?>
    <input type="file" name="picEnt" size="50" />
    <div class="form-group">
        <label for="name">Nom de l'entreprise</label>
        <input name="name" type="text" class="form-control <?php echo $validation->hasError('name') ? 'is-invalid' : '' ?>">
        <?php if ($validation->hasError('name')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('name') ?>
            </div>
        <?php endif; ?>
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
        <label for="address">Adresse</label>
        <input name="address" type="text" class="form-control <?php echo $validation->hasError('address') ? 'is-invalid' : '' ?>">
        <?php if ($validation->hasError('address')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('address') ?>
            </div>
        <?php endif; ?>
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
        <input name="lastname" type="text" class="form-control <?php echo $validation->hasError('lastname') ? 'is-invalid' : '' ?>">
        <?php if ($validation->hasError('lastname')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('lastname') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input name="firstname" type="text" class="form-control <?php echo $validation->hasError('firstname') ? 'is-invalid' : '' ?>">
        <?php if ($validation->hasError('firstname')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('firstname') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="mail">E-Mail</label>
        <input name="mail" type="email" class="form-control <?php echo $validation->hasError('mail') ? 'is-invalid' : '' ?>">
        <?php if ($validation->hasError('mail')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('mail') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input name="phone" type="text" class="form-control <?php echo $validation->hasError('phone') ? 'is-invalid' : '' ?>">
        <small id="contact" class="form-text text-muted">(Sous la forme 0XXXXXXXXXX)</small>

        <small id="contact" class="form-text text-muted">Les informations concernant l'encadrant du stage ne seront communiquées qu'aux personnes connectées au site</small>
        <?php if ($validation->hasError('phone')) : ?>
            <div class="invalid-feedback">
                <?php echo $validation->getError('phone') ?>
            </div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<?= $this->endSection() ?>