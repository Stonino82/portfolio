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
<div class="navigation">
    <?php wp_nav_menu( array( 
            'menu' => 'primary',
            'container_class' => 'menu-container',
            'link_class' => 'btn btn-tertiary'
        ) );
    ?>

    <a class="btn btn-primary" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
        <span class="btn-text">Email Me</span>
        <span class="btn-icon  btn-icon--right">
            <i class="fas fa-arrow-down rotate"></i>
        </span>
    </a>
</div>