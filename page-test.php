<?php
/**
 * Template Name: Test Page
 *
 * The template for displaying the About page.
 *
 * @package antoninolattene-child
 */
get_header(); ?>


<main style="grid-template-columns: 1fr;">

    <div class="content">
        <section
            style="margin: 0 auto; display: flex; flex-direction: column; height: max-content; gap: var(--size-950); padding-block: var(--size-800);">

            <div style="border: 1px solid black; padding: var(--size-400); display: flex; flex-direction: column; gap: var(--size-400);">
                <h3>Icon sizes — Material vs Phosphor</h3>

<?php
                $sizes = [
                    '--fs-400' => '14px',
                    '--fs-600' => '18px',
                    '--fs-800' => '23px',
                    '--fs-1000' => '32px',
                    '--fs-1200' => '40px',
                ];
                foreach ($sizes as $token => $label) : ?>
                    <div style="display: flex; align-items: center; gap: var(--size-400);">
                        <span style="width: 120px; font-size: var(--fs-300); color: var(--color-text-secondary);"><?php echo $token; ?> (<?php echo $label; ?>)</span>
                        <i class="material-symbols-rounded" style="font-size: var(<?php echo $token; ?>);">favorite</i>
                        <i class="ph ph-heart" style="font-size: var(<?php echo $token; ?>);"></i>
                        <span style="width: var(--size-500);"></span>
                        <i class="material-symbols-rounded" style="font-size: var(<?php echo $token; ?>);">star</i>
                        <i class="ph ph-star" style="font-size: var(<?php echo $token; ?>);"></i>
                        <span style="width: var(--size-500);"></span>
                        <i class="material-symbols-rounded" style="font-size: var(<?php echo $token; ?>);">search</i>
                        <i class="ph ph-magnifying-glass" style="font-size: var(<?php echo $token; ?>);"></i>
                        <span style="width: var(--size-500);"></span>
                        <i class="material-symbols-rounded" style="font-size: var(<?php echo $token; ?>);">settings</i>
                        <i class="ph ph-gear" style="font-size: var(<?php echo $token; ?>);"></i>
                    </div>
                <?php endforeach; ?>
            </div>

            <div
                style="border: 1px solid black; padding: var(--size-400); display: flex; flex-direction: column; gap: var(--size-500);">
                <h3>Material vs Phosphor Icons</h3>

                <!-- Titles -->
                <div style="display: flex; gap: var(--size-600); flex-wrap: wrap; align-items: flex-start;">
                    <div>
                        <h4 style="display: flex; align-items: center; gap: var(--size-100);">
                            <i class="material-symbols-rounded">person</i>
                            Heading Material
                        </h4>
                    </div>
                    <div>
                        <h4 style="display: flex; align-items: center; gap: var(--size-100);">
                            <i class="ph ph-user"></i>
                            Heading Phosphor
                        </h4>
                    </div>
                </div>

                <!-- Buttons -->
                <div style="display: flex; gap: var(--size-400); flex-wrap: wrap; align-items: center;">
                    <button class="btn btn-lg btn-primary" data-modal-target="test-icon-modal-md">
                        <i class="icon-leading material-symbols-rounded">rocket_launch</i>
                        Material
                    </button>
                    <button class="btn btn-lg btn-primary" data-modal-target="test-icon-modal-ph">
                        <i class="icon-leading ph ph-rocket-launch"></i>
                        Phosphor
                    </button>
                </div>

                <!-- Accordions -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--size-400);">
                    <?php get_template_part('template-parts/accordion', null, [
                        'items' => [
                            [
                                'title' => 'Accordion — Material',
                                'icon' => '<i class="material-symbols-rounded">rocket_launch</i>',
                                'content' => '<p>Contenido del accordion.</p>',
                                'is_open' => true,
                            ],
                        ],
                    ]); ?>
                    <?php get_template_part('template-parts/accordion', null, [
                        'items' => [
                            [
                                'title' => 'Accordion — Phosphor',
                                'icon' => '<i class="ph ph-rocket-launch"></i>',
                                'content' => '<p>Contenido del accordion.</p>',
                                'is_open' => true,
                            ],
                        ],
                    ]); ?>
                </div>

                <!-- Modals -->
                <?php get_template_part('template-parts/components/modal', null, [
                    'id' => 'test-icon-modal-md',
                    'title' => 'Modal — Material',
                    'caption' => 'Material Symbols icon',
                    'icon' => 'rocket_launch',
                    'content' => '<p>Modal con icono Material Symbols.</p>',
                ]); ?>
                <?php get_template_part('template-parts/components/modal', null, [
                    'id' => 'test-icon-modal-ph',
                    'title' => 'Modal — Phosphor',
                    'caption' => 'Phosphor icon',
                    'icon' => 'ph ph-rocket-launch',
                    'content' => '<p>Modal con icono Phosphor.</p>',
                ]); ?>

            </div>

            <div
                style="border: 1px solid black; padding: var(--size-400); display: flex; flex-direction: column; gap: var(--size-500);">
                <h3>Banners</h3>

                <h4>Primary</h4>
                <?php get_template_part('template-parts/banner', null, [
                    'type' => 'primary',
                    'title' => 'Banner Title',
                    'text' => 'Short banner description text.',
                    'title_icon_type' => 'md',
                    'title_icon_class' => 'rocket_launch',
                    'primary_cta_text' => 'Primary Action',
                    'primary_cta_url' => '#',
                    'primary_cta_classes' => 'btn btn-lg btn-secondary',
                    'primary_cta_icon_type' => 'md',
                    'primary_cta_icon_class' => 'arrow_forward',
                    'primary_cta_icon_position' => 'icon-trailing',
                    'secondary_cta_text' => 'Secondary Action',
                    'secondary_cta_url' => '#',
                    'secondary_cta_classes' => 'btn btn-lg btn-tertiary',
                    'secondary_cta_icon_type' => 'md',
                    'secondary_cta_icon_class' => 'open_in_new',
                    'secondary_cta_icon_position' => 'icon-trailing',
                ]); ?>

                <h4>Secondary</h4>
                <?php get_template_part('template-parts/banner', null, [
                    'type' => 'secondary',
                    'title' => 'Banner Title',
                    'text' => 'Short banner description text.',
                    'title_icon_type' => 'md',
                    'title_icon_class' => 'headphones',
                    'primary_cta_text' => 'Primary Action',
                    'primary_cta_url' => '#',
                    'primary_cta_classes' => 'btn btn-lg btn-primary',
                    'primary_cta_icon_type' => 'md',
                    'primary_cta_icon_class' => 'arrow_forward',
                    'primary_cta_icon_position' => 'icon-trailing',
                    'secondary_cta_text' => 'Secondary Action',
                    'secondary_cta_url' => '#',
                    'secondary_cta_classes' => 'btn btn-lg btn-tertiary',
                    'secondary_cta_icon_type' => 'md',
                    'secondary_cta_icon_class' => 'open_in_new',
                    'secondary_cta_icon_position' => 'icon-trailing',
                ]); ?>

            </div>


            <div style="border: 1px solid black; padding: var(--size-400); width: 100%;">
                <h3>Buttons — Phosphor Icons</h3>

                <!-- Size preview: 3 sizes, primary, trailing icon -->
                <div style="display: flex; flex-direction: column; gap: var(--size-100); margin-bottom: var(--size-600);">
                    <h4>Sizes preview (primary + icon trailing)</h4>
                    <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                        <a class="btn btn-sm btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Small <i class="icon-trailing ph ph-star"></i>
                        </a>
                        <a class="btn btn-md btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium <i class="icon-trailing ph ph-star"></i>
                        </a>
                        <a class="btn btn-lg btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Large <i class="icon-trailing ph ph-star"></i>
                        </a>
                    </div>
                </div>

                <div
                    style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: var(--size-600); width: 100%; margin-bottom: 5rem;">
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-lg btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                        </a>
                        <a class="btn btn-lg btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                        </a>
                        <a class="btn btn-lg btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                        </a>
                        <a class="btn btn-lg btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-lg btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Large
                        </a>
                        <a class="btn btn-lg btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Large
                        </a>
                        <a class="btn btn-lg btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Large
                        </a>
                        <a class="btn btn-lg btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Large
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-lg btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Large
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-lg btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-lg btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                    </div>
                </div>
                <div
                    style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: var(--size-600); width: 100%; margin-bottom: 5rem;">
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-md btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                        </a>
                        <a class="btn btn-md btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                        </a>
                        <a class="btn btn-md btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                        </a>
                        <a class="btn btn-md btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-md btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Medium
                        </a>
                        <a class="btn btn-md btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Medium
                        </a>
                        <a class="btn btn-md btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Medium
                        </a>
                        <a class="btn btn-md btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Medium
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-md btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Medium
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-md btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-md btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                    </div>
                </div>
                <div
                    style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: var(--size-600); width: 100%; margin-bottom: 5rem;">
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-sm btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                        </a>
                        <a class="btn btn-sm btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                        </a>
                        <a class="btn btn-sm btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                        </a>
                        <a class="btn btn-sm btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-sm btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Small
                        </a>
                        <a class="btn btn-sm btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Small
                        </a>
                        <a class="btn btn-sm btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Small
                        </a>
                        <a class="btn btn-sm btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-leading ph ph-user"></i>
                            Small
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-sm btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            Small
                            <i class="icon-trailing ph ph-user"></i>
                        </a>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: var(--size-400);">
                        <a class="btn btn-sm btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-secondary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-tertiary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                        <a class="btn btn-sm btn-full btn-primary" href="#" target="_blank" rel="noopener noreferrer">
                            <i class="icon-only ph ph-user"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div style="border: 1px solid black; padding: var(--size-100);">
                <h3>Chips</h3>
                <div style="display: flex; flex-direction: column; gap: var(--size-100);">

                    <!-- Size preview: 6 sizes, primary, trailing icon -->
                    <div style="display: flex; flex-direction: column; gap: var(--size-100);">
                        <h4>Sizes preview (primary + icon trailing)</h4>
                        <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                            <ul class="chip-list chip-list--xs">
                                <li class="chip chip--primary chip--semi-squared"><span>XS</span><i class="ph ph-star"></i></li>
                            </ul>
                            <ul class="chip-list chip-list--sm">
                                <li class="chip chip--primary chip--semi-squared"><span>SM</span><i class="ph ph-star"></i></li>
                            </ul>
                            <ul class="chip-list chip-list--md">
                                <li class="chip chip--primary chip--semi-squared"><span>MD</span><i class="ph ph-star"></i></li>
                            </ul>
                            <ul class="chip-list chip-list--lg">
                                <li class="chip chip--primary chip--semi-squared"><span>LG</span><i class="ph ph-star"></i></li>
                            </ul>
                        </div>
                    </div>

                    <!--//- Large Chips -->
                    <div style="display: flex; flex-direction: column; gap: var(--size-100);">
                        <h4>Chips — all colors (.chip-list--md)</h4>

                        <?php
                        $chip_colors = array(
                            'neutral' => 'Neutral',
                            'primary' => 'Primary',
                            'accent' => 'Accent',
                            'red' => 'Red',
                            'orange' => 'Orange',
                            'amber' => 'Amber',
                            'yellow' => 'Yellow',
                            'lime' => 'Lime',
                            'green' => 'Green',
                            'emerald' => 'Emerald',
                            'teal' => 'Teal',
                            'cyan' => 'Cyan',
                            'sky' => 'Sky',
                            'indigo' => 'Indigo',
                            'violet' => 'Violet',
                            'purple' => 'Purple',
                            'fuchsia' => 'Fuchsia',
                            'pink' => 'Pink',
                            'slate' => 'Slate',
                            'gray' => 'Gray',
                            'zinc' => 'Zinc',
                            'stone' => 'Stone',
                        );

                        foreach ($chip_colors as $slug => $name):
                            ?>
                            <p style="font-weight: bold; margin-top: 1rem;">
                                <?php echo $name; ?>
                            </p>

                            <!-- Light Version -->
                            <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 1rem;">
                                <ul class="chip-list chip-list--md">
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill">Pill</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                                <ul class="chip-list chip-list--md">
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared">Semi-SQ</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                                <ul class="chip-list chip-list--md">
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared">Squared</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                            </div>

                            <!-- Dark Version -->
                            <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 1rem;">
                                <ul class="chip-list chip-list--md dark">
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill">Pill</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--pill chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                                <ul class="chip-list chip-list--md dark">
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared">Semi-SQ</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--semi-squared chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                                <ul class="chip-list chip-list--md dark">
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared">Squared</li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared"><i
                                            class="ph ph-star"></i><span>Leading</span></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared"><span>Trailing</span><i
                                            class="ph ph-star"></i></li>
                                    <li class="chip chip--<?php echo $slug; ?> chip--squared chip--icon-only"><i
                                            class="ph ph-star"></i></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <?php get_footer(); ?>