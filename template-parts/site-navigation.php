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

<?php get_template_part('template-parts/logo'); ?>

<div class="sub-menu">
    <button class="theme-switch btn-sm">
        <i class="theme-switch__icon material-symbols-rounded">light_mode</i>
        <i class="theme-switch__icon material-symbols-rounded">dark_mode</i>
        <span class="theme-switch__handle"></span>
    </button>
    <?php
    // Conditionally display the link based on the current page.
    if (is_page('about')):
        // If on the "About" page, show a link to "Home".
        ?>
        <a class="btn btn-sm btn-tertiary" href="<?php echo esc_url(home_url('/')); ?>">
            <i class="icon-leading ph ph-house"></i>
            Home
        </a>
    <?php else:
        // On all other pages, show a link to "About".
        ?>
        <a class="btn btn-sm btn-tertiary" href="<?php echo esc_url(home_url('/about/')); ?>">
            <i class="icon-leading ph ph-user"></i>
            About
        </a>
    <?php endif; ?>

    <a class="btn btn-sm btn-primary" href="https://www.linkedin.com/in/antoninolattene/" target="_blank">
        <span class="shine-animation"></span>
        <i class="icon-leading ph ph-linkedin-logo"></i>
        Let's connect
    </a>
</div>


<nav class="site-navigation">

    <div class="menu-container">

        <div class="menu-header">
            <div class="information">
                <?php get_template_part('template-parts/logotipo'); ?>
                <?php get_template_part('template-parts/availability-chip'); ?>
            </div>
            <button class="theme-switch btn-sm">
                <i class="theme-switch__icon material-symbols-rounded">light_mode</i>
                <i class="theme-switch__icon material-symbols-rounded">dark_mode</i>
                <span class="theme-switch__handle"></span>
            </button>
        </div>

        <hr />

        <?php
        wp_nav_menu(array(
            'theme_location' => '',
            'menu' => 'primary',
            'menu_id' => 'primary-menu',
            'container' => false,
            'link_class' => 'btn btn-lg btn-tertiary',
            'walker' => new Custom_Nav_Walker(),
        ));
        ?>

        <hr />

        <ul class="menu">
            <li class="menu-item-resume">
                <a class="btn btn-lg btn-tertiary" href="<?php echo esc_url(get_resume_url()); ?>" target="_blank">
                    <i class="icon-leading ph ph-file-text"></i>
                    Resume
                    <i class="icon-trailing ph ph-arrow-down"></i>
                </a>
            </li>
            <li class="menu-item-github">
                <a class="btn btn-lg btn-tertiary" href="https://github.com/Stonino82" target="_blank">
                    <i class="icon-leading ph ph-github-logo"></i>
                    Github
                    <i class="icon-trailing ph ph-arrow-down rotate"></i>
                </a>
            </li>
            <li class="menu-item-linkedin">
                <a class="btn btn-lg btn-full btn-primary" href="https://www.linkedin.com/in/antoninolattene/"
                    target="_blank">
                    <span class="shine-animation"></span>
                    <i class="icon-leading ph ph-linkedin-logo"></i>
                    Get in touch
                    <i class="icon-trailing ph ph-arrow-down rotate"></i>
                </a>
            </li>
        </ul>
    </div>

</nav>