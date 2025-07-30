<?php 
/**
 * The template for displaying archive pages.
 *
 * This template handles all archive types: blog categories, tags, dates,
 * as well as the main portfolio archive and its taxonomies.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene-child
 */

get_header();

// --- 1. Determine Context and Title/Description ---
$title       = '';
$description = '';

if ( is_post_type_archive( 'portfolio' ) ) {
	// We are on the main portfolio archive page (/portfolio).
	$title       = get_theme_mod( 'portfolio_archive_title' );
	$description = get_theme_mod( 'portfolio_archive_description' );
} else {
	// We are on any other archive page (blog category, portfolio category, tag, etc.).
	$title       = get_the_archive_title(); // Use the full title with prefix for context.
	$description = get_the_archive_description();
}
?>
<main class="container">
	<?php
		get_template_part( 'template-parts/presentation-section', null, [
			'title'       => $title,
			'description' => $description,
		] );
	?>

	<section class="right-side">
		<?php if ( have_posts() ) : ?>
			<section>
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/project-tile' );
				endwhile; ?>
			</section>
		<?php endif; ?>

		<?php get_footer(); ?>
	</section>
</main>
