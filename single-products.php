<?php
/**
 * The Template for displaying all single posts.
 *
 * @package regional-theme
 */


get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="tmr__wrapper mb">
<?php
$the_slug = 'products';
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
}
?>
  </div>
  <!-- #background-color -->
</div>
<!-- .tmr__wrapper  -->
<div class="divider grey-light"></div>
<section id="single-title" class="grey-light cf">
<div class="tmr__wrapper">

    <?php /* Start the Loop for posts within regions */ ?>
    <?php
      /* Get this posts taxonomy */
      $get_terms = get_the_terms($post->ID, 'mediums');
      $terms_array = array();
      foreach ($get_terms as $key => $value) {
        //Get list of regions associated with this post
        array_push( $terms_array, $value->term_id);
      }

      $post_array = get_posts(array(
        'post_type' => 'products',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true,
        'tax_query' => array(
          array(
          'taxonomy' => 'mediums',
          'field' => 'id',
          'terms' => $terms_array
          )
        )
      ));
    ?>
    <div class="tab_expand tabicon ms_hidden ls_hidden">
      <div class="tabs-arrow-down"></div>
        <div class="tabs-text">Please select a product</div>
    <nav class="tabs-menu">
      <ul>
        <?php foreach( $post_array as $post ): ?><?php setup_postdata($post); ?><li><a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
          </a></li><?php wp_reset_postdata(); ?><?php endforeach;?>
      </ul>
    </nav>
</div><!-- .tab_expand  -->
    <?php wp_reset_postdata(); ?>

<!-- get page content -->

<?php while ( have_posts() ) : the_post(); ?>

  <?php get_template_part( 'content', 'products' ); ?>

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
