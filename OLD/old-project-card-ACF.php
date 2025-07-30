<?php
    /**
     * Template part for displaying a project card from ACF.
     *
     * This template is called from the front-page.php repeater.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package antoninolattene
     */

    // ACF Fields from the parent
    $image = get_sub_field('image');
    $video = get_sub_field('video');
    $class_image = get_sub_field('class_image');
    $background_color = get_sub_field('background_color');
    $name = get_sub_field('name');
    $link_project_page = get_sub_field('link_project_page');
    $kit_icons = get_sub_field('kit_icons');
    $post_type = get_sub_field('post_type');
?>


    
<?php if( $link_project_page ): 
    $link_url = $link_project_page['url'];
    $link_title = $link_project_page['title'];
    $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';    
?>
<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
    <article class="project-card">
        <div class="project__image" style="background-color:<?php echo esc_attr($background_color); ?>;">
            <?php if( $image ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo esc_attr($class_image); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php elseif( $video ): ?>
                <video muted autoplay loop playsinline src="<?php echo esc_url($video['url']); ?>" class="project__video <?php echo esc_attr($class_image); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></video>
            <?php endif; ?>
            <div class="project__section">
                <?php
                $is_portfolio = ( 'Portfolio' === $post_type );
                $chip_class   = $is_portfolio ? 'chip--primary' : 'chip--accent';
                $chip_icon    = $is_portfolio ? 'fa-solid fa-folder-open' : 'fa-solid fa-feather-pointed';
                ?>
                <ul class="chip-list chip-list--sm">
                    <li>
                        <span class="chip chip--bold <?php echo esc_attr( $chip_class ); ?>"><i class="<?php echo esc_attr( $chip_icon ); ?>"></i><?php echo esc_html( $post_type ); ?></span>
                    </li>
                </ul>
            </div>
            <?php if( $kit_icons ): ?>
                <ul class="project__kit">
                <?php foreach( $kit_icons as $kit_icon ): ?>
                    <li class="project__kit--item"><?php echo $kit_icon; ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="project__content">
            <?php 
                // Use the new ACF-powered template part that mimics breadcrumb styling.
                get_template_part('template-parts/taxonomy-display-acf', null, [
                    'post_type'         => $post_type,
                    'category_name'     => get_sub_field('category'),
                    'sub_category_name' => get_sub_field('sub-category'),
                ]);
            ?>
            <?php if( $post_type == 'Portfolio' ): ?>
                <h3 class="project__title text-heading-5 tc-blue"><?php echo esc_html($name); ?></h3>
            <?php elseif( $post_type == 'Blog' ): ?>
                <h3 class="project__title text-heading-6 tc-accent"><?php echo esc_html($name); ?></h3>
            <?php endif; ?>
        </div>
    </article>
</a>
<?php endif; ?>























<!-- Los enlaces y tags están comentados, se mantienen así en la plantilla -->
<!-- <div class="project__links margin-inline-200">
    <?php if( $link_dribbble ): ?>
        <a href="<?php echo $link_dribbble; ?>" target="_blank"><span class="icon project__links--item fab fa-dribbble"></span></a>
    <?php endif; ?>
    <?php if( $link_behance ): ?>
        <a href="<?php echo $link_behance; ?>" target="_blank"><span class="icon project__links--item fab fa-behance"></span></a>
    <?php endif; ?>
    <?php if( $link_github ): ?>
        <a href="<?php echo $link_github; ?>" target="_blank"><span class="icon project__links--item fab fa-github"></span></a>
    <?php endif; ?>
    <?php if( $link_codepen ): ?>
        <a href="<?php echo $link_codepen; ?>" target="_blank"><span class="icon project__links--item fab fa-codepen"></span></a>
    <?php endif; ?>
</div>
<ul class="project__tags">
    <?php 
    $tags = get_sub_field('tags');
    if( $tags ): ?>
        <?php foreach( $tags as $tag ): ?>
            <li class="chip chip--tags"><?php echo esc_html( $tag->name ); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul> -->
<!-- /project-tags -->