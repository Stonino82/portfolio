<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="text-heading-1 text-gradient">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php
	$video_url = get_post_meta( get_the_ID(), '_featured_video_url', true );

	if ( $video_url ) : ?>
		<video autoplay loop muted preload="metadata" class="wp-post-image">
			<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'post-thumbnail' ); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'antoninolattene' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'antoninolattene' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
