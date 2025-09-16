<?php
/**
 * Template part for displaying post content in archive pages (home.php, archive.php, archive-portfolio.php).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

/**
 * CONTEXTO DE USO: Páginas de Archivo (Blog, Portfolio, etc.).
 * Este archivo funciona dentro del bucle estándar de WordPress. Su propósito es mostrar
 * un resumen de un post (ya sea de blog o de portfolio) obteniendo los datos directamente
 * de las taxonomías reales de WordPress (categorías y etiquetas).
 */
$post_type = get_post_type();
$is_portfolio      = ( 'portfolio' === $post_type );
$category_taxonomy = $is_portfolio ? 'portfolio_category' : 'category';
// Use clear, distinct variables, consistent with project-card.php.
$article_class     = $is_portfolio ? 'portfolio' : 'blog';

// Get the ID of the single latest post in the current query context.
// This assumes the main query is ordered by date descending.
// This is done to apply the "New" chip only to the most recent post.
$latest_post_id = 0;
$latest_posts = get_posts( array(
    'numberposts' => 1,
    'post_type'   => $post_type, // Ensure we're checking the same post type
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'fields'      => 'ids', // Only get post IDs for efficiency
) );

if ( ! empty( $latest_posts ) ) {
    $latest_post_id = $latest_posts[0];
}

$is_latest_post = ( get_the_ID() === $latest_post_id );
?>

<article class="project-tile <?php echo esc_attr( $article_class ); ?>">
    <div class="project__image">
        <?php $video_url = get_post_meta( get_the_ID(), '_featured_video_url', true );
        if ( $video_url ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php if ( $is_latest_post ) : ?>
                <ul class="project-tile__chip-list chip-list chip-list--sm dark">
                    <li class="chip chip--pill chip--green">New</li>
                </ul>
                <?php endif; ?>
                <video autoplay loop muted preload="metadata" class="wp-post-image">
                    <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </a>
        <?php elseif ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php if ( $is_latest_post ) : ?>
                <ul class="project-tile__chip-list chip-list chip-list--sm dark">
                    <li class="chip chip--pill chip--green">New</li>
                </ul>
                <?php endif; ?>
                <?php the_post_thumbnail( 'post-thumbnail' ); ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="project__content">
        <div class="project__header">
            <?php
                // Use the breadcrumbs function in 'category_only' mode.
                antoninolattene_breadcrumbs( [
                    'display_mode' => 'category_only',
                    'taxonomy'     => $category_taxonomy,
                ] );
            ?>
            <h3 class="project__title text-heading-6"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
        </div>
        <!-- <p class="project__description"><?php echo get_the_excerpt(); ?></p> -->
        <!-- <p class="project__description"><?php echo get_secondary_title(); ?></p> -->
        <div class="project__meta">
            <!-- <small><?php antoninolattene_posted_by();?></small> -->
            <small><?php antoninolattene_posted_on();?></small>
        </div>
    </div>
</article>