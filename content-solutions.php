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
    <div class="col-sm-5 col-md-3 solutions-container-item solutions-container-advert-item">
      <ul class="js-solutions--list ">
      <?php foreach ( the_adverts() as $advert ):
        echo '<li><button data-divid="js-type-' . sanitize_title($advert['type']) . ' "  class="js-products--button products-button" data-solutions-preview="' . wp_get_attachment_url( $advert['id'] ) . '">' . $advert['type'] . '</button></li></a>';
      endforeach; ?>
      </ul>
    </div>
      <div class="col-sm-7 col-md-4 solutions-container-item">
           <?php foreach ( the_adverts() as $advert ): ?>
            <?php #print_r( the_adverts() );?>
           <article id="js-type-<?php echo sanitize_title($advert['type']); ?>" class = "content js-solutions--description">
           <?php the_adverts_title($advert); ?>
           <?php the_adverts_description($advert); ?>
           </article>
           <?php endforeach; ?>
           <?php if( has_build_guide() ): ?>
             <a class="btn dwld-btn" href="<?php the_build_guide(); ?>">Build Guide</a>
           <?php endif; ?>
      </div>
    <div class=" col-md-5 solutions-container-item products-container">
      <div class="js-solutions--preview solutions-preview__placeholder"></div>
</div>
    </div>

  </section><!-- .container -->
</div>
</div>

<?php } ?>




