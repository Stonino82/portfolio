<?php
/**
 * Accordion component
 *
 * @package Antoninolattene
 *
 * Expects to be called with get_template_part with the following arguments:
 * 'items' => (array) An array of accordion items, each with 'title', 'icon', 'content', and optional 'is_open'.
 */

if (isset($args['items']) && is_array($args['items'])) : ?>
    <div class="accordion">
        <?php foreach ($args['items'] as $item) : 
            $is_open = isset($item['is_open']) && $item['is_open'] === true;
            $active_class = $is_open ? 'active' : '';
            ?>
            <div class="accordion-item <?php echo esc_attr($active_class); ?>">
                <div class="accordion-header" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
                    <?php if (isset($item['icon']) && !empty($item['icon'])) : ?>
                        <span class="accordion-title-icon">
                            <?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG content is trusted. ?>
                        </span>
                    <?php endif; ?>

                    <h6 class="accordion-title text-eyebrow-normal"><?php echo esc_html($item['title']); ?></h6>

                    <span class="accordion-toggle-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/></svg>
                    </span>
                </div>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        <?php echo $item['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Content is trusted. ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
