<?php
/**
 * The Template for displaying all single posts.
 *
 * @package tm-regional
 */

$contact_form = get_post_meta( get_the_ID(), '_contact_form', true );

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="tmr__wrapper">
<!-- get page content -->

<?php while ( have_posts() ) : the_post(); ?>

  <?php get_template_part( 'content', 'contact' ); ?>

  <?php if( $contact_form ) {

  ?>
      </div><!-- .tmr__wrapper  -->
      <div class="divider grey-light"></div>
      <div id="contact-form" class="grey-light cf">
      <div class="tmr__wrapper mb cf">
  <?php
    echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' );
    }?>
  

  <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() ) :
      comments_template();
    endif;
  ?>

<?php endwhile; // end of the loop. ?>
 </div>

 <?php the_post_navigation(); ?>


 </div><!-- .tmr__wrapper  -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
