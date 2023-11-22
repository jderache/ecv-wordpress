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
</section>

<?php get_footer(); ?>