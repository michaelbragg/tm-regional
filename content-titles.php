<?php
/**
 * The template used for displaying table content in page--titlesphp
 *
 * @package tm-regional
 */
?>
<div id="<?php the_slug() ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <h3 class="entry-title"><?php the_title(); ?></h3>
  </header><!-- .entry-header -->


  <section class="title-stats cf">

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
