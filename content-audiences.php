

<?php
/**
 * The template used for displaying table content in page-audiences.php
 *
 * @package tm-regional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php

if ( have_tables() ) { ?>

  <section class="container box-gradient cf">

<?php

$tablepress_options = json_decode(get_option('tablepress_tables'));

  foreach ( the_tables() as $table ):

    tablepress_print_table( 'id=' . get_tablepress_id ( $tablepress_options, $table ) . '&use_datatables=false&print_name=false' );

  endforeach;

}?>

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



