<?php
/**
 * Template part for displaying a project section with a chip.
 * This component now contains its own logic to determine context.
 *
 * @package antoninolattene
 */

// Logic to determine the context (post type)
$post_type  = get_post_type();
$is_portfolio = ( 'portfolio' === $post_type );

// Define chip variables based on the context
$chip_label = $is_portfolio ? 'Portfolio' : 'Blog';
$chip_icon  = $is_portfolio ? 'fa-solid fa-folder-open' : 'fa-solid fa-feather-pointed';
?>
<div class="project__section">
    <ul class="chip-list chip-list--sm">
        <li>
            <span class="chip chip--bold"><i class="<?php echo esc_attr( $chip_icon ); ?>"></i><?php echo esc_html( $chip_label ); ?></span>
        </li>
    </ul>
</div>