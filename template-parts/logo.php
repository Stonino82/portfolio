<?php
/**
 * Template part for displaying the site logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

// --- Process the main logo URL ---
$custom_logo_value = get_theme_mod( 'custom_logo' );
$logo_src = '';
if ( is_numeric( $custom_logo_value ) ) {
	// If it's an ID, get the URL.
	$logo_src = wp_get_attachment_url( $custom_logo_value );
} elseif ( filter_var( $custom_logo_value, FILTER_VALIDATE_URL ) ) {
	// If it's already a URL, use it directly.
	$logo_src = $custom_logo_value;
}

// --- Process the alternative logo URL ---
$alt_logo_value = get_theme_mod( 'alternative_logo' );
$alt_logo_src = '';
if ( is_numeric( $alt_logo_value ) ) {
	// If it's an ID, get the URL.
	$alt_logo_src = wp_get_attachment_url( $alt_logo_value );
} elseif ( filter_var( $alt_logo_value, FILTER_VALIDATE_URL ) ) {
	// If it's already a URL, use it directly.
	$alt_logo_src = $alt_logo_value;
}
?>
<a class="logo btn-menu-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
    <?php if ( has_custom_logo() ) : ?>
        <img
            class="logo-image style-svg"
            src="<?php echo esc_url( $logo_src ); ?>"
            alt="<?php echo get_bloginfo( 'name' ); ?>"
            width="64" height="64"
            <?php if ( ! empty( $logo_src ) && ! empty( $alt_logo_src ) ) : // Add data attributes only if BOTH logos exist. ?>
                data-orig-src="<?php echo esc_url( $logo_src ); ?>"
                data-alt-src="<?php echo esc_url( $alt_logo_src ); ?>"
            <?php endif; ?>
        >
        <?php get_template_part( 'template-parts/availability-indicator' ); ?>
    <?php else : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home"><?php echo get_bloginfo('name') ?></a>
        </h1>
        <p class="site-description"><?php echo get_bloginfo('description') ?></p>
    <?php endif; ?>
</a>
