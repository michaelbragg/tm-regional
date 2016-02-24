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
  $taxonomy_type = 'regions';
  $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=brands');
  $terms = get_terms( $taxonomy_type, array( 'orderby' => 'menu_order' ) );
  ?>

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
      <div class="titles-page-hero kenburns hero-height">
         <div class="container page-headline">
                     <?php /* Add page Description*/ ?>
                 <?php if( have_brands_description() ): ?>
                <div class="hero-page-title">
                     <p> <?php the_brands_description(); ?> </p>
                </div>
                <?php endif; ?>
            </div>
  </div>



<div class="region-selector">
<div class=" container">
  <div class="tab_expand tabicon">
    <div class="tabs-arrow-down"></div>
    <div class='region-tab-container'>
      <h2>Select a region</h2>
         <ul class='tabs-menu etabs'>
          <?php foreach( $terms as $term ): ?>
          <li class='tab'><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
          <?php endforeach;?>
        <?php /* End sections loop */ ?>
      </ul>
    </div>
  </div>
  </div>
</div>

<?php /* Start the Loop for regions */ ?>

<div class="container">

<?php foreach( $terms as $term ): ?>
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
<div class="tab_expand tabicon brand-wrap">
    <div class="tabs-arrow-down"></div>
      <div id='<?php echo $term->slug; ?>' class='tab-container <?php echo $term->slug; ?>-section-block' >

        <h2><?php echo $term->name; ?><small class="tab-select-text"> <?php _e( 'Select a brand', 'tm-regional' ); ?></small></h2>
          <ul class='posts-menu tabs-menu etabs brand-select'>
            <?php foreach( $post_array as $post ): ?><li class='tab'><a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></li><?php endforeach;?>
          </ul>

 <div class='panel-container'>
<?php
      $single_post_args = array(
        'posts_per_page'   => 99999,
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
</div>
<?php endforeach; ?>
   </div><!-- .tmr__wrapper  -->
    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
