<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tm-regional
 */

?><!DOCTYPE html>
<!--[if lte IE 9]>    <html class="no-js lte-ie9" <?php language_attributes(); ?>> <![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tm-regional' ); ?></a>

<?php /* Social Media Buttons */ ?>
<?php if( function_exists( 'has_social_media' ) ): ?>
<?php if( has_social_media() ): ?>
<nav class="social-menu">
    <input type="checkbox" href="#" class="social-menu-open" name="social-menu-open" id="social-menu-open" />
    <label class="social-menu-open-button" for="social-menu-open">
        <span class="fa fa-share-alt"></span>
<!--        <span class="social-hamburger social-hamburger-2"></span>
        <span class="social-hamburger social-hamburger-3"></span>-->
    </label>

    <?php if( has_social_media('email') ): ?><a href="mailto:<?php the_social_media('email'); ?>" target="_blank" class="social-menu-item"> <i class="fa fa-envelope"></i></a><?php endif; ?>
    <?php if( has_social_media('google') ): ?><a href="https://plus.google.com/<?php the_social_media('email'); ?>" target="_blank" class="social-menu-item"> <i class="fa fa-google-plus"></i></a><?php endif; ?>
    <?php if( has_social_media('facebook') ): ?><a href="https://www.facebook.com/<?php the_social_media('facebook'); ?>" target="_blank" class="social-menu-item"> <i class="fa fa-facebook"></i></a><?php endif; ?>
    <?php if( has_social_media('twitter') ): ?><a href="http://twitter.com/<?php the_social_media('twitter'); ?>" target="_blank" class="social-menu-item"> <i class="fa fa-twitter"></i></a><?php endif; ?>
    <?php if( has_social_media('linkedin') ): ?><a href="https://www.linkedin.com/company/<?php the_social_media('linkedin'); ?>" target="_blank" class="social-menu-item"> <i class="fa fa-linkedin"></i></a><?php endif; ?>
</nav>
<?php endif; ?>
<?php endif; ?>
    <section class="menu-panel">
          <!-- main menu container-->
          <article class="menu-bg">
            <div class="valign">
             <?php if ( has_nav_menu( 'primary' ) ) : ?>
               <nav >
                <?php
                    // Primary navigation menu.
                    wp_nav_menu( array(
                        'menu_class'     => 'main-nav-menu',
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul id="%1$s" class="main-nav-menu">%3$s</ul>'
                    ) );
                ?>
            </nav><!-- .main-navigation -->
        <?php endif; ?>
            </div>
          </article>
    </section>
<header id="masthead" role="banner">
    <div class="search-bar">
          <div class="container">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="text" class="input" name="s" value="SEARCH _____" onclick="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" autocomplete="off">
                    <input  type="submit" name="submit" value="" />
                </form>
        </div>
    </div>
    <div class="container">
            <div class="site-header">
                    <div class="site-branding">
                        <a href="<?php echo get_home_url(); ?>">
                            <div class="tm-branding">Trinity Mirror</div>
                            <div class="regional-title"><?php bloginfo('name'); ?></div>
                         </a>
                    </div>
                <!-- .site-branding -->
                <div class="search-icon"></div>

                <div class="main-nav">
	<div class="desktop-menu">
	 <?php if ( has_nav_menu( 'primary' ) ) : ?>
			   <nav >
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'desktop-nav-menu',
						'theme_location' => 'primary',
						'items_wrap'     => '<ul id="%1$s" class="desktop-nav-menu">%3$s</ul>'
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>
	</div>

			<div class="mobile-toggle black">
			    <span></span>
			    <span></span>
			    <span></span>
			</div>
		</div>
	</div>
</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">


