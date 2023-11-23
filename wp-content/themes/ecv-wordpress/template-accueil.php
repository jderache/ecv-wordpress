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
    <h2><?= get_field("description-title") ?></h2>
    <p><?= get_field("description") ?></p>
</section>

<section class="history">
    <div class="history-img">
        <img src="<?= get_field('histoire_img'); ?>" alt="">
    </div>
    <div class="history-content">
        <h2>Histoire</h2>
        <p><?= get_field("histoire") ?></p>
        <a class="button-primary" href="./histoire/">En savoir plus</a>
    </div>
</section>

<section class="design">
    <h2>Nos Designs</h2>
    <div class="design-gallery">
        <?php 
        $images = get_field('apercu-design');
        for($i = 0; $i < 3; $i++): ?>
            <div class="design-gallery-item">
                <div id="image-<?= $i ?>" style="background-image: url(<?= $images[$i] ?>)"></div>
                <?php if($i === 2): ?>
                    <a class="button-primary" href="./design">Voir notre galerie</a>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</section>

<section class="contact">
    <div class="contact-link"> 
        <a class="button-primary" href="./contact">Nous contacter</a>
        <img src="https://cdn-icons-png.flaticon.com/512/207/207161.png" alt="">
    </div>
</section>

<?php
get_footer();
?>