<?php
/**
 * Reusable component for displaying the availability status as a chip.
 * Fetches status and text from the WordPress Customizer.
 *
 * @package antoninolattene
 */

// Get values from the Customizer with fallback defaults.
$status = get_theme_mod( 'availability_status', 'limited' ); // e.g., 'limited'

// Get the array of all possible choices.
$choices = function_exists( 'antoninolattene_child_get_availability_choices' ) ? antoninolattene_child_get_availability_choices() : [];

// Find the display text (e.g., 'Limited Availability') corresponding to the saved status key.
$text = isset( $choices[ $status ] ) ? $choices[ $status ] : ucfirst( $status );

// Map status to the corresponding color class.
$color_class = '';
switch ( $status ) {
	case 'limited':
		$color_class = 'chip--orange';
		break;
	case 'available':
		$color_class = 'chip--green';
		break;
	case 'not-available':
		$color_class = 'chip--red';
		break;
}
?>

<ul class="chip-list chip-list--sm">
    <li class="chip chip--pill chip--sm dark <?php echo esc_attr( $color_class ); ?>">
        <span><?php echo esc_html( $text ); ?></span>
    </li>
</ul>