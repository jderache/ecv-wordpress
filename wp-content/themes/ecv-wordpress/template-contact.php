<?php 
// Template Name: Page contact
get_header(); ?>
<section class="content">
    <?php the_content(); ?>
</section>
<section class="form">
    <form method="post" id="send-contact-form" novalidate>
        <input type="hidden" name="action" value="send_contact_form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo esc_attr( get_field('nom') ); ?>" required>
    
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" value="<?php echo esc_attr( get_field('adresse_email') ); ?>" required>
    
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" required><?php echo esc_textarea( get_field('message') ); ?></textarea>
    
        <button type="submit" class="button-primary">Envoyer</button>
        <p class='error-msg'>Une erreur est survenue, veuillez réessayer plus tard</p>
    </form>
    <div class="contact-info">
        <h2>Informations de contact</h2>
        <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com/ License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>&nbsp;<?= get_field("coordonnees", 'option') ?></p>
        <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com/ License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/></svg>&nbsp;<a href="mailto:<?= get_field("adresse-mail", 'option') ?>"><?= get_field("adresse-mail", 'option') ?></a></p>
        <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com/ License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>&nbsp;<a href="tel:<?= get_field("telephone", 'option') ?>"><?= get_field("telephone", 'option') ?></a></p>
    </div>
</section>

<?php get_footer(); ?>