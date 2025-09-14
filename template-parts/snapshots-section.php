<?php
/**
 * Template part for displaying the Snapshots section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AntoninoLattene
 */

$args = array(
    'post_type'      => 'snapshots',
    'posts_per_page' => -1, // Get all snapshots
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$snapshots_query = new WP_Query($args);
$snapshots_data = array();

if ($snapshots_query->have_posts()) {
    while ($snapshots_query->have_posts()) {
        $snapshots_query->the_post();
        $post_id = get_the_ID();
        $video_url = get_post_meta($post_id, '_featured_video_url', true);

        $snapshots_data[] = array(
            'id'        => $post_id,
            'title'     => get_the_title(),
            'content'   => apply_filters('the_content', get_the_content()),
            'image_url' => get_the_post_thumbnail_url($post_id, 'full'), // Full size for modal
            'video_url' => $video_url ? esc_url($video_url) : '',
        );
    }
}

wp_reset_postdata();

if (!empty($snapshots_data)) :
?>
<section id="snapshots" class="snapshots">
    <div class="section__header">
        <h5 class="section__title">Snapshot stories</h5>
        <div class="swiper-navigation">
            <div class="swiper-button-prev btn btn-sm btn-tertiary">
                <span class="icon-only material-symbols-rounded">chevron_left</span>
            </div>
            <div class="swiper-button-next btn btn-sm btn-tertiary">
                <span class="icon-only material-symbols-rounded">chevron_right</span>
            </div>
        </div>
    </div>
    <div class="swiper snapshots-carousel">
        <div class="swiper-wrapper">
            <?php foreach ($snapshots_data as $snapshot) : ?>
                <div class="swiper-slide" data-snapshot-id="<?php echo esc_attr($snapshot['id']); ?>">
                    <div class="snapshot-item">
                        <?php
                        $video_url = get_post_meta( $snapshot['id'], '_featured_video_url', true );

                        if ( $video_url ) : ?>
                            <video autoplay loop muted preload="metadata" class="wp-post-image">
                                <source src="<?php echo esc_url( $video_url ); ?>">
                                Your browser does not support the video tag.
                            </video>
                        <?php elseif ( has_post_thumbnail($snapshot['id']) ) : ?>
                            <?php echo get_the_post_thumbnail( $snapshot['id'], 'large' ); ?>
                        <?php endif; ?>
                        <div class="snapshot-item__title">
                            <h3 class="text-heading-6"><?php echo esc_html($snapshot['title']); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal for displaying the full snapshot story -->
    <div id="snapshot-modal" class="snapshot-modal">
        <div class="snapshot-modal__container">
            <button id="snapshot-modal-prev" class="snapshot-modal__nav-btn snapshot-modal__nav-btn--prev">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button id="snapshot-modal-next" class="snapshot-modal__nav-btn snapshot-modal__nav-btn--next">
                <span class="material-symbols-rounded">chevron_right</span>
            </button>
            <div class="snapshot-modal__content">
                <div class="snapshot-modal__progress-bars">
                    <!-- Progress bars will be generated here by JS -->
                </div>
                <div class="snapshot-modal__header">
                    <h3 class="snapshot-modal__title text-heading-6"></h3>
                </div>
                <div class="snapshot-modal__body">
                    <!-- Snapshot content will be loaded here by JS -->
                </div>
            </div>
            <button id="snapshot-modal-close" class="snapshot-modal__close-btn">
                <span class="material-symbols-rounded">close</span>
            </button>
        </div>
    </div>

    <!-- Data for JavaScript -->
    <script id="snapshots-data" type="application/json">
        <?php echo json_encode($snapshots_data); ?>
    </script>
</section>
<?php
endif;
?>