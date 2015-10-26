<?php
/**
 * Testimonial Rotator: Loop Template
 */

?>

<div class="slide slide<?php echo $slide_count;?> testimonial_rotator_slide hreview itemreviewed item <?php echo $has_image; ?> cf-tr">

	<?php /* Post Thumbnail */ ?>
	<?php if( $has_image ): ?>
	<div class="testimonial_rotator_img img"><?php echo get_the_post_thumbnail( get_the_ID(), $img_size);?></div>
	<?php endif; ?>

	<?php /* Description */ ?>
	<div class="text testimonial_rotator_description">

		<h1 class="gamma testimonial_rotator_headline"><?php _e( 'Customer Testimonials', 'tm-regional' ); ?></h1>

		<?php /* Post Title */ ?>
		<?php if( $show_title ): ?>
			<h2 class="alpha testimonial_rotator_slide_title"><?php echo get_the_title(); ?></h2>
		<?php endif; ?>

		<?php /* Rating */ ?>
		<?php if( $rating ): ?>
		<div class="testimonial_rotator_stars cf-tr">
			<?php for( $r=1; $r <= $rating; $r++ ): ?>
				<span class="testimonial_rotator_star testimonial_rotator_star_<?php echo $r; ?>">
					<i class="fa <?php echo $testimonial_rotator_star; ?>"></i>
				</span>
			<?php endfor; ?>
		</div>
		<?php endif; ?>

		<?php /* Content */ ?>
		<div class="testimonial_rotator_quote">
		<?php echo ($show_size == "full") ? do_shortcode(nl2br(get_the_content(' '))) : get_the_excerpt(); ?>
		</div>

		<?php /* Author */ ?>
		<?php if( $cite ): ?>
			<div class="testimonial_rotator_author_info cf-tr">
			<?php echo wpautop($cite); ?>
			</div>
		<?php endif; ?>

	</div><!-- .testimonial_rotator_description -->

	<?php /* Microdata */ ?>
	<?php if( $show_microdata ): ?>
	<?php $global_rating = $global_rating + $rating; ?>
		<div class="testimonial_rotator_microdata">

		<?php if($itemreviewed): ?>
			<div class="fn"><?php echo $itemreviewed; ?></div>
		<?php endif;?>
		<?php if($rating): ?>
			<div class="rating"><?php echo $rating;?>.0</div>
		<?php endif; ?>

			<div class="dtreviewed"><?php echo get_the_date('c'); ?></div>
			<div class="reviewer">
				<div class="fn"><?php echo wpautop($cite); ?></div>
				<?php if ( has_post_thumbnail() ): ?>
					<?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array('class' => 'photo' )); ?>
				<?php endif; ?>
			</div>

			<div class="summary"><?php echo wp_trim_excerpt( get_the_excerpt() ); ?></div>
			<div class="permalink"><?php echo get_permalink(); ?></div>

		</div> <!-- .testimonial_rotator_microdata -->
	<?php endif; ?>

</div><!-- .slide -->
