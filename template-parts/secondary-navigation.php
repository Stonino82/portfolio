<?php
/**
 * The template for displaying the secondary navigation
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

?>

<nav id="site-secondary-navigation" class="secondary-navigation">

    <div class="menu-container">
        <?php
        wp_nav_menu( array(
            'theme_location'    => '',
            'menu'              => 'primary',
            'menu_id'           => 'primary-menu',
            'container'         => false,
            'link_class'        => 'btn btn-tertiary'
        ) );
        ?>
    </div>

</nav>