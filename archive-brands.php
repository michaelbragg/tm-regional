<?php
/**
 * The template for displaying Title Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

get_header(); ?>

<?php
$the_slug = 'brands';
$args=array(
  'name' => $the_slug,
  'post_type' => 'page',
  'post_status' => 'publish',
   'orderby' => 'menu_order',
  'numberposts' => 1
);
$my_posts = get_posts($args);

?>  

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="titles-page-hero kenburns">
          <div class="container">
          <div class= "hero-page-title"><?php echo '<h1>' . $my_posts[0]->post_title . '</h1>'; ?></div>
        </div>
        </div>
      
<div class="page-contents">

      <div class="container">
<?php

if( $my_posts ) {
 
  echo $my_posts[0]->post_content;
}
?>
  </div><!-- .tmr__wrapper  -->
</div>




<?php
  $taxonomy_type = 'regions';
  $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=brands');
  $terms = get_terms($taxonomy_type, array());
  ?>

<?php /* Start the Loop for regions */ ?>

<?php foreach( $terms as $term ): ?>
      <div class="container">
  <section>
    <?php
      $post_array = get_posts(array(
        'post_type' => 'brands',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true
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
        'post_type' => 'brands',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => false
      );
      $single_post = get_posts( $single_post_args );
      //print_r( $single_post );
      foreach( $single_post as $post ):
      setup_postdata($post);
      //print_r($single);
        get_template_part( 'content-brands' );
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
