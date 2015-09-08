<?php
/**
 * The template for displaying Audiences Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

$taxonomy_type = 'regions';
$posts = get_categories('taxonomy=' . $taxonomy_type . '&type=audiences');
$terms = get_terms($taxonomy_type, array());

get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <div class="audience-page-hero">

      <div class="container">
        <div class= "hero-page-title"><h1>Our Audience<!--<?php echo post_type_archive_title(); ?>--></h1></div>
      </div>

      <div class="page-contents">
        <div class="container">

        </div>
              <!-- .container  -->
      </div>
    </div>


    <div class="container">

<?php /* Start the Loop for regions */ ?>


<?php foreach( $terms as $term ): ?>

  <?php /* Start the Loop for posts within regions */ ?>

    <?php
      $post_array = get_posts(array(
        'post_type' => 'audiences',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true
      ));
    ?>

      <?php /* Start sections loop */ ?>

<div class='tab-container'>
  <h2><?php echo $term->name; ?></h2>
      <ul class='etabs'>
      <?php foreach( $post_array as $post ): ?>
        <?php setup_postdata($post); ?>
        <li class='tab'><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li>
        <?php wp_reset_postdata(); ?>
      <?php endforeach;?>
      <?php /* End sections loop */ ?>
      </ul>
    

 <div class='panel-container'>
<?php
      $single_post_args = array(
        'numberposts' => 999,
        'post_type' => 'audiences',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => false
      );

      $single_post = get_posts( $single_post_args );

      foreach( $single_post as $post ):
      setup_postdata($post);
        get_template_part( 'content-audiences' );
      wp_reset_postdata();

      endforeach;
    ?>

  </div>

    <?php /* End post loop */ ?>


      <?php endforeach; ?>
</div>
      </section>
    </div><!-- .container  -->

  </main><!-- #main -->
</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
