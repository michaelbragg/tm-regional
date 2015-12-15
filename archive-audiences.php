<?php /** * The template for displaying Audiences Archive pages. *
* Learn more: http://codex.wordpress.org/Template_Hierarchy *
* @package tm-regional */

$taxonomy_type='regions' ;
$posts=get_categories( 'taxonomy=' . $taxonomy_type . '&type=audiences');
$terms=get_terms( $taxonomy_type, array( 'orderby' => 'menu_order' ) );

get_header(); ?>


<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="audience-page-hero kenburns hero-height">
            <div class="container page-headline">
                     <?php /* Add page Description*/ ?>
                 <?php if( have_audiences_description() ): ?>
                <div class="hero-page-title">
                     <p> <?php the_audiences_description(); ?> </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
   


 <?php /* Add regional tab selector */ ?>
        <div class="region-selector">
            <div class="container">
                <div class="tab_expand tabicon">
                    <div class="tabs-arrow-down"></div>
                    <div class='region-tab-container'>
                        <h2>Select a region</h2>
                        <ul class='tabs-menu etabs'>
                            <?php foreach( $terms as $term ): ?>
                            <li class='tab'>
                                <a href="#<?php echo $term->slug; ?>">
                                    <?php echo $term->name; ?></a>
                            </li>
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
            <?php $post_array=get_posts(array( 'post_type'=> 'audiences', 'taxonomy' => $term->taxonomy, 'term' => $term->slug, 'orderby' => 'menu_order', 'order' => 'ASC', 'nopaging' => true )); ?>

            <?php /* Start sections loop */ ?>

            <div class="tab_expand tabicon brand-wrap">
                <div class="tabs-arrow-down"></div>
                <div id='<?php echo $term->slug; ?>' class='tab-container <?php echo $term->slug; ?>-section-block'>
                    <h2><?php echo $term->name; ?><small class="brand-select-text"> / Select a statistic</small></h2>
                    <ul class='posts-menu tabs-menu etabs brand-select'>
                        <?php foreach( $post_array as $post ): ?>
                        <?php setup_postdata($post); ?>
                        <li class='tab'>
                            <a href="#<?php the_slug() ; ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                        <?php wp_reset_postdata(); ?>
                        <?php endforeach;?>
                        <?php /* End sections loop */ ?>
                    </ul>

                    <div class='panel-container'>
                        <?php $single_post_args=array( 'numberposts'=> 999, 'post_type' => 'audiences', 'taxonomy' => $term->taxonomy, 'term' => $term->slug, 'orderby' => 'menu_order', 'order' => 'ASC', 'nopaging' => false ); $single_post = get_posts( $single_post_args ); foreach( $single_post as $post ): setup_postdata($post); get_template_part( 'content-audiences' ); wp_reset_postdata(); endforeach; ?>
                    </div>
                    <?php /* End post loop */ ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <!-- .container  -->
    </main>
    <!-- #main -->
</section>
<!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
