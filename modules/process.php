<?php
/**
 * The template for displaying Process module.
 *
 * @package tm-regional
 */
?>

<?php if( get_theme_mod( 'front-page-video' ) ): ?>
  <section class="process section js-height-full" id="section4">
        <div class="hero-gif">
            <?php echo wp_oembed_get( 'https://www.youtube.com/watch?v=' . get_theme_mod( 'front-page-video' )  ); ?>
        </div>
</section>
<?php endif; ?>
