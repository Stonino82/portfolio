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

<?php wp_nav_menu( array( 
        'menu' => 'primary',
        'container_class' => 'menu-container',
        'link_class' => 'btn text-btn'
    ) );
?>