<?php
/**
 * The template used for displaying table content in page-audiences.php
 *
 * @package tm-regional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <h3 class="entry-title"><?php the_title(); ?></h3>
  </header><!-- .entry-header -->

<div class="entry-content">
    <?php
	  wp_link_pages( array(
		  'before' => '<div class="page-links">' . __( 'Pages:', 'tm-regional' ),
		  'after'  => '</div>',
	  ) );
	?>
</div><!-- .entry-content -->

<?php if ( have_adverts() ) { ?>

  <section class="js-advert container products-style cf">
    <div class="grid ss1-ss4 ms1-ms6 ls1-ls6">

		<?php the_content(); ?>

      <ul class="js-advert--list">

		<?php foreach ( the_adverts() as $advert ) :

			echo '<li><button class="js-products--button products-button" data-advert-preview="' . wp_get_attachment_url( $advert['id'] ) . '">' . $advert['type'] . '</button></li></a>';

	  endforeach; ?>
      </ul>
    </div>

    <div class="grid ss1-ss4 ms1-ms6 ls7-ls12">
      <div class="ad-preview">
      <div class="js-advert--preview advert-preview__placeholder"></div></div>
    </div>

    <div class="grid ss1-ss4 ms1-ms6 ls1-ls12">
       <button class="dwld-btn">Download technical specifications</button>
    </div>

  </section><!-- .container -->

<?php } ?>

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
