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

// Construct the modifier class for the chip based on the selected status.
$chip_modifier_class = 'availability-chip--' . $status;
?>

<span class="chip chip--bold chip--sm availability-chip <?php echo esc_attr( $chip_modifier_class ); ?>">
    <span><?php echo esc_html( $text ); ?></span>
</span>