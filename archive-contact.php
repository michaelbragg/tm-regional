<?php 
/*
*
* The template for displaying Contact Archive pages. *
* Learn more: http://codex.wordpress.org/Template_Hierarchy * * @package tm-regional */

get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
         <div class="contact-page-hero kenburns hero-height">
            <div class="container">
                <div class="hero-page-title">
                    <h1><?php echo post_type_archive_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div id='<?php echo $term->slug; ?>' class='tab-container <?php echo $term->slug; ?>-section-block'>
             
                <ul class='posts-menu etabs'>
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <li class='tab'>
                        <a href="#<?php the_slug() ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class='panel-container'>
                    <?php get_template_part( 'content-contact' ); ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
</section>

<!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>