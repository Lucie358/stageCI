<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Liste des entreprises</h2>

<ul class="list-group w-50">
<?php
foreach ($companies as $entreprise) :
?>

  <li class="list-group-item"><?php echo $entreprise['name']?></li>


<?php endforeach; ?>
</ul>
<?= $this->endSection() ?>