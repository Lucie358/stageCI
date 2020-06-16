<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="companiesContainer">
    
    <h2>Les entreprises qui proposent un stage:</h2>
<div class="companies">
    <?php
    foreach ($companies as $entreprise) :
        foreach ($cities as $ville) :
            if ($ville['name'] == $entreprise['city']) :
    ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $entreprise['name']; ?></h5>
                        <p class="card-text"><?php echo $ville['name'] . " - " . $ville['department']; ?></p>
                        <a href="#" class="card-link">En savoir +</a>
                    </div>
                </div>
    <?php endif;
        endforeach;
    endforeach;
    ?>
    </div>
</div>
<?= $this->endSection() ?>