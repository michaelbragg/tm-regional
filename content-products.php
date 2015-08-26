<?php
/**
 * The template used for displaying table content in page-audiences.php
 *
 * @package regional-theme
 */
?>

<?php if ( have_adverts() ) { ?>
<div id="<?php the_slug() ?>">
<section class="js-advert brands-style cf">
  <div class="advert-container">
    <div class="col-md-3 advert-container-item advert-container-separator">
      <ul class="js-advert--list ">
      <?php foreach ( the_adverts() as $advert ):
        echo '<li><button class="js-products--button products-button" data-advert-preview="' . wp_get_attachment_url( $advert['id'] ) . '">' . $advert['type'] . '</button></li></a>';
      endforeach; ?>
      </ul>
    </div>
      <div class="col-md-4 advert-container-item">
        <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
      <button class="dwld-btn">Download technical specifications</button>
    </div>
    <div class=" col-md-5 advert-container-item products-container">
      <div class=" js-advert--preview advert-preview__placeholder"></div>
</div>
    </div>
    
  </section><!-- .container -->
</div>

<?php } ?>





