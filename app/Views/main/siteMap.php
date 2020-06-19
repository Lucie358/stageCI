<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p>Petit plan du site</p>

<p>Général</p>
<ul>
    <li><a href="<?= site_url(route_to('index')) ?>" >Liste des annonces</a></li>
    <li><a href="<?= site_url(route_to('companies')) ?>" >Liste des entreprises</a></li>
</ul>

<p>Connexion</p>
<ul>
    <li><a href="<?= site_url(route_to('signIn')) ?>" >S'inscrire</a></li>
<?php
    if($_SESSION['userData']->lvlrights == -1)
    {
?>
        <li><a href="<?= site_url(route_to('login')) ?>" >Se connecter</a></li>
<?php
    }
    else
    {
?>
        <li><a href="<?= site_url(route_to('logOut')) ?>" >Se deconnecter</a></li>
<?php
    }
?>

    
</ul>

<p>Administration</p>
<ul>
    <li><a href="<?= site_url(route_to('admin')) ?>" >Portail d'administration</a></li>
</ul>

<p>Annexes</p>
<ul>
<li><a href="<?= site_url(route_to('legalNotices')) ?>" >Mentions légales</a></li>
<li><a href="<?= site_url(route_to('siteMap')) ?>" >Plan du site</a></li>
</ul>
<?= $this->endSection() ?>