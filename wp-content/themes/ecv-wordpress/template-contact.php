<?php 
// Template Name: Page contact
get_header(); ?>

<h1>Contactez-nous</h1>
<p>Pour toute question ou prise de rendez-vous, n'hésitez pas à nous contacter en utilisant le formulaire ci-dessous :</p>

<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
    <input type="hidden" name="action" value="process_contact_form">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo esc_attr( get_field('nom') ); ?>" required>

    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" value="<?php echo esc_attr( get_field('adresse_email') ); ?>" required>

    <label for="message">Message :</label>
    <textarea id="message" name="message" rows="4" required><?php echo esc_textarea( get_field('message') ); ?></textarea>

    <button type="submit">Envoyer</button>
</form>

<?php get_footer(); ?>