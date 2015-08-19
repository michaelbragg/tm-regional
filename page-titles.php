<?php
/*
Template Name: Titles
 */

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package regional-theme
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'content', 'page' ); ?>

      <?php
        $taxonomy_type = 'regions';
        $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=titles');
        $terms = get_terms($taxonomy_type, array());
      ?>

      <?php foreach( $terms as $term ): ?>

       <h2 id="<?php echo $term->slug; ?>"><?php echo $term->name;?></h2>

      <?php $post_array = get_posts(array(
              'post_type' => 'titles',
              'taxonomy' => $term->taxonomy,
              'term' => $term->slug,
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'nopaging' => true
            ));?>

            <ul class="list list__inline">
              <?php /*  Loop  */ ?>
              <?php  foreach( $post_array as $post ):?>

                <?php setup_postdata($post); ?>

                <h3><?php the_title(); ?></h3>

                <?php get_template_part( 'content', 'titles' );?>
              <?php endforeach;?>
              <?php wp_reset_postdata(); ?>

            </ul>
      <?php endforeach; ?>

              <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                  comments_template();
                endif;
              ?>

      <?php endwhile; // end of the loop. ?>
      </div><!-- .tmr__wrapper  -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
