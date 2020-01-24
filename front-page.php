<?php get_header(); ?>

    <div class="container">
        <section class="presentation opacityOnScroll">
            <h1 data-aos="fade-right" data-aos-duration="800" data-aos-once="true">Front-End<br />User Experience <br />& User Interface<br /> Designer</h1>
            <h2 data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" data-aos-once="true">Hey, I’m Tony. Originally from Italy,<br /> currently living in Barcelona.<br /> Mostly, in my head.</h2>

            <ul class="social-icons">
                <li data-aos="fade-right" data-aos-duration="400" data-aos-delay="800" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
                <li data-aos="fade-right" data-aos-duration="400" data-aos-delay="700" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-behance"></span></a></li>
                <li data-aos="fade-right" data-aos-duration="400" data-aos-delay="600" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-github"></span></a></li>
                <li data-aos="fade-right" data-aos-duration="400" data-aos-delay="500" data-aos-once="true"><a href="#" target="blank"><span class="icon fab fa-linkedin"></span></a></li>
            </ul>
            
            <a class="button" href="mailto:antoninolattene@gmail.com" role="button" target="_blank" rel="noopener noreferrer" data-aos="fade-right" data-aos-duration="400" data-aos-delay="800" data-aos-once="true">
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
                $number = get_sub_field('number');
                $image = get_sub_field('image');
                $class_image = get_sub_field('class_image');
                $background_color = get_sub_field('background_color');;
                $name = get_sub_field('name');
                $link_project_page = get_sub_field('link_project_page');
                $company = get_sub_field('company');
                $type = get_sub_field('type');
                $link_dribbble = get_sub_field('link_dribbble');
                $link_behance = get_sub_field('link_behance');
                $link_github = get_sub_field('link_github');
                $link_codepen = get_sub_field('link_codepen');
                $caption_color = get_sub_field('caption_color');
                $made_with = get_sub_field('made_with');
                
            ?>
                <?php if( $number ): ?>
                    <article class="<?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">
                        <div class="project">
                            <img src="<?php echo esc_url($image['url']); ?>" class="<?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <div class="project__caption--up" data-aos="fade-down" data-aos-duration="1000">
                                <p class="project__number"><?php echo $number; ?></p>
                                <?php if( $link_project_page ): ?>
                                <a href="<?php echo $link_project_page; ?>" target="_blank"><h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3></a>
                                <?php else : ?>
                                <h3 class="project__name"><?php echo $name; ?><span class="project__link <?php echo $icon_project_page; ?>"></span></h3>
                                <?php endif; ?> 
                                <p class="project__company"><?php echo $company; ?></p>
                                <p class="project__type"><?php echo $type; ?></p>
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
                                
                            <div class="project__caption--down" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="100">
                                <p class="project__kit"><?php echo $made_with; ?></p>
                                <?php
                                $kit_icons = get_sub_field('kit_icons');
                                if( $kit_icons ): ?>
                                <ul class="project__kit">
                                    <?php foreach( $kit_icons as $kit_icon ): ?>
                                        <li><?php echo $kit_icon; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>   

            <?php endwhile; ?>

            <?php endif; ?>

            <!-- /ACF -->

        </section>
    </div>

<?php get_footer(); ?>