<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-regional
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="container">
      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title">
            <?php
              if ( is_category() ) :
                single_cat_title();

              elseif ( is_tag() ) :
                single_tag_title();

              elseif ( is_author() ) :
                printf( __( 'Author: %s', 'tm-regional' ), '<span class="vcard">' . get_the_author() . '</span>' );

              elseif ( is_day() ) :
                printf( __( 'Day: %s', 'tm-regional' ), '<span>' . get_the_date() . '</span>' );

              elseif ( is_month() ) :
                printf( __( 'Month: %s', 'tm-regional' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tm-regional' ) ) . '</span>' );

              elseif ( is_year() ) :
                printf( __( 'Year: %s', 'tm-regional' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tm-regional' ) ) . '</span>' );

              elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                _e( 'Asides', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                _e( 'Galleries', 'tm-regional');

              elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                _e( 'Images', 'tm-regional');

              elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                _e( 'Videos', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                _e( 'Quotes', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                _e( 'Links', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                _e( 'Statuses', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                _e( 'Audios', 'tm-regional' );

              elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                _e( 'Chats', 'tm-regional' );

              else :
                _e( 'Archives', 'tm-regional' );

              endif;
            ?>
          </h1>
          <?php
            // Show an optional term description.
            $term_description = term_description();
            if ( ! empty( $term_description ) ) :
              printf( '<div class="taxonomy-description">%s</div>', $term_description );
            endif;
          ?>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
          ?>

        <?php endwhile; ?>

        <?php regional_theme_paging_nav(); ?>

      <?php else : ?>

        <?php get_template_part( 'content', 'none' ); ?>

      <?php endif; ?>
      </div><!-- .tmr__wrapper  -->
    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
