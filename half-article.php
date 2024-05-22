<?php while( have_rows('projects') ): the_row(); 
    $half_project = get_sub_field('half_project');
?>

<?php elseif( get_row_layout() == 'half_project' ): ?>
    <div class="split-article">
    <?php while( have_rows('half_project') ): the_row(); 

        $number = get_sub_field('number');
        $image = get_sub_field('image');
        $video = get_sub_field('video');
        $class_image = get_sub_field('class_image');
        $background_color = get_sub_field('background_color');;
        $name = get_sub_field('name');
        $link_project_page = get_sub_field('link_project_page');
        $company = get_sub_field('company');
        $link_dribbble = get_sub_field('link_dribbble');
        $link_behance = get_sub_field('link_behance');
        $link_github = get_sub_field('link_github');
        $link_codepen = get_sub_field('link_codepen');
        $caption_color = get_sub_field('caption_color');
        $post_type = get_sub_field('post_type');
    ?>
    <article class="project-half <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;">
        
        <?php if( $link_project_page ): 
        $link_url = $link_project_page['url'];
        $link_title = $link_project_page['title'];
        $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';
        ?>
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" class="project__link"></a>
        <?php endif; ?>
        
        <?php if( $image ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        <?php endif; ?>
        <?php if( $video ): ?>
        <video muted autoplay loop playsinline src="<?php echo esc_url($video['url']); ?>" class="project__video <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>"></video>
        <?php endif; ?>
        <div class="project__caption">
            <?php if( $name ): ?>
            <p class="text-md-body-1"><?php echo $number; ?>
            <div class="project__subtitle">
                <span class="chip"><?php echo $post_type; ?></span>
                <small class="margin-inline-200"><?php echo $company; ?></small>
            </div>
            <?php endif; ?>
        </div>
        <h3 class="text-heading-5 margin-block-500"><?php echo $name; ?></h3>
        <div class="project__links margin-inline-200">
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
            $category = get_sub_field('category');
            if( $category ): ?>
                    <li class="chip"><?php echo esc_html( $category ); ?></li>
            <?php endif; ?>
            <?php 
            $tags = get_sub_field('tags');
            if( $tags ): ?>
                <?php foreach( $tags as $tag ): ?>
                    <li class="chip chip--tags"><?php echo esc_html( $tag->name ); ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        
        <?php
            $kit_icons = get_sub_field('kit_icons');
            if( $kit_icons ): ?>
                <ul class="project__kit">
                <?php foreach( $kit_icons as $kit_icon ): ?>
                    <li class="project__kit--item"><?php echo $kit_icon; ?></li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>
    </article>
    <?php endwhile; ?>
    </div> 

<?php endif; ?>