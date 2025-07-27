<?php
/**
 * Template part for displaying a project card.
 *
 * This template is now designed to work within a standard WordPress loop,
 * fetching data using native functions instead of ACF sub-fields.
 *
 * @package antoninolattene
 */
// Get data from the current post in the loop.
$post_type         = get_post_type();
$is_portfolio      = ( 'portfolio' === $post_type );
$category_taxonomy = $is_portfolio ? 'portfolio_category' : 'category';
$post_type_label   = $is_portfolio ? 'Portfolio' : 'Blog';
?>

<article class="project-card">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="project__image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'full' ); ?>
			<?php endif; ?>
			<div class="project__section">
				<?php
				$chip_class   = $is_portfolio ? 'chip--primary' : 'chip--accent';
				$chip_icon    = $is_portfolio ? 'fa-solid fa-folder-open' : 'fa-solid fa-feather-pointed';
				?>
				<ul class="chip-list chip-list--sm">
					<li>
						<span class="chip chip--bold <?php echo esc_attr( $chip_class ); ?>"><i class="<?php echo esc_attr( $chip_icon ); ?>"></i><?php echo esc_html( $post_type_label ); ?></span>
					</li>
				</ul>
			</div>
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
			<?php if ( $is_portfolio ) : ?>
				<h3 class="project__title text-heading-6 tc-primary"><?php the_title(); ?></h3>
			<?php else : ?>
				<h3 class="project__title text-heading-6 tc-accent"><?php the_title(); ?></h3>
			<?php endif; ?>
		</div>
    </a>
</article>