<?php 
// Template Name: Page histoire

get_header(); ?>

<section class="content">
    <?php the_content(); ?>
    <div class="founders">
      <div id="founder-1">
        <img src="<?= get_field('avatar_fondateur_1'); ?>" alt="Portrait de Thibaut Dusautoir">
        <h3><?= get_field('nom-fondateur-1'); ?></h3>
        <p class="desc-fondateur"><?= get_field('description_fondateur_1'); ?></p>
    </div>
    <div id="founder-2">
        <img src="<?= get_field('avatar_fondateur_2'); ?>" alt="Portrait de Julien Derache">
        <h3><?= get_field('nom-fondateur-2'); ?></h3>
        <p class="desc-fondateur"><?= get_field('description_fondateur_2'); ?></p>
    </div>
    </div>
</section>
<section id="history-timeline">
  <h2>L'histoire d'Inkognito</h2>
  <ul>
      <li>
          <h3>2001 : Création de la Marque</h3>
          <p>La naissance de notre vision unique du tatouage...</p>
      </li>
      <li>
          <h3>2003 : Ouverture du Salon</h3>
          <p>Inkognito ouvre ses portes, proposant une expérience de tatouage révolutionnaire...</p>
      </li>
      <!-- Ajoutez d'autres événements clés ici en utilisant le même format -->
  </ul>
</section>

<?php get_footer(); ?>