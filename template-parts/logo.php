<?php
/**
 * The template for displaying the logo
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

?>

<div class="site-branding">
    <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) :
    ?>
        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home">
            <img class="logo__icon" src="<?php echo esc_url( $logo[0] ) ?>" alt="<?php echo get_bloginfo( 'name' ) ?>">
            <div class="logo__text">
                <span class="logo__logotype">tony.</span>
                <span class="logo__tagline">PRODUCT DESIGNER</span>
            </div>
        </a>
    <?php else : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home"><?php echo get_bloginfo('name') ?></a>
        </h1>
        <p class="site-description"><?php echo get_bloginfo('description') ?></p>
    <?php endif ?>
</div>
