<?php
/**
 * The template for displaying Process module.
 *
 * @package tm-regional
 */
?>

<?php if ( get_theme_mod( 'front-page-video' ) ) :   ?>
<section class="process section js-height-full" id="section4">
  <div class="process__video js-fitvid">
    <iframe
      id="player"
      width="500"
      height="315"
      src="http://www.youtube.com/embed/<?php echo get_theme_mod( 'front-page-video' ); ?>?enablejsapi=1"
      frameborder="0"
      allowfullscreen>
    </iframe>
  </div>
</section>
<?php endif; ?>
