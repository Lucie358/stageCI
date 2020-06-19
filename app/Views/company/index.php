<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="companiesContainer">
    <h1> Bonjour <?php echo $_SESSION['userData']->username ?></h1>
    <h2>Les entreprises qui proposent un stage:</h2>
<div class="companies">
    <?php
    foreach ($cities as $row) :
        foreach ($companies as $entreprise) :
            if ($row->name == $entreprise['city']) :
    ?>
                <div class="card">
                <img src="<?php echo base_url(); ?>/img/uploads/<?php echo $entreprise['pic'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $entreprise['name']; ?></h5>
                        <p class="card-text"><?php echo $row->name . " - " . $row->department; ?></p>
                        <a href="<?= site_url(route_to('internship',$entreprise['id']))?>" class="card-link">En savoir +</a>
                    </div>
                </div>
    <?php endif;
        endforeach;
    endforeach;
    ?>
    </div>
</div>
<?= $this->endSection() ?>
