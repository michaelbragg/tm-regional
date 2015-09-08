<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package tm-regional
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="top-404"><div class="error404-txt">404</div></div>

<div class="bottom-404"><div class="error-message">
	<header>
					<h1 class="error-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tm-regional' ); ?></h1>
					<p>We can take you to the Homepage if you want to.</p>
					<a class='btn' href="<?php echo get_home_url(); ?>">Click Here</a>
				</header><!-- .page-header --></div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
