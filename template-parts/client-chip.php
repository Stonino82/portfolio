<?php
/**
 * Template part for displaying the client chip.
 *
 * This component fetches the client name and chip color from post meta
 * and displays it as a styled chip.
 *
 * @package antoninolattene
 */

$post_type = get_post_type();

// Only show for portfolio posts
if ('portfolio' !== $post_type) {
    return;
}

$client_name = get_post_meta(get_the_ID(), 'client_name', true);
$is_client_project = get_post_meta(get_the_ID(), 'is_client_project', true);
$display_name = (!empty($client_name) && strtolower($client_name) !== 'personal') ? $client_name : 'Personal Project';

$chip_color_class = $is_client_project ? 'dark chip--amber' : 'chip--primary';
?>

<ul class="project__client chip-list chip-list--xs">
    <li class="chip chip--semi-squared <?php echo esc_attr($chip_color_class); ?>">
        <?php echo esc_html($display_name); ?>
    </li>
</ul>