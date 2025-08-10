<?php
/**
 * Reusable template part for displaying a list of tags as chips.
 *
 * This template is designed to be flexible and can display tags from WordPress.
 *
 * @package antoninolattene
 *
 * @var array $args {
 *     @type array  $tags             Array of WP_Term objects.
 *     @type string $chip_color_class The CSS modifier class for the chip color (e.g., 'chip--primary').
 * }
 */

$tags             = $args['tags'] ?? [];
$chip_color_class = $args['chip_color_class'] ?? 'chip--primary';

if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) : ?>
<div class="tags">
    <ul class="chip-list chip-list--md">
        <?php foreach ( $tags as $tag ) : ?>
            <li>
                <a class="chip chip--subtle <?php echo esc_attr( $chip_color_class ); ?>" href="<?php echo esc_url( get_term_link( $tag ) ); ?>">
                    <i class="fa-solid fa-hashtag"></i>
                    <?php echo esc_html( $tag->name ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>