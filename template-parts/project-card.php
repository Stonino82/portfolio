<?php
/**
 * Template part for displaying a project card.
 *
 * This template is now designed to work within a standard WordPress loop, fetching data using native functions.
 *
 * @package antoninolattene
 */
// Get data from the current post in the loop.
$post_type         = get_post_type();
$is_portfolio      = ( 'portfolio' === $post_type );
$category_taxonomy = $is_portfolio ? 'portfolio_category' : 'category';
// Use clear, distinct variables to avoid confusion and bugs.
$article_class     = $is_portfolio ? 'portfolio' : 'blog';
?>

<article class="project-card <?php echo esc_attr( $article_class ); ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="project__image">

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

			<?php /* get_template_part( 'template-parts/project-section' ); */ ?>
		</div>
		<div class="project__content">
			<?php
				// Use the breadcrumbs function to display the categories.
				antoninolattene_breadcrumbs( [
					'display_mode' => 'category_only',
					'taxonomy'     => $category_taxonomy,
					'is_linked'    => false, // Prevent nested links inside the card.
				] );
			?>
			<h3 class="project__title text-heading-5"><?php the_title(); ?></h3>
		</div>
    </a>
</article>
