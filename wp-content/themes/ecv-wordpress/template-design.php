<?php 
/*
  Template Name: Page design
*/
  get_header();
?>
<section class="galerie">
  <h1>Nos designs</h1>
  <div class="btns">
    <button type="button" value="tatoo-all">Tous</button>
    <button type="button" value="tatoo-colors">Couleurs</button>
    <button type="button" value="tatoo-black-white">Black & White</button>
  </div>
  <?php
    $images = get_field( 'galerie' );
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if( $images ): 
  ?>
      <ul class="acf-gallery">
        <?php foreach( $images as $image_id ):?>
              <?php $image_cat = get_the_category($image_id); ?>
              <?php $image_cat_name = $image_cat[0]->name; ?>
            <li class="imgs <?php echo $image_cat_name ?>">
                  <?php echo wp_get_attachment_image( $image_id, $size, "", ["class" => "$image_cat_name"])?>
            </li>
          <?php endforeach; ?>
      </ul>
  <?php endif; ?>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".galerie button");
    const images = document.querySelectorAll(".galerie li.imgs");

    function filterImages(event) {
      const filter = event.target.value;
      images.forEach(function(image) {
        const classes = image.classList;
        if (filter === "tatoo-all"){
          image.style.display = "block";
        } else
        if (classes.contains(filter)) {
          image.style.display = "block";
        } else {
          image.style.display = "none";
        }
      });
    }
    buttons.forEach(function(button) {
      button.addEventListener("click", filterImages);
    });
  });
</script>
<?php 
  get_footer();