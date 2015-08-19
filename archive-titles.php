<?php
/**
 * The template for displaying Title Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="page-hero"></div>
     <div class="container">

<?php
$the_slug = 'titles';
$args=array(
  'name' => $the_slug,
  'post_type' => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);

?>   <div id="background-color">
<?php

if( $my_posts ) {
  echo '<h1>' . $my_posts[0]->post_title . '</h1>';
  echo $my_posts[0]->post_content;
?>
  </div><!-- #background-color -->
  </div><!-- .container -->
  
<?php
}
?>

<?php
  $taxonomy_type = 'regions';
  $posts = get_categories('taxonomy=' . $taxonomy_type . '&type=titles');
  $terms = get_terms($taxonomy_type, array());
  ?>

<?php /* Start the Loop for regions */ ?>

<?php foreach( $terms as $term ): ?>

  <div class="divider grey-light"></div>
    <div id="titles-main" class="grey-light cf">
      <div class="container">

  <section>
  <h2><?php echo $term->name; ?></h2>

    <?php /* Start the Loop for posts within regions */ ?>

    <?php
      $post_array = get_posts(array(
        'post_type' => 'titles',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true
      ));
    ?>
<div id="tab-container" class='tab-container'>
 <ul class='etabs'>
   <li class='tab'><a href="#tabs1-html">HTML Markup</a></li>
   <li class='tab'><a href="#tabs1-js">Required JS</a></li>
   <li class='tab'><a href="#tabs1-css">Example CSS</a></li>
 </ul>
 <div class='panel-container'>
  <div id="tabs1-html">
   <h2>HTML Markup for these tabs</h2>
   <p>The HTML markup for your tabs and content can be arranged however you want. At the minimum, you need a container, a collection of links for your tabs (an unordered list by default), and matching divs for your tabbed content. Make sure the tab <code>href</code> attributes match the
<code>id</code> of the target panel. This is standard semantic markup for in-page anchors.</p>
   <p>The class names above are just to make it easy to style. You can make them whatever you want, there's no magic here.</p>
  </div>
   <div id="tabs1-js">
   <h2>JS for these tabs</h2>
  </div>
  <div id="tabs1-css">
   <h2>CSS Styles for these tabs</h2>
  </div>
 </div>
</div>


<div class="tab_expand tabicon ms_hidden ls_hidden">
  <div class="tabs-arrow-down"></div>
  <div class="tabs-text">Please select a title</div>

    <nav class="tabs-menu">
      <ul>
    <?php foreach( $post_array as $post ): ?><?php setup_postdata($post); ?><li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li><?php wp_reset_postdata(); ?><?php endforeach;?>
    </ul></nav>
</div>

    <?php

      $single_post_args = array(
        'numberposts' => 1,
        'post_type' => 'titles',
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
        get_template_part( 'content-titles', 'title' );
      endforeach;
    ?>

    <?php wp_reset_postdata(); ?>

    </section>

   </div><!-- .tmr__wrapper  -->

<?php endforeach; ?>

        </div><!-- #titles-main -->
     
    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
