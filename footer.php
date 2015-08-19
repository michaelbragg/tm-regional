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

  <div class="tm__footer"><img src="<?php echo get_template_directory_uri(); ?>/gui/trinity-logo-grey.png"/></div>
  <div class="copy-credit">Website created by Trinity Mirror Creative</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
;(function( $ ){
  $(document).ready(function() {

    randomHero.init( { parent: '.page-hero', path: '<?php echo get_template_directory_uri(); ?>/gui/hero/', images: ['hero_001.jpg', 'hero_002.jpg', 'hero_003.jpg', 'hero_004.jpg', 'hero_005.jpg', 'hero_007.jpg', 'hero_008.jpg', 'hero_009.jpg', 'hero_010.jpg'] });

  });
})( jQuery );
</script>


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



</body>
</html>
