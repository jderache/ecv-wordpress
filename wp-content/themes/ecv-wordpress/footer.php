<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecv-wordpress
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			

<!-- Site internet de l'auteur -->
<a href="<?= get_field("site_internet_de_lauteur", 'option') ?>">
		<!-- Nom de l'auteur -->
		<?= get_field("auteur_du_site", 'option') ?>
</a>


		<span class="sep"> | </span>
		<?php
			echo sprintf( esc_html__( 'Theme: %1$s par %2$s', 'ecv-wordpress' ), 'ecv-wordpress', '<a href="https://julienderache.fr/" target="_blank">Julien D.</a> & <a href="https://thibautdusautoir.fr/" target="_blank">Thibaut D.</a>');
		?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
