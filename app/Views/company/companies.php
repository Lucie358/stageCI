<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Liste des entreprises</h2>

<ul>
<?php
foreach ($companies as $entreprise) :
?>

  <?php echo "<li>".$entreprise['name']."</li>" ?>

<?php endforeach; ?>
</ul>
<?= $this->endSection() ?>