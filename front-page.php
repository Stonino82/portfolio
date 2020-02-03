<?php get_header(); ?>

    <div class="container">
        <section class="presentation opacityOnScroll">
            <div class="presentation__central">
                <h1 data-aos="fade-right" data-aos-duration="800" data-aos-once="true">Front-End<br />User Experience <br />& User Interface<br /> Designer</h1>
                <h2 data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" data-aos-once="true">Hey, I’m Tony. Originally from Italy.<br /> Currently living in Barcelona.<br /> Mostly, in my head.</h2>

                <ul class="presentation__icons">
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="800" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="700" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-behance"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="600" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-github"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="500" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>
            <a class="button" href="mailto:antoninolattene@gmail.com" role="button" rel="noopener noreferrer" data-aos="fade-up" data-aos-duration="400" data-aos-delay="800" data-aos-once="true" data-aos-offset="0">
                <span>email me</span>
                <div class="icon">
                    <i class="fa fa-paper-plane"></i>
                    <i class="fa fa-check"></i>
                </div>
            </a>

        </section>
        <section class="portfolio">
        
            <!-- ACF -->

            <?php if( have_rows('projects') ): ?>
                <?php while( have_rows('projects') ): the_row(); 
                    // vars
                    $full_project = get_sub_field('full_project');
                    $half_project = get_sub_field('half_project');
                ?>

                    <?php if( get_row_layout() == 'full_project' ): ?>
                        <?php while( have_rows('full_project') ): the_row();
                            // vars
                            $number = get_sub_field('number');
                            $image = get_sub_field('image');
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
                        ?>
                        <article class="project-full <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">
                            <img src="<?php echo esc_url($image['url']); ?>" class="<?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <div class="project__caption--up">
                                <p class="project__number"><?php echo $number; ?></p>
                                <?php if( $link_project_page ): ?>
                                <a href="<?php echo $link_project_page; ?>" target="_blank"><h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3></a>
                                <?php else : ?>
                                <h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3>
                                <?php endif; ?> 
                                <p class="project__company"><?php echo $company; ?></p>
                                <div class="project__links">
                                    <?php if( $link_dribbble ): ?>
                                    <a href="<?php echo $link_dribbble; ?>" target="_blank"><span class="icon project__link fab fa-dribbble"></span></a>
                                    <?php endif; ?>
                                    <?php if( $link_behance ): ?>
                                    <a href="<?php echo $link_behance; ?>" target="_blank"><span class="icon project__link fab fa-behance"></span></a>
                                    <?php endif; ?>
                                    <?php if( $link_github ): ?>
                                    <a href="<?php echo $link_github; ?>" target="_blank"><span class="icon project__link fab fa-github"></span></a>
                                    <?php endif; ?>
                                    <?php if( $link_codepen ): ?>
                                    <a href="<?php echo $link_codepen; ?>" target="_blank"><span class="icon project__link fab fa-codepen"></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php 
                            $tags = get_sub_field('tags');
                            if( $tags ): ?>
                                <ul class="project__tags">
                                <?php foreach( $tags as $tag ): ?>
                                    <li class="project__tags--item"><?php echo esc_html( $tag->name ); ?></li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                             
                            <div class="project__caption--down">
                                <?php
                                $kit_icons = get_sub_field('kit_icons');
                                if( $kit_icons ): ?>
                                <ul class="project__kit">
                                    <?php foreach( $kit_icons as $kit_icon ): ?>
                                        <li class="project__kit--item"><?php echo $kit_icon; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </article>
                        <?php endwhile; ?>

                    <?php elseif( get_row_layout() == 'half_project' ): ?>
                        <div class="split-article">
                        <?php while( have_rows('half_project') ): the_row(); 
                            // vars
                            $number = get_sub_field('number');
                            $image = get_sub_field('image');
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
                        ?>
                            <article class="project-half <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">
                                <img src="<?php echo esc_url($image['url']); ?>" class="project-half__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <div class="project__caption--up">
                                    <p class="project__number"><?php echo $number; ?></p>
                                    <?php if( $link_project_page ): ?>
                                    <a href="<?php echo $link_project_page; ?>" target="_blank"><h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3></a>
                                    <?php else : ?>
                                    <h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3>
                                    <?php endif; ?>
                                    <p class="project__company"><?php echo $company; ?></p>
                                    <div class="project__links">
                                        <?php if( $link_dribbble ): ?>
                                        <a href="<?php echo $link_dribbble; ?>" target="_blank"><span class="icon project__link fab fa-dribbble"></span></a>
                                        <?php endif; ?>
                                        <?php if( $link_behance ): ?>
                                        <a href="<?php echo $link_behance; ?>" target="_blank"><span class="icon project__link fab fa-behance"></span></a>
                                        <?php endif; ?>
                                        <?php if( $link_github ): ?>
                                        <a href="<?php echo $link_github; ?>" target="_blank"><span class="icon project__link fab fa-github"></span></a>
                                        <?php endif; ?>
                                        <?php if( $link_codepen ): ?>
                                        <a href="<?php echo $link_codepen; ?>" target="_blank"><span class="icon project__link fab fa-codepen"></span></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php 
                                $tags = get_sub_field('tags');
                                if( $tags ): ?>
                                    <ul class="project__tags">
                                    <?php foreach( $tags as $tag ): ?>
                                        <li class="project__tags--item"><?php echo esc_html( $tag->name ); ?></li>
                                    <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <div class="project__caption--down">
                                    <?php
                                    $kit_icons = get_sub_field('kit_icons');
                                    if( $kit_icons ): ?>
                                    <ul class="project__kit">
                                        <?php foreach( $kit_icons as $kit_icon ): ?>
                                            <li class="project__kit--item"><?php echo $kit_icon; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        </div> <!-- split__article -->

                    <?php endif; ?>

                <?php endwhile; ?>

            <?php endif; ?>

            <!-- /ACF -->

        </section>
    </div>

<?php get_footer(); ?>