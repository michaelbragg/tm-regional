<?php
/**
 * The template for displaying Rates Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

$taxonomy_type = 'regions';
$posts = get_categories('taxonomy=' . $taxonomy_type . '&type=rates');
$terms = get_terms($taxonomy_type, array());

get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="rates-page-hero kenburns hero-height">
      <div class="container">
        <div class= "hero-page-title"><h1><?php echo post_type_archive_title(); ?></h1></div>
      </div>
</div>
<?php if( have_rates_description() ): ?>
      <div class="page-contents">
        <div class="container">
          <p><?php the_rates_description(); ?></p>
        </div>
      </div>
      <?php endif; ?>

<div class="region-selector">
  <div class=" container">
     <div class="tab_expand tabicon">
    <div class="tabs-arrow-down"></div>
    <div class='region-tab-container'>
      <h2>Select your region</h2>
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
    <div class="container">
<?php /* Start the Loop for regions */ ?>
<?php foreach( $terms as $term ): ?>
  <?php /* Start the Loop for posts within regions */ ?>
    <?php
      $post_array = get_posts(array(
        'post_type' => 'rates',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true
      ));
    ?>
      <?php /* Start sections loop */ ?>
<div id="<?php echo $term->slug; ?>" class='tab-container <?php echo $term->slug; ?>-section-block' >
<div id='tab-container' class='tab-container'>
  <h2><?php echo $term->name; ?></h2>
      <ul class='posts-menu etabs'>
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
        'post_type' => 'rates',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => false
      );

      $single_post = get_posts( $single_post_args );
      foreach( $single_post as $post ):
      setup_postdata($post);
        get_template_part( 'content-rates' );
      wp_reset_postdata();
      endforeach;
    ?>
  </div>
    <?php /* End post loop */ ?>
</div>
</div>
<?php endforeach; ?>
    </div><!-- .container  -->
  </main><!-- #main -->
</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>