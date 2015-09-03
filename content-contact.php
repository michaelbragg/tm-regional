<?php
/**
 * @package tm-regional
 */

$longlat = get_post_meta( get_the_ID(), '_longlat', true );
$contact_form = get_post_meta( get_the_ID(), '_contact_form', true );
?>


<div id="<?php the_slug() ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="grid ss1-ss4 ms1-ms6 ls7-ls12">
      <?php if( !empty( $longlat[0] ) && !empty( $longlat[1] ) ){ ?>
      <a target="_blank" href="http://maps.google.com/maps?q=<?php echo $longlat[0]; ?>,<?php echo $longlat[1]; ?>+(<?php the_title(); ?>)&z=13&t=m"><img class="maps__responsive" src="http://maps.googleapis.com/maps/api/staticmap?zoom=12&size=690x690&maptype=roadmap&markers=color:red%7C<?php echo $longlat[0]; ?>,<?php echo $longlat[1]; ?>&format=png8" alt=""></a>
      <?php } ?>

</div><!-- .tmr__wrapper  -->
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="">
      <!--  Post Navigation  -->
    </div><!--  -->
  </header><!-- .entry-header -->

  <div class="entry-content container cf">

    <div class="grid ss1-ss4 ms1-ms6 ls1-ls6">

      <?php the_content(); ?>

    </div>


      <?php if( $contact_form ) {

  ?>
      
      <div class="divider grey-light"></div>
      <div id="contact-form" class="grey-light cf">
      <div class="tmr__wrapper mb cf">
  <?php
    echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' );
    }?>


      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'tm-regional' ),
          'after'  => '</div>',
        ) );
      ?>
    </div>

    </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list( __( ', ', 'tm-regional' ) );

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ', 'tm-regional' ) );

      printf(
        $meta_text,
        $category_list,
        $tag_list,
        get_permalink()
      );
    ?>

    <?php edit_post_link( __( 'Edit', 'tm-regional' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
</article><!-- #post-## -->

</div>
