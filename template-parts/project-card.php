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

// Get the ID of the single latest post in the current query context.
// This assumes the main query is ordered by date descending.
// This is done to apply the "New" chip only to the most recent post.
$latest_post_id = 0;
$latest_posts = get_posts( array(
    'numberposts' => 1,
    'post_type'   => $post_type, // Ensure we're checking the same post type
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids', // Only get post IDs for efficiency
) );

if ( ! empty( $latest_posts ) ) {
    $latest_post_id = $latest_posts[0];
}

$is_latest_post = ( get_the_ID() === $latest_post_id );
?>

<article class="project-card <?php echo esc_attr( $article_class ); ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="project__image">
			<?php if ( $is_latest_post ) : ?>
			<ul class="project-card__chip-list chip-list chip-list--sm dark">
				<li class="chip chip--pill chip--green">New</li>
			</ul>
			<?php endif; ?>

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
