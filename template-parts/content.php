<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>

<?php
/**
 * This template is now unified to handle both 'post' and 'portfolio' types.
 * We determine the post type and set up variables for the dynamic parts.
 */
$post_type = get_post_type();
$is_portfolio = ( 'portfolio' === $post_type );

if ( $is_portfolio ) {
	$tags               = get_the_terms( get_the_ID(), 'portfolio_tag' );
} else { // Default to Blog Post.
	$tags               = get_the_tags();
}
?>

<?php
	get_template_part( 'template-parts/presentation-section', null, [
		'title'       => get_the_title(),
		'description' => get_secondary_title(),
	] );
?>

<div class="content">

	<section>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<header class="entry-header"></header><!-- .entry-header -->

			<?php
			// Determine the class for the .thumbnail based on whether it contains a video or an image.
			$video_url = get_post_meta( get_the_ID(), '_featured_video_url', true );
			$thumbnail_class = $video_url ? 'has-video' : ( has_post_thumbnail() ? 'has-image' : '' );
			?>
			<div class="thumbnail <?php echo esc_attr( $thumbnail_class ); ?>">
				<?php if ( $video_url ) : ?>
					<video autoplay loop muted preload="metadata" class="wp-post-image">
						<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				<?php elseif ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				<?php endif; ?>
				
				<?php get_template_part( 'template-parts/tags', null, [ 'tags' => $tags ] ); ?>
			</div>
			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'antoninolattene' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'antoninolattene' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<!-- <footer class="entry-footer">
				<?php antoninolattene_entry_footer(); ?>
			</footer> -->

		</article><!-- #post-<?php the_ID(); ?> -->
	</section><!-- /blog -->
</div>