<?php 
/*
  Template Name: Page design
*/

  get_header();
?>
<?php 
  $images = get_field( 'galerie' );
  $size = 'full'; // (thumbnail, medium, large, full or custom size)
  if( $images ): 
?>
  <ul class="acf-gallery">
    <?php foreach( $images as $image_id ): ?>
        <li>
            <a href="<?php echo wp_get_attachment_url( $image_id ); ?>">
              <?php echo wp_get_attachment_image( $image_id, $size ); ?>
              </a>
        </li>
      <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php 
  get_footer();