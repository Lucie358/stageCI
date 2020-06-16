<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h2>Les entreprises qui proposent un stage:</h2>

<div class = "companiesContainer">
    <?php
    foreach ($companies as $entreprise) :
        var_dump($entreprise->city);
    ?>
        <div class="row">
            <div class="col s12 m2">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title"><?php echo $entreprise->name ?></span>
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
    endforeach;
    ?>
</div>
<?= $this->endSection() ?>