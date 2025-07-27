<?php
/**
 * Template part for displaying the site logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'site-logo' );

?>
<a class="logo btn-menu-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
    <?php if ( has_custom_logo() ) : ?>
        <img class="logo-image style-svg" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" width="64" height="64">
        <?php get_template_part( 'template-parts/availability-indicator' ); ?>
    <?php else : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home"><?php echo get_bloginfo('name') ?></a>
        </h1>
        <p class="site-description"><?php echo get_bloginfo('description') ?></p>
    <?php endif; ?>
</a>
