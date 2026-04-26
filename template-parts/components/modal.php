<?php
/**
 * Global reusable modal component.
 *
 * Variables passed via $args:
 * @param string $id       Unique ID for the modal (required).
 * @param string $title    Title of the modal (optional).
 * @param string $content  HTML content of the modal (required).
 */

$modal_id = isset($args['id']) ? esc_attr($args['id']) : 'modal-' . uniqid();
$modal_title = isset($args['title']) ? wp_kses_post($args['title']) : ''; // Permitimos tags básicos como b o strong
$modal_caption = isset($args['caption']) ? wp_kses_post($args['caption']) : '';
$modal_logo = isset($args['logo']) ? esc_url($args['logo']) : '';
$modal_icon = isset($args['icon']) ? esc_attr($args['icon']) : '';
$modal_content = isset($args['content']) ? wp_kses_post($args['content']) : '';
$modal_footer = isset($args['footer']) ? wp_kses_post($args['footer']) : '';
$modal_agency_logo = isset($args['agency_logo']) ? esc_url($args['agency_logo']) : '';
$modal_agency_caption = isset($args['agency_caption']) ? wp_kses_post($args['agency_caption']) : '';

if (empty($modal_content)) {
    return;
}
?>

<div id="<?php echo $modal_id; ?>" class="modal" aria-hidden="true" role="dialog" aria-modal="true"
    aria-labelledby="<?php echo $modal_id; ?>-title">
    <div class="modal__overlay" data-modal-close></div>

    <div class="modal__content-wrapper">
        <div class="modal__header">
            <?php if (!empty($modal_title) || !empty($modal_caption) || !empty($modal_logo) || !empty($modal_icon)): ?>
                <div class="modal__header-content">
                    <?php if (!empty($modal_logo)): ?>
                        <img src="<?php echo $modal_logo; ?>" alt="Modal Logo" class="modal__logo">
                    <?php elseif (!empty($modal_icon)): ?>
                        <div class="modal__icon">
                            <span class="material-symbols-rounded text-gradient"><?php echo $modal_icon; ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="modal__title-group">
                        <?php if (!empty($modal_title)): ?>
                            <h4 id="<?php echo $modal_id; ?>-title" class="modal__title"><?php echo $modal_title; ?></h4>
                        <?php endif; ?>
                        <?php if (!empty($modal_caption)): ?>
                            <p class="text-caption text-secondary"><?php echo $modal_caption; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div></div>
            <?php endif; ?>
            <button type="button" class="modal__close-btn" data-modal-close aria-label="Close modal">
                <span class="material-symbols-rounded">close</span>
            </button>
        </div>

        <div class="modal__body">
            <?php echo $modal_content; ?>

            <?php if (!empty($modal_agency_logo) || !empty($modal_agency_caption)): ?>
                <div class="modal__agency">
                    <div class="modal__agency-content">
                        <?php if (!empty($modal_agency_logo)): ?>
                            <img src="<?php echo $modal_agency_logo; ?>" alt="Agency Logo" class="modal__agency-logo">
                        <?php endif; ?>
                        <?php if (!empty($modal_agency_caption)): ?>
                            <p class="text-caption text-secondary"><?php echo $modal_agency_caption; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($modal_footer)): ?>
            <div class="modal__footer">
                <?php echo $modal_footer; ?>
            </div>
        <?php endif; ?>
    </div>
</div>