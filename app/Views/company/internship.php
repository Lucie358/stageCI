<?= $this->extend('layout') ?>
<?= $this->section('content') ?>


<div class="companiesContainer">
    <h1>Details de l'entreprise</h1>
    <div>
        <div class="card w-50 m-auto">
            <img src="<?php echo base_url(); ?>/img/uploads/<?php echo $companyInfos->pic ?>" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h2 class="card-title"><?php echo $companyInfos->name; ?></h2>
                <p class="card-text"><?php echo $companyInfos->city ?></p>
                <p class="card-text"><?php echo $companyInfos->address ?></p>
                <hr>
                <h5>Pour en savoir plus sur le stage : </h5>
                <p class="card-text"> <?php echo $contactInfos->name." ".$contactInfos->firstname; ?></p>
                <p class="card-text "><img class="icon mr-2" src="<?php echo base_url(); ?>/img/icons/email.png"><?php echo $contactInfos->mail ?></p>
                <p class="card-text"><img  class="icon mr-2"src="<?php echo base_url(); ?>/img/icons/vibration.png"><?php echo $contactInfos->phone ?></p>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>