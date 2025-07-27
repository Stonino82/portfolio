<?php
/**
 * Reusable template part for displaying the availability indicator dot.
 * Fetches status from the WordPress Customizer to apply a dynamic color class.
 *
 * @package antoninolattene
 */

// Get the current availability status from the Customizer.
$status = get_theme_mod( 'availability_status', 'limited' );
// Construct the dynamic CSS class for the indicator.
$indicator_class = 'availability-indicator--' . $status;
?>
<span class="availability-indicator <?php echo esc_attr( $indicator_class ); ?>"></span>