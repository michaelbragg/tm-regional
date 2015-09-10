<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tm-regional
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
<div class="row">
  <div class="col-sm-5">
  <div class="tm__footer"><img src="<?php echo get_template_directory_uri(); ?>/gui/trinity-logo-grey.png"/></div>
  <div class="copy-credit">Website created by Trinity Mirror Creative</div>
</div>
<div class="col-sm-7">
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
  <div class="footer-menu">
         <nav >
              <?php
                    // Primary navigation menu.
                    wp_nav_menu( array(
                        'menu_class'     => 'footer-nav-menu',
                        'theme_location' => 'footer',
                        'items_wrap'     => '<ul id="%1$s" class="footer-nav-menu">%3$s</ul>'
                    ) );
              ?>
        </nav><!-- .main-navigation -->   
  </div>
    <?php endif; ?>
</div>
</div><!-- #page -->
</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


<?php if(is_page(home)){ ?>
<script type="text/javascript">
    var deleteLog = false;
    $(document).ready(function() {
        $('#pagepiling').pagepiling({
          menu: '#menu',
         anchors: ['intro', 'solutions', 'casestudies', 'process'],
          navigation: {
                'textColor': '#f2f2f2',
                'bulletsColor': '#ccc',
                'position': 'right',
                'tooltips': ['Intro', 'Simple Solutions', 'Case Studies']
            },
                afterRender: function(){
          //playing the video
         $('video').get(0).pause();
        },  

        onLeave: function (index, nextIndex, direction) {

         //reaching our last section? The one with our normal site?
        if (nextIndex == 4) {
            $('.scroll-arrow').hide();
             $('video').get(0).play();
            //fading out navigation bullets
        }else{
            $('.scroll-arrow').show();
            $('video').get(0).pause();
        }

      }

      });
      });
    </script>



    <?php } ?>

      <script type="text/javascript">
    $(document).ready( function() {
      $('.tab-container').easytabs();
    });
  </script>



</body>
</html>
