<?php
/**
 * The template for displaying Contact Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

<?php
$the_slug = 'contact';
$args=array(
  'name' => $the_slug,
  'post_type' => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);

?>   
      <?php
  $taxonomy_type = 'offices';
  $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=contact');
  $terms = get_terms($taxonomy_type, array());
  ?>

<?php /* Start the Loop for regions */ ?>

<?php foreach( $terms as $term ): ?>

<div class="container">
  <section>
  <?php /* Start the Loop for posts within regions */ ?>

    <?php
      $post_array = get_posts(array(
        'post_type' => 'contact',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'name',
        'nopaging' => true,
         'numberposts' => 1

      ));
    ?>

<div class='tab-container'>
  <h2><?php echo $term->name; ?></h2>
 <ul class='etabs'>
        <?php foreach( $post_array as $post ): ?><li class='tab'><a href="#<?php the_slug() ?>"><?php the_title(); ?></a></li><?php endforeach;?>

 </ul>
 <div class='panel-container'>
<?php
      $single_post_args = array(
        'post_type' => 'contact',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'order' => 'name',
        'nopaging' => false
       
      );
      $single_post = get_posts( $single_post_args );
      //print_r( $single_post );
      foreach( $single_post as $post ):
      setup_postdata($post);
      //print_r($single);
        get_template_part( 'content-contact' );
      endforeach;
    ?>
    <?php wp_reset_postdata(); ?>
</div>
</div>
  </section>
  </div><!-- .tmr__wrapper  -->

<?php endforeach; ?>
    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
