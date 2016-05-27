<?php
/**
 * The template for displaying Case Studies module.
 *
 * @package tm-regional
 */
?>
<?php if ( get_theme_mod( 'case-study-id' ) ) :   ?>
<section class="case-studies section" id="section3">

    <div class="container">
        <div class="row">
            <div class="studies-txt col-md-12">
                <?php echo testimonial_rotator( array( 'id' => get_theme_mod( 'case-study-id' )) ); ?>
            </div>
        </div>
    </div>

</section>
<?php endif; ?>
