<?php
/**
 * Template part for displaying single posts.
 *
 * @package tm-regional
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="hero-height hero entry-header" <?php if( has_post_thumbnail() ){ echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"'; } else { echo 'style="background-image: url(' . get_template_directory_uri() . '/gui/hero/our-products.jpg);"'; }; ?> >
    <div class="container page-headline">
        <div class="hero-page-title">
             <?php the_title( '<p>', '</p>' ); ?>
        </div>
    </div>
	</header><!-- .entry-header -->

	<aside class="post-aside">
		<div class="container entry-meta">
				<div class="" style="float: left;"><?php tm_regional_posted_on(); ?></div>
				<div class="" style="float: right;">
				<?php previous_post_link( '%link', __( 'Previous', 'tm-regional' ) ); ?>
				<?php next_post_link( '%link', __( 'Next', 'tm-regional' ) ); ?>
				</div>
		</div><!-- .entry-meta -->
	</aside>


	<div class="container entry-content">
		<div class="post-link-bar">
		<?php tm_regional_entry_footer(); ?>
		</div>
		<?php the_content(); ?>
		<?php
			/*wp_link_pages( array(
				'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'tm-regional' ),
				'after'  => '</div>',
			) );*/
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

