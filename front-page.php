<?php get_header(); ?>

    <main class="container">
        <section class="presentation opacityOnScroll">
            <div class="presentation__header">
                <?php get_template_part( 'template-parts/logo' ); ?>
            </div>

            <div class="presentation__central">
                <div class="presentation__description">
                    <h1 class="text-md-body-1 fw-regular">Hey 👋🏻 I'm Tony, <strong>Product Designer, User Experience (UX) & User Interface (UI) Designer</strong>, based in Barcelona.<br> With an emphasis in <strong>👨🏻‍🎨 Visual Design</strong> and a background in <strong>🧑🏻‍💻 Front-end Development</strong>, I transform user needs into solutions that drive results 🎯</h1>
                </div>
                <div class="presentation__headlines">
                    <h2 class="text-heading-1 text-gradient margin-block-100">I build stunning UIs that resonate on a human level</h2>
                </div>
                <div class="presentation__availability">
                    <a class="btn btn-secondary" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
                        <span class="shine"></span>
                        <span class="availability btn-icon--left"></span>
                        <span class="btn-text">available from August 26th</span>
                    </a>
                </div>
            </div>

            <div class="presentation__links">
                <?php get_template_part( 'template-parts/presentation-links' ); ?>
            </div>
        </section>

        <div class="right-side">

            <section class="showcase">
                <!-- ACF -->
                <?php if( have_rows('projects') ): ?>
                    <?php while( have_rows('projects') ): the_row();
                        $full_project = get_sub_field('full_project');
                    ?>
                        <?php if( get_row_layout() == 'full_project' ): ?>
                            <?php while( have_rows('full_project') ): the_row();
                                // vars
                                $number = get_sub_field('number');
                                $image = get_sub_field('image');
                                $video = get_sub_field('video');
                                $class_image = get_sub_field('class_image');
                                $background_color = get_sub_field('background_color');
                                $name = get_sub_field('name');
                                $link_project_page = get_sub_field('link_project_page');
                                $company = get_sub_field('company');
                                $link_dribbble = get_sub_field('link_dribbble');
                                $link_behance = get_sub_field('link_behance');
                                $link_github = get_sub_field('link_github');
                                $link_codepen = get_sub_field('link_codepen');
                                $category = get_sub_field('category');
                                $sub_category = get_sub_field('sub-category');
                                $kit_icons = get_sub_field('kit_icons');
                                $post_type = get_sub_field('post_type');
                            ?>
                            <article class="project-full">
                                
                                    <?php if( $link_project_page ): 
                                        $link_url = $link_project_page['url'];
                                        $link_title = $link_project_page['title'];
                                        $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';    
                                    ?>
                                        <div class="project__image" style="background-color:<?php echo $background_color; ?>;">
                                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                                <?php if( $image ): ?>
                                                    <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                                <?php elseif( $video ): ?>
                                                    <video muted autoplay loop playsinline src="<?php echo esc_url($video['url']); ?>" class="project__video <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>"></video>
                                                <?php endif; ?>
                                            </a>
                                            <?php
                                                if( $kit_icons ): ?>
                                                <ul class="project__kit">
                                                <?php foreach( $kit_icons as $kit_icon ): ?>
                                                    <li class="project__kit--item"><?php echo $kit_icon; ?></li>
                                                <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="project__section">
                                        <?php if( $post_type == 'Portfolio' ): ?>
                                            <div class="chip-list">
                                                <span class="chip chip__portfolio--section"><i class="fa-solid fa-folder-open"></i><?php echo $post_type; ?></span>
                                                <span class="chip chip__portfolio--category"><i class="fa-solid fa-bars"></i><?php echo esc_html( $category ); ?></span>
                                                <span class="chip chip__portfolio--sub-category"><i class="fa-solid fa-bars-staggered"></i><?php echo esc_html( $sub_category ); ?></span>
                                            </div>
                                        <?php elseif( $post_type == 'Blog' ): ?>
                                            <div class="chip-list">
                                                <span class="chip chip__blog--section"><i class="fa-solid fa-feather-pointed"></i><?php echo $post_type; ?></span>
                                                <span class="chip chip__blog--category"><i class="fa-solid fa-bars"></i><?php echo esc_html( $category ); ?></span>
                                                <span class="chip chip__blog--sub-category"><i class="fa-solid fa-bars-staggered"></i><?php echo esc_html( $sub_category ); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="project__caption margin-block-400 ">
                                        <?php if( $post_type == 'Portfolio' ): ?>
                                            <?php if( $link_project_page ):
                                                $link_url = $link_project_page['url'];
                                                $link_title = $link_project_page['title'];
                                                $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';    
                                            ?>
                                                <!-- <p class="text-heading-5"><?php echo $number; ?></p> <small class="margin-inline-200"><?php echo $company; ?></small> -->
                                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                                    <h3 class="project__title text-heading-5 tc-primary"><?php echo $name; ?></h3>
                                                </a>
                                            <?php else : ?>
                                                <!-- <p class="text-heading-5"><?php echo $number; ?></p><small class="margin-inline-200"><?php echo $company; ?></small>  -->
                                                <h3 class="project__title text-heading-5 tc-primary"><?php echo $name; ?></h3>
                                            <?php endif; ?>
                                        <?php elseif( $post_type == 'Blog' ): ?>
                                            <?php if( $link_project_page ):
                                                $link_url = $link_project_page['url'];
                                                $link_title = $link_project_page['title'];
                                                $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';    
                                            ?>
                                                <!-- <p class="text-heading-5"><?php echo $number; ?></p> <small class="margin-inline-200"><?php echo $company; ?></small> -->
                                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                                    <h3 class="project__title text-heading-5 tc-accent"><?php echo $name; ?></h3>
                                                </a>
                                            <?php else : ?>
                                                <!-- <p class="text-heading-5"><?php echo $number; ?></p><small class="margin-inline-200"><?php echo $company; ?></small>  -->
                                                <h3 class="project__title text-heading-5 tc-accent"><?php echo $name; ?></h3>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>


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
                                    </div> -->
                                    <!-- <ul class="project__tags">
                                        <?php 
                                        $tags = get_sub_field('tags');
                                        if( $tags ): ?>
                                            <?php foreach( $tags as $tag ): ?>
                                                <li class="chip chip--tags"><?php echo esc_html( $tag->name ); ?></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul> -->
                                    <!-- /project-tags -->
                                
                            </article>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /ACF -->
                
            </section> <!-- /Showcase -->

            <?php get_footer(); ?>
        </div>
    </main>