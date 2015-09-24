<?php
/**
 * The template used for displaying table content in page-products.php
 *
 * @package tm-regional
 */
?>

<?php if ( have_adverts() ) { ?>
<div class='panel-container'>
<div id="<?php the_slug() ?>">
<section class="js-solutions brands-style cf">
  <div class="solutions-container">
    <div class="col-md-3 solutions-container-item solutions-container-separator">
      <ul class="js-solutions--list ">
      <?php foreach ( the_adverts() as $advert ):
        echo '<li><button class="js-products--button products-button" data-solutions-preview="' . wp_get_attachment_url( $advert['id'] ) . '">' . $advert['type'] . '</button></li></a>';
      endforeach; ?>
      </ul>
    </div>
      <div class="col-md-4 solutions-container-item">
        <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
      <button class="dwld-btn">Build Guide</button>
    </div>
    <div class=" col-md-5 solutions-container-item products-container">
      <div class="js-solutions--preview solutions-preview__placeholder"></div>
</div>
    </div>

  </section><!-- .container -->
</div>
</div>

<?php } ?>





