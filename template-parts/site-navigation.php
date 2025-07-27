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

        <hr class="separator" />
        
        <?php
        wp_nav_menu( array(
            'theme_location'    => '',
            'menu'              => 'primary',
            'menu_id'           => 'primary-menu',
            'container'         => false,
            'link_class'        => 'btn btn-md btn-tertiary'
        ) );
        ?>
        
        <hr class="separator" />
        
        <ul class="menu">
            <li>
                <a class="btn btn-md btn-tertiary" href="https://github.com/Stonino82" target="_blank">
                    <span class="btn-icon btn-icon--left"><i class="fab fa-github"></i></span>
                    <span class="btn-text">Github</span>
                    <i class="fas fa-arrow-down rotate"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-md btn-tertiary" href="<?php echo get_bloginfo('wpurl'); ?>/cv-resume-antonino-lattene-product-designer-ux-ui-designer/" target="_blank" rel="noopener noreferrer">
                    <span class="btn-icon btn-icon--left"><i class="far fa-file-pdf"></i></span>
                    <span class="btn-text">Resume</span>
                    <i class="fas fa-arrow-down"></i>
                </a>
            </li>
            <li>
                <a class="btn btn-md btn-tertiary" href="https://www.linkedin.com/in/antoninolattene/" target="_blank">
                    <span class="btn-icon btn-icon--left"><i class="fab fa-linkedin-in"></i></span>
                    <span class="btn-text">Linkedin</span>
                    <i class="fas fa-arrow-down rotate"></i>
                </a>
            </li>
        </ul>

        <hr class="separator" />

        <a class="btn btn-lg btn-full btn-primary" href="mailto:antoninolattene@gmail.com" target="_blank" rel="noopener noreferrer">
            <span class="shine-animation"></span>
            <span class="btn-icon btn-icon--left"><i class="fas fa-paper-plane"></i></span>
            <span class="btn-text">Get in touch</span>
        </a>
        
    </div>

    
</nav>