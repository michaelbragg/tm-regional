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
              <h3>Chronicle Extra</h3>
             <p>The Chronicle Xtra (formerly Midweek Chronicle) is the first free local newspaper readers see each week, delivered direct to their homes every Monday.</p>
              <h3>Average Issue Readership</h3>
              <h2>52,089</h2>
              <h3>Average Issue Readership</h3>
              <h2>52,089</h2>
          </div>
          </div>
          <div class="col-sm-8 brand vertical-align">
             <div class="title-item dop">
          <h3>Day of Publication</h3>
              <h2>Monday to Saturday.</h2>
            </div>
               <div class="title-item front-page">
              <img src="http://localhost/tmnw/content/uploads/2015/08/ellesmereport.jpg">
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

<small>Source: JICREG 1/04/2013. ABC July-Dec 2012.</small></p>
          </div>
        </div>
        <div class="col-md-4 white">
          <div class="title-item">
<h3>Why advertise online?</h3>
              <p>Online advertising offers local businesses the chance to reach an additional audience to those that are reached through print. Advertising on local newspaper websites is 77% more likely to be believed and relied upon than advertising on other websites Advertising on local websites is nearly 2x more trustworthy and reliable than 'national' websites.<br>
 
<small>Source: Newspaper Society, Wants ads III, 2007.</small></p>
        </div>
      </div>
        </div>

        <div class="row titles-margin">
          <div class="col-md-4 brand">
            <div class="title-item">
<h3>Chesterchronicle.co.uk</h3>
<small>Source: Omniture July-Dec 2012, average UK monthly figures.</small>
          </div>
        </div>
          <div class="col-md-4 brand">
            <div class="title-item">
<h3>Monthly unique users</h3>
              <h2>85,776</h2>
          </div>
        </div>
          <div class="col-md-4 brand">
            <div class="title-item">
<h3>Monthly page views</h3>
              <h2>489,100</h2>

          </div>
        </div>
        </div>

          <div class="row">
           
          <div class="col-md-4 brand">
             <div class="title-item">
<h3>Readership profile - print and online</h3>
<p>Increase your reach - By booking your advert in both print and online, you can reach XXXXX local people!</p>
<div class="graph-key">
  <ul>
  <li><span class="graph-key-icon"></span><span class="graph-key-text paper-title">Chester Chronicle</span></li>
  <li><span class="graph-key-icon-online"></span><span class="graph-key-text paper-title">chesterchronicle.co.uk</span></li>
</ul>
</div>
              </div>
          </div>
          <div class="col-md-8 white">
            
<?php if ( have_visualizer() ) {
  the_visualizer();
} ?>     

</div>
          
          
        </div>
    </div>

<?php
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
}
?>

<?php

if ( have_custom_meta() ) { ?>

  <ul>

  <?php foreach ( the_custom_meta() as $meta ):?>

    <li>
      <h3 class="title-sub"><?php echo $meta['title']; ?></h3>
      <p><?php echo $meta['content']; ?></p>
    </li>

  <?php endforeach;?>
  </ul>

<?php }

/* Add graph to page */
if ( have_visualizer() ) {
  the_visualizer();
}

 ?>

  </section><!-- .container -->

  <footer class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list( __( ', ', 'tm-regional' ) );

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ', 'tm-regional' ) );


      printf(
        $meta_text,
        $category_list,
        $tag_list,
        get_permalink()
      );
    ?>

    <?php edit_post_link( __( 'Edit', 'tm-regional' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
</article><!-- #post-## -->
</div>
