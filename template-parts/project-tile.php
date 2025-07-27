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
$is_portfolio = ($post_type === 'portfolio');

$category_taxonomy = $is_portfolio ? 'portfolio_category' : 'category';

?>

<article class="project-tile">
    <div class="post-thumbnail">
        <div class="project__section">
            <?php
            $chip_class = $is_portfolio ? 'chip--primary' : 'chip--accent';
            $chip_icon  = $is_portfolio ? 'fa-solid fa-folder-open' : 'fa-solid fa-feather-pointed';
            $chip_text  = $is_portfolio ? 'Portfolio' : 'Blog';
            ?>
            <ul class="chip-list chip-list--sm">
                <li>
                    <span class="chip chip--bold <?php echo esc_attr( $chip_class ); ?>"><i class="<?php echo esc_attr( $chip_icon ); ?>"></i><?php echo esc_html( $chip_text ); ?></span>
                </li>
            </ul>
        </div>
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="article__content">
        <div class="article__title">
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
        <div class="article__description">
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
</article>