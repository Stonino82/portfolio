<?php
/**
 * Template part for displaying previous/next post navigation using project-tile component.
 *
 * @package Antoninolattene
 */

// Get the previous and next post objects
$prev_post = get_previous_post();
$next_post = get_next_post();

// Only display the navigation section if there is at least one post to navigate to.
if ( ! empty( $prev_post ) || ! empty( $next_post ) ) :
?>
<div class="post-navigation-grid-container">
    <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'antoninolattene' ); ?></h2>
    <div class="post-navigation-grid">
        <?php
        // Previous Post Tile
        if ( ! empty( $prev_post ) ) {
            // Set up the global post data to the previous post.
            global $post;
            $post = $prev_post;
            setup_postdata( $post );

            echo '<div class="post-navigation-grid__item post-navigation-grid__item--prev">';
            echo '<h3 class="post-navigation-grid__label text-eyebrow-normal">' . esc_html__( 'Previous post', 'antoninolattene' ) . '</h3>';
            get_template_part( 'template-parts/project-tile', null, [ 'show_breadcrumbs' => true, 'show_meta' => true ] );
            echo '</div>';

            // Restore the original post data.
            wp_reset_postdata();
        } else {
            // Optional: show an empty placeholder if you want to maintain the grid structure
            echo '<div class="post-navigation-grid__item post-navigation-grid__item--empty"></div>';
        }

        // Next Post Tile
        if ( ! empty( $next_post ) ) {
            // Set up the global post data to the next post.
            global $post;
            $post = $next_post;
            setup_postdata( $post );

            echo '<div class="post-navigation-grid__item post-navigation-grid__item--next">';
            echo '<h3 class="post-navigation-grid__label text-eyebrow-normal">' . esc_html__( 'Next post', 'antoninolattene' ) . '</h3>';
            get_template_part( 'template-parts/project-tile', null, [ 'show_breadcrumbs' => true, 'show_meta' => true ] );
            echo '</div>';

            // Restore the original post data.
            wp_reset_postdata();
        } else {
            // Optional: show an empty placeholder
            echo '<div class="post-navigation-grid__item post-navigation-grid__item--empty"></div>';
        }
        ?>
    </div>
</div>
<?php
endif;
