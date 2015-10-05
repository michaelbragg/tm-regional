<?php
/**
 * The template for displaying Solutions module.
 *
 * @package tm-regional
 */
?>
 <section class="solutions section js-height-full" id="section2">
    <ul>
        <li>
            <button id="hotspotOne" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                 <div class="hotspot-info info-one">
                    <p>Over 40 local newspapers and more than 50 local websites
                        <p>
                </div>
            </button>
        </li>
        <li>
            <button id="hotspotTwo" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                <div class="hotspot-info info-two">
                    <p>1.8 Million Adults reached by our multimedia portfolio</p>
                </div>
            </button>
        </li>
        <li>
            <button id="hotspotThree" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                <div class="hotspot-info info-three">
                    <p>A range of lifestyle and major sporting publications</p>
                </div>
            </button>
        </li>
        <li>
            <button id="hotspotFour" class="hotspot desktop__visible pulse">
                <div class='hotspot-icon'></div>
                <div class="hotspot-info info-four">
                    <p>Outdoor advertising and leaflet services</p>
                </div>
            </button>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <article class="solutions-txt col-sm-6">
                <h1><?php echo get_theme_mod( 'fp2-title' ); ?></h1>
                <p><?php echo get_theme_mod( 'fp2-text' ); ?></p>
                <?php if( get_theme_mod( 'fp2-button-url') ): ?>
                <a class="btn btn-discover" href="<?php echo get_theme_mod( 'fp2-button-url'); ?>"><?php echo get_theme_mod( 'fp2-button-text' ); ?></a>
                <?php endif; ?>
            </article>
            <aside class="col-sm-6"></aside>
        </div>
    </div>
</section>
