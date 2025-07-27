<?php
/**
 * Template part for displaying category-like data from ACF fields using breadcrumb styling.
 *
 * This component mimics the HTML structure of the breadcrumbs component to ensure
 * visual consistency, but it's fed by ACF string data instead of WordPress taxonomies.
 *
 * @package antoninolattene
 *
 * @var array $args {
 *     @type string $post_type         The post type ('Portfolio' or 'Blog') to determine color.
 *     @type string $category_name     The name of the main category from ACF.
 *     @type string $sub_category_name The name of the sub-category from ACF.
 * }
 */

$post_type         = $args['post_type'] ?? '';
$category_name     = $args['category_name'] ?? '';
$sub_category_name = $args['sub_category_name'] ?? '';
$icon_map          = get_category_icon_map();
$category_slug     = sanitize_title( $category_name );

$container_class = ( 'Portfolio' === $post_type ) ? 'portfolio-breadcrumbs' : 'blog-breadcrumbs';
$category_icon   = isset( $icon_map[ $category_slug ] ) ? '<i class="breadcrumbs__icon ' . esc_attr( $icon_map[ $category_slug ] ) . '"></i> ' : '';

if ( ! empty( $category_name ) ) : ?>
	<ul class="breadcrumbs <?php echo esc_attr( $container_class ); ?>">
		<li class="breadcrumbs__item"><span class="breadcrumbs__link"><?php echo $category_icon . esc_html( $category_name ); ?></span></li>
		<?php if ( ! empty( $sub_category_name ) ) : ?>
			<li class="breadcrumbs__separator">/</li>
			<li class="breadcrumbs__item breadcrumbs__item--current"><?php echo esc_html( $sub_category_name ); ?></li>
		<?php endif; ?>
	</ul>
<?php endif; ?>