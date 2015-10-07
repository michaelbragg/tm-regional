<?php
/**
 * @package tm-regional
 */

$longlat = get_post_meta( get_the_ID(), '_longlat', true );
$contact_form = get_post_meta( get_the_ID(), '_contact_form', true );
?>


<div id="<?php the_slug() ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php if( !empty( $longlat[0] ) && !empty( $longlat[1] ) ){ ?>
      <a target="_blank" href="http://maps.google.com/maps?q=<?php echo $longlat[0]; ?>,<?php echo $longlat[1]; ?>+(<?php the_title(); ?>)&z=13&t=m">
      </a>
      <?php } ?>
<section class="contact-info">
<div class="row">
  <div class="col-md-5 white">
     <div class="address-details">
          <?php the_content(); ?>
      </div>
  </div>
      <?php if( $contact_form ) {
  ?>
  <div class="col-md-7 brand contact-right-col">
      <div id="contact-form" class="contact-form-info cf">
          <div class="tmr__wrapper mb cf">
            <?php
              echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' );
              }?>
       </div>
    </div><!-- .entry-content -->
  </div>
</div>
</section>
</article><!-- #post-## -->
</div>
