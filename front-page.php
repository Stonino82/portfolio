<?php get_header(); ?>

    <div class="container">
        <section class="presentation opacityOnScroll">
            <h1>Front-End<br />User Experience <br />& User Interface<br /> Designer</h1>
            <h2>Hey, I’m Tony. Originally from Italy,<br /> currently living in Barcelona.<br /> Mostly, in my head.</h2>
            <ul class="social-icons">
                <li><a href="#" target="blank"><span class="icon fab fa-dribbble"></a></li>
                <li><a href="#" target="blank"><span class="icon fab fa-behance"></a></li>
                <li><a href="#" target="blank"><span class="icon fab fa-github"></a></li>
                <li><a href="#" target="blank"><span class="icon fab fa-linkedin"></a></li>
                <li><a href="#" target="blank"><span class="icon fas fa-envelope"></a></li>
            </ul>
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
                    $company_type = get_sub_field('company-type');
                    $link_dribbble = get_sub_field('link_dribbble');
                    $icon_dribbble = get_sub_field('icon_dribbble');
                    $link_behance = get_sub_field('link_behance');
                    $icon_behance = get_sub_field('icon_behance');
                    $link_github = get_sub_field('link_github');
                    $icon_github = get_sub_field('icon_github');
                    $caption_color = get_sub_field('caption_color');
                ?>
                    <?php if( $number ): ?>
                        <article class="<?php echo $class_image ?> <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>; background-image: url(<?php echo $image; ?>);">
                            <div class="project__caption">
                                <p class="project_number"><?php echo $number; ?></p>
                                <?php if( $link_project_page ): ?>
                                <a href="<?php echo $link_project_page; ?>" target="_blank"><h3 class="project_name"><?php echo $name; ?><span class="project_link <?php echo $icon_project_page; ?>"></span></h3></a>
                                <?php else : ?>
                                <h3 class="project_name"><?php echo $name; ?><span class="project_link <?php echo $icon_project_page; ?>"></span></h3>
                                <?php endif; ?> 
                                <p class="project_company_type"><?php echo $company_type; ?></p>
                                <div class="project__links">
                                    <?php if( $link_dribbble ): ?>
                                    <a href="<?php echo $link_dribbble; ?>" target="_blank"><span class="project_link <?php echo $icon_dribbble; ?>"></span></a>
                                    <?php endif; ?>
                                    <?php if( $link_behance ): ?>
                                    <a href="<?php echo $link_behance; ?>" target="_blank"><span class="project_link <?php echo $icon_behance; ?>"></span></a>
                                    <?php endif; ?>
                                    <?php if( $link_github ): ?>
                                    <a href="<?php echo $link_github; ?>" target="_blank"><span class="project_link <?php echo $icon_github; ?>"></span></a>
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