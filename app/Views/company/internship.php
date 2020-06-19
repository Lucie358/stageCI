<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<caption>Details de l'entreprise</caption>
<table class="table table-striped">
    <thead>
        <th scope="col">Nom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $companyInfos->name ?></td>
            <td><?php echo $companyInfos->address ?></td>
            <td><?php echo $companyInfos->city ?></td>
        </tr>
    </tbody>
</table>
<?php 
if($contactInfos)
{
?>
<caption>Contact</caption>
<table class="table table-striped">
    <thead>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
        <th scope="col">e-mail</th>
        <th scope="col">N° téléphone</th>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $contactInfos->firstname ?></td>
            <td><?php echo $contactInfos->name ?></td>
            <td><?php echo $contactInfos->mail ?></td>
            <td><?php echo $contactInfos->phone ?></td>
        </tr>
    </tbody>
</table>
<?php
}
else
{
?>
<strong> Cette entreprise n'as pas partagé de contact</strong>
<?php
}
?>
<?= $this->endSection() ?>