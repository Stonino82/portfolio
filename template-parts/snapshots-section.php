<?php
/**
 * Template part for displaying a new Snapshots section with Swiper modal.
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
            <?php foreach ($snapshots_data as $index => $snapshot) : ?>
                <div class="swiper-slide" data-snapshot-id="<?php echo esc_attr($snapshot['id']); ?>" data-snapshot-index="<?php echo esc_attr($index); ?>">
                    <div class="snapshot-item">
                        <?php
                    if ( $snapshot['video_url'] ) : ?>
                        <video autoplay loop muted preload="metadata" class="wp-post-image">
                            <source src="<?php echo esc_url( $snapshot['video_url'] ); ?>">
                            Your browser does not support the video tag.
                        </video>
                    <?php elseif ( has_post_thumbnail($snapshot['id']) ) : ?>
                        <?php echo get_the_post_thumbnail( $snapshot['id'], 'large' ); ?>
                    <?php endif; ?>
                        <!-- <div class="snapshot-item__title">
                            <h3 class="text-heading-6"><?php echo esc_html($snapshot['title']); ?></h3>
                        </div> -->
                        <ul class="chip-list chip-list--sm dark">
                            <li class="chip chip--pill chip--green">New</li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Swiper Modal for displaying the full snapshot story -->
    <div id="snapshots-modal" class="snapshots-modal">
        <div class="snapshots-modal__container">
            <button id="snapshots-prev" class="snapshots-modal__nav-btn snapshots-modal__nav-btn--prev">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button id="snapshots-next" class="snapshots-modal__nav-btn snapshots-modal__nav-btn--next">
                <span class="material-symbols-rounded">chevron_right</span>
            </button>
            <div class="snapshots-modal__content">
                <div class="snapshots-modal__progress-bars">
                    <!-- Progress bars will be generated here by JS -->
                </div>
                <div class="snapshots-modal__header">
                    <h3 class="snapshots-modal__title text-heading-6"></h3>
                    <div class="snapshots-modal__header-actions">
                        <button id="snapshots-toggle-pause" class="snapshots-modal__pause-btn">
                            <span class="material-symbols-rounded">pause_circle</span>
                        </button>
                        <button id="snapshots-close" class="snapshots-modal__close-btn">
                            <span class="material-symbols-rounded">close</span>
                        </button>
                    </div>
                </div>
                <div class="snapshots-modal__body swiper-modal-body">
                    <div class="swiper-wrapper">
                        <?php foreach ($snapshots_data as $snapshot) : ?>
                            <div class="swiper-slide">
                                <?php if ($snapshot['video_url']) : ?>
                                    <video autoplay loop muted preload="metadata" class="wp-post-image">
                                        <source src="<?php echo esc_url($snapshot['video_url']); ?>">
                                        Your browser does not support the video tag.
                                    </video>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($snapshot['image_url']); ?>" alt="<?php echo esc_attr($snapshot['title']); ?>">
                                <?php endif; ?>
                                <div class="snapshot-content-wrapper">
                                    <?php echo $snapshot['content']; // Already escaped/sanitized by apply_filters('the_content') ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
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