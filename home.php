<?php
/**
 * The 'Posts Page' template file.
 *
 * @package tm-regional
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="kenburns hero-height hero hero--blog entry-header">
		    <div class="container page-headline">
		        <div class="hero-page-title">
		             <p><?php _e( 'Blog', 'tm-regional' ); ?></p>
		        </div>
		    </div>
			</section><!-- .entry-header -->

			<section class="container page-content">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<div class="post-link-bar">
			<?php tm_regional_posted_on(); ?>
			<?php tm_regional_entry_footer(); ?>
			</div>
			<?php the_excerpt(); ?>
			</article>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
