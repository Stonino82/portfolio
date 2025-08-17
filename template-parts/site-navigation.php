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

<?php get_template_part( 'template-parts/logo' ); ?>

<nav class="site-navigation">

    <div class="menu-container">

        <div class="information">
            <?php get_template_part( 'template-parts/logotipo' ); ?>
            <?php
                // Display the availability status chip.
                get_template_part( 'template-parts/availability-chip' );
            ?>
        </div>
        
        <?php
        wp_nav_menu( array(
            'theme_location'    => '',
            'menu'              => 'primary',
            'menu_id'           => 'primary-menu',
            'container'         => false,
            'link_class'        => 'btn btn-sm btn-tertiary'
        ) );
        ?>
        
        <hr />
        
        <ul class="menu">
            <li class="menu-item-resume">
                <a class="btn btn-sm btn-tertiary" href="<?php echo get_bloginfo('wpurl'); ?>/cv-resume-antonino-lattene-product-designer-ux-ui-designer/" target="_blank" rel="noopener noreferrer">
                    Resume
                    <i class="fas fa-arrow-down"></i>
                </a>
            </li>
            <li class="menu-item-linkedin">
                <a class="btn btn-sm btn-tertiary" href="https://www.linkedin.com/in/antoninolattene/" target="_blank">
                    Linkedin
                    <i class="fas fa-arrow-down rotate"></i>
                </a>
            </li>
            <li class="menu-item-github">
                <a class="btn btn-sm btn-tertiary" href="https://github.com/Stonino82" target="_blank">
                    Github
                    <i class="fas fa-arrow-down rotate"></i>
                </a>
            </li>
            <li class="menu-item-mail">
                <a class="btn btn-md btn-full btn-primary" href="mailto:antoninolattene@gmail.com" target="_blank" rel="noopener noreferrer">
                    <span class="shine-animation"></span>
                    Get in touch
                </a>
            </li>
        </ul>        
    </div>

    
</nav>