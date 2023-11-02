<?php

// Template Name: Page d'accueil
get_header();


?>

<section class="hero-banner" style="background-image: url(<?= get_field('hero-img'); ?>)">
    <div class="content">
        <h1><?= get_field('hero-title') ?></h1>
        <p><?= get_field('hero-slogan') ?></p>
    </div>
</section>

<section class="description">
    <h2>Description : </h2>
    <p><?= get_field("description") ?></p>
</section>