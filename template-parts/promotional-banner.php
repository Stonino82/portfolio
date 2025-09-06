<?php
/**
 * Template part for displaying a promotional banner.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

// --- ARGS ---
// Layout
$layout = isset($args['layout']) ? $args['layout'] : 'vertical';
$type = isset($args['type']) ? $args['type'] : 'secondary';

// Title
$title = isset($args['title']) ? $args['title'] : '';
$title_icon_type = isset($args['title_icon_type']) ? $args['title_icon_type'] : ''; // 'fa', 'md', or 'custom'
$title_icon_class = isset($args['title_icon_class']) ? $args['title_icon_class'] : ''; // for fa or md
$title_icon_path = isset($args['title_icon_path']) ? $args['title_icon_path'] : ''; // for custom, e.g. 'img/icon.svg'
$title_icon_position = isset($args['title_icon_position']) ? $args['title_icon_position'] : 'icon-leading';

// Content
$text = isset($args['text']) ? $args['text'] : '';

// Primary CTA
$primary_cta_text = isset($args['primary_cta_text']) ? $args['primary_cta_text'] : '';
$primary_cta_url = isset($args['primary_cta_url']) ? $args['primary_cta_url'] : '#';
$primary_cta_classes = isset($args['primary_cta_classes']) ? $args['primary_cta_classes'] : 'btn-sm btn-full btn-primary';
$primary_cta_icon_type = isset($args['primary_cta_icon_type']) ? $args['primary_cta_icon_type'] : ''; // 'fa', 'md', or 'custom'
$primary_cta_icon_class = isset($args['primary_cta_icon_class']) ? $args['primary_cta_icon_class'] : '';
$primary_cta_icon_path = isset($args['primary_cta_icon_path']) ? $args['primary_cta_icon_path'] : '';
$primary_cta_icon_position = isset($args['primary_cta_icon_position']) ? $args['primary_cta_icon_position'] : 'icon-leading';

// Secondary CTA
$secondary_cta_text = isset($args['secondary_cta_text']) ? $args['secondary_cta_text'] : '';
$secondary_cta_url = isset($args['secondary_cta_url']) ? $args['secondary_cta_url'] : '#';
$secondary_cta_classes = isset($args['secondary_cta_classes']) ? $args['secondary_cta_classes'] : 'btn-sm btn-full btn-tertiary';
$secondary_cta_icon_type = isset($args['secondary_cta_icon_type']) ? $args['secondary_cta_icon_type'] : ''; // 'fa', 'md', or 'custom'
$secondary_cta_icon_class = isset($args['secondary_cta_icon_class']) ? $args['secondary_cta_icon_class'] : '';
$secondary_cta_icon_path = isset($args['secondary_cta_icon_path']) ? $args['secondary_cta_icon_path'] : '';
$secondary_cta_icon_position = isset($args['secondary_cta_icon_position']) ? $args['secondary_cta_icon_position'] : 'icon-leading';


// --- VARS ---
// Base classes
$base_class = 'promotional-banner';
$layout_class = "{$base_class}--{$layout}";
$type_class = "{$base_class}--{$type}";

// Prepare Title Icon HTML and Classes
$title_classes = 'promotional-banner__title';
$icon_html = '';

if ($title_icon_type) {
    $common_icon_class = 'promotional-banner__title-icon';
    if ($title_icon_type === 'custom' && $title_icon_path) {
        // Use get_vite_asset to handle dev vs. prod paths
        $icon_html = '<img src="' . esc_url(get_vite_asset($title_icon_path)) . '" alt="" class="' . $common_icon_class . '">';
    } elseif ($title_icon_type === 'fa' && $title_icon_class) {
        $icon_html = '<i class="' . $common_icon_class . ' ' . esc_attr($title_icon_class) . '"></i>';
    } elseif ($title_icon_type === 'md' && $title_icon_class) {
        $icon_html = '<span class="' . $common_icon_class . ' material-symbols-rounded">' . esc_html($title_icon_class) . '</span>';
    }
}

?>

<div class="<?php echo esc_attr($base_class); ?> <?php echo esc_attr($layout_class); ?> <?php echo esc_attr($type_class); ?>">
    <div class="<?php echo esc_attr($base_class); ?>__content">
        <?php if ($title) : ?>
            <h4 class="<?php echo esc_attr($title_classes); ?>">
                <?php
                if ($icon_html) {
                    echo $icon_html; // WPCS: XSS ok.
                }
                echo '<span>' . esc_html($title) . '</span>';
                ?>
            </h4>
        <?php endif; ?>
        <?php if ($text) : ?>
            <p class="promotional-banner__text text-body-md"><?php echo wp_kses_post($text); ?></p>
        <?php endif; ?>
    </div>
    <?php if ($primary_cta_text || $secondary_cta_text) : ?>
        <div class="promotional-banner__actions">

            <!-- Secondary Action -->
            <?php if ($secondary_cta_text && $secondary_cta_url) : ?>
                <a href="<?php echo esc_url($secondary_cta_url); ?>" class="secondary-action btn <?php echo esc_attr($secondary_cta_classes); ?>" target="_blank">
                    <?php if ($secondary_cta_icon_class || $secondary_cta_icon_path) : ?>
                        <?php if ($secondary_cta_icon_position === 'icon-leading') : ?>
                            <?php if ($secondary_cta_icon_type === 'fa') : ?>
                                <i class="<?php echo esc_attr($secondary_cta_icon_class); ?>"></i>
                            <?php elseif ($secondary_cta_icon_type === 'md') : ?>
                                <span class="material-symbols-rounded"><?php echo esc_html($secondary_cta_icon_class); ?></span>
                            <?php elseif ($secondary_cta_icon_type === 'custom' && $secondary_cta_icon_path) : ?>
                                <img class="icon" src="<?php echo esc_url(get_vite_asset($secondary_cta_icon_path)); ?>" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo esc_html($secondary_cta_text); ?>
                    <?php if ($secondary_cta_icon_class || $secondary_cta_icon_path) : ?>
                        <?php if ($secondary_cta_icon_position === 'icon-trailing') : ?>
                            <?php if ($secondary_cta_icon_type === 'fa') : ?>
                                <i class="<?php echo esc_attr($secondary_cta_icon_class); ?>"></i>
                            <?php elseif ($secondary_cta_icon_type === 'md') : ?>
                                <span class="material-symbols-rounded"><?php echo esc_html($secondary_cta_icon_class); ?></span>
                            <?php elseif ($secondary_cta_icon_type === 'custom' && $secondary_cta_icon_path) : ?>
                                <img class="icon" src="<?php echo esc_url(get_vite_asset($secondary_cta_icon_path)); ?>" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <!-- Primary Action -->
            <?php if ($primary_cta_text && $primary_cta_url) : ?>
                <a href="<?php echo esc_url($primary_cta_url); ?>" class="primary-action btn <?php echo esc_attr($primary_cta_classes); ?>" target="_blank">
                    <?php if ($primary_cta_icon_class || $primary_cta_icon_path) : ?>
                        <?php if ($primary_cta_icon_position === 'icon-leading') : ?>
                            <?php if ($primary_cta_icon_type === 'fa') : ?>
                                <i class="<?php echo esc_attr($primary_cta_icon_class); ?>"></i>
                            <?php elseif ($primary_cta_icon_type === 'md') : ?>
                                <span class="material-symbols-rounded"><?php echo esc_html($primary_cta_icon_class); ?></span>
                            <?php elseif ($primary_cta_icon_type === 'custom' && $primary_cta_icon_path) : ?>
                                <img class="icon" src="<?php echo esc_url(get_vite_asset($primary_cta_icon_path)); ?>" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo esc_html($primary_cta_text); ?>
                    <?php if ($primary_cta_icon_class || $primary_cta_icon_path) : ?>
                        <?php if ($primary_cta_icon_position === 'icon-trailing') : ?>
                            <?php if ($primary_cta_icon_type === 'fa') : ?>
                                <i class="<?php echo esc_attr($primary_cta_icon_class); ?>"></i>
                            <?php elseif ($primary_cta_icon_type === 'md') : ?>
                                <span class="material-symbols-rounded"><?php echo esc_html($primary_cta_icon_class); ?></span>
                            <?php elseif ($primary_cta_icon_type === 'custom' && $primary_cta_icon_path) : ?>
                                <img class="icon" src="<?php echo esc_url(get_vite_asset($primary_cta_icon_path)); ?>" alt="">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        
        </div>
    <?php endif; ?>
</div>
