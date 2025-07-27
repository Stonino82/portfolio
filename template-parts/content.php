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
	get_template_part( 'template-parts/presentation-section', null, [
		'title'       => get_the_title(),
		'description' => get_secondary_title(),
	] );
?>

<section class="right-side">

	<section class="blog">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<header class="entry-header"></header><!-- .entry-header -->

			<div class="thumbnail">
				<div class="project__section">
					<ul class="chip-list chip-list--sm">
						<li>
							<span class="chip chip--bold chip--accent"><i class="fa-solid fa-feather-pointed"></i>Blog</span>
						</li>
					</ul>
				</div>
				<?php antoninolattene_post_thumbnail(); ?>
				<?php
				// Use the reusable template part for tags.
				get_template_part('template-parts/tags', null, ['tags' => get_the_tags(), 'chip_color_class' => 'chip--accent']);
				?>
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

	<?php get_footer(); ?>
</section>