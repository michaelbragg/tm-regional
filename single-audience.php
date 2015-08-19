<?php
/**
 * The Template for displaying all single posts.
 *
 * @package tm-regional
 */


get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<div class="container">
  <?php
$the_slug = 'audience';
$args=array(
  'name' => $the_slug,
  'post_type' => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);

?>
  <div id="background-color">
    <?php

if( $my_posts ) {
  echo '<h1>' . $my_posts[0]->post_title . '</h1>';
  echo $my_posts[0]->post_content;
?>
  </div>
  <!-- #background-color -->
</div><!-- .container -->
<div class="divider grey-light"></div>
<section id="single-title" class="grey-light cf">
<div class="container">
  <?php
}
?>
    <?php /* Start the Loop for posts within regions */ ?>
    <?php
      /* Get this posts taxonomy */
      $get_terms = get_the_terms($post->ID, 'regions');
      $terms_array = array();
      foreach ($get_terms as $key => $value) {
        //Get list of regions associated with this post
        array_push( $terms_array, $value->term_id);
      }

      $post_array = get_posts(array(
        'post_type' => 'audience',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true,
        'tax_query' => array(
          array(
          'taxonomy' => 'regions',
          'field' => 'id',
          'terms' => $terms_array
          )
        )
      ));
    ?>
    <div class="tab_expand tabicon ms_hidden ls_hidden">
  <div class="tabs-arrow-down"></div>
  <div class="tabs-text">Please select an area</div>
    <nav class="tabs-menu">
      <ul>
        <?php foreach( $post_array as $post ): ?><?php setup_postdata($post); ?><li><a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
          </a></li><?php wp_reset_postdata(); ?><?php endforeach;?>
      </ul>
    </nav>

    </div>
    <?php wp_reset_postdata(); ?>


  <!-- get page content -->

  <?php while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'content', 'audiences' ); ?>
  <?php the_post_navigation(); ?>
  <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() ) :
      comments_template();
    endif;
  ?>
  <?php endwhile; // end of the loop. ?>

</div><!-- .tmr__wrapper  -->
</section>


<?php get_footer(); ?>
