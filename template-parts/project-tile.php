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
?>

<article class="project-tile <?php echo esc_attr( $article_class ); ?>">
    <div class="project__image">
        <?php $video_url = get_post_meta( get_the_ID(), '_featured_video_url', true );
        if ( $video_url ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <video autoplay loop muted preload="metadata" class="wp-post-image">
                    <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </a>
        <?php elseif ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
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