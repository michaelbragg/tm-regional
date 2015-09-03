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

<div class='tab-container'>
  <h2></h2>
 <ul class='etabs'>

<?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
    <li class='tab'><a href="#<?php the_slug() ?>"><?php the_title(); ?></a></li>
      <?php endwhile; ?>

 </ul>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class='panel-container'>
<?php get_template_part( 'content-contact' ); ?>
</div>

<?php endwhile; ?>

</div>
  </section>
  </div><!-- .tmr__wrapper  -->

    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
