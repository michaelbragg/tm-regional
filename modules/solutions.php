<?php
/**
 * The template for displaying Solutions module.
 *
 * @package tm-regional
 */
?>
 <section class="solutions section js-height-full" id="section2">
    <ul>
        <?php if( get_theme_mod( 'fp2-pulse-1') ): ?><li>
            <button id="hotspotOne" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                 <div class="hotspot-info info-one">
                    <p><?php echo get_theme_mod( 'fp2-pulse-1' ); ?><p>
                </div>
            </button>
        </li><?php endif; ?>
        <?php if( get_theme_mod( 'fp2-pulse-2') ): ?><li>
            <button id="hotspotTwo" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                <div class="hotspot-info info-two">
                    <p><?php echo get_theme_mod( 'fp2-pulse-2' ); ?></p>
                </div>
            </button>
        </li><?php endif; ?>
        <?php if( get_theme_mod( 'fp2-pulse-3') ): ?><li>
            <button id="hotspotThree" class="hotspot desktop__visible pulse">
                 <div class='hotspot-icon'></div>
                <div class="hotspot-info info-three">
                    <p><?php echo get_theme_mod( 'fp2-pulse-3' ); ?></p>
                </div>
            </button>
        </li><?php endif; ?>
        <?php if( get_theme_mod( 'fp2-pulse-4') ): ?><li>
            <button id="hotspotFour" class="hotspot desktop__visible pulse">
                <div class='hotspot-icon'></div>
                <div class="hotspot-info info-four">
                    <p><?php echo get_theme_mod( 'fp2-pulse-3' ); ?></p>
                </div>
            </button>
        </li><?php endif; ?>
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
