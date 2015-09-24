<?php
/**
 * The template used for displaying table content in page--titlesphp
 *
 * @package tm-regional
 */
?>
<div id="<?php the_slug() ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="title-stats cf">
    <div class="titles-container">
       <div class="row">
          <div class="col-sm-4 white">
            <div class="title-item">
              <h3><?php the_title(); ?></h3>
             <p><?php the_content(); ?></p>
              
          <?php 
            if( has_circulation() ) { ?>
              <h3>Circulation Figure </h3>
              <h2><?php the_circulation( 'figure' );?></h2>
          <?php } ?>

          <?php 
              if( has_average_readership() ) { ?>
                <h3>Average Issue Readership</h3>
                <h2><?php the_average_readership( 'figure' ); ?></h2>
          <?php } ?>

          </div>
          </div>
          <div class="col-sm-4 brand vertical-align">
             
          <div class="title-item dop">
              <?php if ( has_publications() ) {?>
                <h3>Day of Publication</h3>
                <h2><?php the_publications(); ?></h2>
            <?php } ?>
          </div>
        </div>

        <div class="col-sm-4 brand vertical-align">
          <div class="title-item front-page">
              <?php  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                 the_post_thumbnail();
              } ?>
            </div>
          </div>
          </div>
        
        
        <div class="row">
          <div class="col-md-4 white">
            <div class="title-item">
              <h3>Early results</h3>
                  <p>This title encourages additional early week trade for our advertisers, as well as providing our readers with the most up to date community news, breaking news and be first for weekend sport updates and reports.</p>
            </div>
          </div>
        
        <div class="col-md-4 white">
            <div class="title-item">
              <h3>The place to advertise</h3>
              <p>The Chronicle Xtra contains fantastic new advertising platforms and opportunities both in-paper and online. An advert booked in the The Chronicle Xtra combined with the Chester Chronicle Series would have 138,949 opportunities to be seen! <br>
              <small class="figure-source">Source: JICREG 1/04/2013. ABC July-Dec 2012.</small></p>
            </div>
          </div>
        <div class="col-md-4 white">
          <div class="title-item">
            <h3>Why advertise online?</h3>
              <p>Online advertising offers local businesses the chance to reach an additional audience to those that are reached through print. Advertising on local newspaper websites is 77% more likely to be believed and relied upon than advertising on other websites Advertising on local websites is nearly 2x more trustworthy and reliable than 'national' websites.<br>
               <small class="figure-source">Source: Newspaper Society, Wants ads III, 2007.</small></p>
            </div>
          </div>
        </div>

        <?php if( has_website_name() ) {  ?>
          <div class="row titles-margin">
            <div class="col-md-4 brand">
              <div class="title-item">
                <?php if( has_website_url() ) { ?>
                <a href="<?php the_website_url(); ?>" target="_blank"> 
                <h3><?php the_website_name(); ?></h3></a>
            </div><?php } ?> 
          </div>

          <div class="col-md-4 brand">
            <div class="title-item">
             <?php if( has_unique_users() ) {  ?>
                <h3>Monthly unique users</h3>
                <h2><?php the_unique_users( 'figure' ); ?></h2>
               <small class="figure-source"><?php the_unique_users( 'source' );?></small>
            <?php } ?>
           </div>
        </div>

          <div class="col-md-4 brand">
            <div class="title-item">
              <?php if( has_page_views() ) {  ?>
               <h3>Monthly unique users</h3>
                <h2><?php the_page_views( 'figure' ); ?></h2>
                <small class="figure-source"><?php the_page_views( 'source' ); ?></small>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php } ?>

          <div class="row">
            <div class="col-sm-4 brand">
             <div class="title-item">
               <?php if( has_website_name() ) {  ?>
              <h3>Readership profile - Print and Online</h3>
              <p>Increase your reach - By booking your advert in both print and online.</p>
            <div class="graph-key">
                <ul>
                  <li><span class="graph-key-icon"></span><span class="graph-key-text paper-title"><?php the_title(); ?></span></li>
                  <li><span class="graph-key-icon-online"></span><span class="graph-key-text paper-title"><?php the_website_name(); ?></span></li>
              </ul>
                </div>
              
            <?php  } else { ?>
              <h3>Readership profile - Print</h3>
              <p>Increase your reach - By booking an advert in our print title.</p>
            <div class="graph-key">
                <ul>
                  <li><span class="graph-key-icon"></span><span class="graph-key-text paper-title"><?php the_title(); ?></span></li>
              </ul>
                </div>
          <?php   } ?>
          </div>

          </div>
          <div class="col-sm-8 white">
           <?php if ( has_visualizer() ) {
              the_visualizer();
            } ?>
        </div>
        </div>
    </div>
  </section><!-- .container -->
</article><!-- #post-## -->
</div>
