<?php
/**
 * @package tm-regional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <div class="entry-meta">
		<?php regional_theme_posted_on(); ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
    <?php
	  wp_link_pages( array(
		  'before' => '<div class="page-links">' . __( 'Pages:', 'tm-regional' ),
		  'after'  => '</div>',
	  ) );
	?>
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
