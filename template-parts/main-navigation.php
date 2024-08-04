<?php
/**
 * The template for displaying the navigation
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

?>

<nav id="site-navigation" class="main-navigation">
    <a class="btn btn-primary" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
        <span class="shine"></span>
        <!-- <span class="btn-text">Email Me</span>
        <span class="btn-icon btn-icon--right">
            <i class="fas fa-arrow-down rotate"></i>
        </span> -->
        <span class="btn-icon">
            <i class="fas fa-paper-plane"></i>
        </span>
    </a>

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

        <button class="btn btn-tertiary btn-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

</nav>