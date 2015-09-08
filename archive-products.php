<?php
/**
 * The template for displaying Product Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="products-page-hero">
          <div class="container">
          <div class= "hero-page-title"><h1><?php echo post_type_archive_title(); ?></h1></div>
        </div>

<div class="page-contents">

      <div class="container">

  </div><!-- .tmr__wrapper  -->
</div>

</div>

<?php
  $taxonomy_type = 'mediums';
  $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=products');
  $terms = get_terms($taxonomy_type, array());
  ?>

<?php /* Start the Loop for regions */ ?>


<?php foreach( $terms as $term ): ?>

<div class="divider grey-light"></div>


<div id="titles-main" class="grey-light cf">
<div class="tmr__wrapper">

  <section>
  <h2><?php echo $term->name; ?></h2>

  <?php /* Start the Loop for posts within regions */ ?>

<?php
  $post_array = get_posts(array(
    'post_type' => 'products',
    'taxonomy' => $term->taxonomy,
    'term' => $term->slug,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'nopaging' => true
  ));
?>

<?php /* Start sections loop */ ?>
<ul class='etabs'>
<?php foreach( $post_array as $post ): ?>
  <?php setup_postdata($post); ?>
  <li class='tab'><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li>
  <?php wp_reset_postdata(); ?>
<?php endforeach;?>
</ul>
<?php /* End sections loop */ ?>

<?php
      $single_post_args = array(
        'posts_per_page' => 9999,
        'post_type' => 'products',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => false
      );

      $single_post = get_posts( $single_post_args );
      foreach( $single_post as $post ):

        setup_postdata( $post );
          get_template_part( 'content-products' );
        wp_reset_postdata();

      endforeach;
    ?>


  </section>
  </div><!-- .tmr__wrapper  -->
</div><!-- #titles-main -->
<?php endforeach; ?>

    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
