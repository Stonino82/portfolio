<?php
/**
 * Template part for displaying an archive context label (e.g., "Category", "Tag").
 *
 * This component checks the current query to determine if it's a category,
 * sub-category, or tag archive page, and displays the appropriate label.
 * It is designed to be included in other templates like presentation-section.php.
 *
 * @package antoninolattene-child
 */

// --- Archive Context Label Logic ---
// Initialize an empty label.
$archive_label = '';

if ( is_category() || is_tax( 'portfolio_category' ) ) { // Check for standard or portfolio categories
	$queried_object = get_queried_object();
	// Differentiate between a main category and a sub-category by checking for a parent.
	if ( $queried_object && $queried_object->parent ) {
		$archive_label = __( 'Sub-Category', 'antoninolattene-child' );
	} else {
		$archive_label = __( 'Category', 'antoninolattene-child' );
	}
} elseif ( is_tag() || is_tax( 'portfolio_tag' ) ) { // Check for standard or portfolio tags
	$archive_label = __( 'Tag', 'antoninolattene-child' );
}

// --- Output ---
// Only render the HTML if a label has been set. This prevents empty <p> tags
// on pages where the label is not applicable (e.g., the front page).
if ( ! empty( $archive_label ) ) : ?>
	<h3 class="text-eyebrow-normal"><?php echo esc_html( $archive_label ); ?></h3>
<?php endif; ?>