<?php /** 
* The template for displaying Products Archive pages. *
* Learn more: http://codex.wordpress.org/Template_Hierarchy *
* @package regional-theme */ 
get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="page-hero"></div>
        <div class="container">

            <?php $the_slug='products' ; $args=array( 'name'=> $the_slug, 'post_type' => 'page', 'post_status' => 'publish', 'numberposts' => 1 ); $my_posts = get_posts($args); ?>
            <div id="background-color">
                <?php if( $my_posts ) { echo '<h1>' . $my_posts[0]->post_title . '</h1>'; echo $my_posts[0]->post_content; ?>
            </div>
            <!-- #background-color -->
        </div>
        <!-- .tmr__wrapper  -->

        <?php } ?>

        <?php $taxonomy_type='mediums' ; $posts=g et_categories( 'taxonomy=' . $taxonomy_type . '&type=products'); $terms=g et_terms($taxonomy_type, array()); ?>

        <?php /* Start the Loop for regions */ ?>

        <?php foreach( $terms as $term ): ?>

        <div class="divider grey-light"></div>
        <div id="titles-main" class="grey-light cf">
            <div class="container">
                <section>
                    <h2><?php echo $term->name; ?></h2>

                    <?php /* Start the Loop for posts within regions */ ?>
                    <?php $post_array=g et_posts(array( 'post_type'=> 'products', 'taxonomy' => $term->taxonomy, 'term' => $term->slug, 'orderby' => 'menu_order', 'order' => 'ASC', 'nopaging' => true )); ?>

                    <div class="tab_expand tabicon ms_hidden ls_hidden">
                        <div class="tabs-arrow-down"></div>
                        <div class="tabs-text">Please select a product</div>
                        <nav class="tabs-menu">
                            <ul>
                                <?php foreach( $post_array as $post ): ?>
                                <?php setup_postdata($post); ?>
                                <li>
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                                <?php wp_reset_postdata(); ?>
                                <?php endforeach;?>
                            </ul>
                        </nav>
                    </div>

                    <?php $single_post_args=a rray( 'numberposts'=> 1, 'post_type' => 'products', 'taxonomy' => $term->taxonomy, 'term' => $term->slug, 'orderby' => 'menu_order', 'order' => 'ASC', 'nopaging' => false ); $single_post = get_posts( $single_post_args ); //print_r( $single_post ); foreach( $single_post as $post ): setup_postdata($post); //print_r($single); get_template_part( 'content-products' ); endforeach; ?>

                    <?php wp_reset_postdata(); ?>

                </section>
            </div>
            <!-- .tmr__wrapper  -->
        </div>
        <!-- #titles-main -->
        <?php endforeach; ?>
    </main>
    <!-- #main -->
</section>
<!-- #primary -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>