<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p>Liste des entreprises</p>

<?php
foreach ($companies as $entreprise) {
?>
<div class="row">
    <div class="col s12 m2">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title"><?php echo $entreprise['name'] ?></span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">En savoir plus</a>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
<?= $this->endSection() ?>