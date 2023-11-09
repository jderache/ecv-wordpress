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
        <img src="https://www.perneslesfontaines.fr/uploads/thumbnails/uploads/agenda/old-book-1_800x600.png" alt="">
    </div>
    <div class="history-content">
        <h2>Histoire</h2>
        <p><?= get_field("histoire") ?></p>
        <a href="./histoire/">En savoir plus</a>
    </div>
</section>

<section class="design">
    <h2>Nos Designs</h2>
    <div class="design-gallery">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <a href="/design">Voir notre galerie</a>
</section>

<?php

get_footer();

?>