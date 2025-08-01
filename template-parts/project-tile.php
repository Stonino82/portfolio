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
$chip_label        = ucfirst( $article_class ); // 'Portfolio' or 'Blog'
$chip_icon         = $is_portfolio ? 'fa-solid fa-folder-open' : 'fa-solid fa-feather-pointed';
?>

<article class="project-tile <?php echo esc_attr( $article_class ); ?>">
    <div class="project__image">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
        <div class="project__section">
            <ul class="chip-list chip-list--sm">
                <li>
                    <span class="chip chip--bold"><i class="<?php echo esc_attr( $chip_icon ); ?>"></i><?php echo esc_html( $chip_label ); ?></span>
                </li>
            </ul>
        </div>
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
            <h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
            <small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
        </div>
        <p class="project__description"><?php echo get_the_excerpt(); ?></p>
    </div>
</article>