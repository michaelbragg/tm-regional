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

            <?php /* Add page Description*/ ?>
        <?php if( have_offices_description() ): ?>
        <div class="page-contents contacts-text">
            <div class="container">
                <p>
                    <?php the_offices_description(); ?>
                </p>
            </div>
        </div>
        <?php endif; ?>

        <div class="container contact-info">
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
