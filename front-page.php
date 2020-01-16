<?php get_header(); ?>

    <div class="container">
        <section class="left opacityOnScroll">
            <h1>Front-End<br />User Experience <br />& User Interface<br /> Designer</h1>
            <h2>Hey, I’m Tony. Originally from Italy,<br /> currently living in Barcelona.<br /> Mostly, in my head.</h2>
            <ul class="social-icons">
                <li><a href="#" target="blank"><span class="icon dribbble"></a></li>
                <li><a href="#" target="blank"><span class="icon behance"></a></li>
                <li><a href="#" target="blank"><span class="icon github"></a></li>
                <li><a href="#" target="blank"><span class="icon linkedin"></a></li>
                <li><a href="#" target="blank"><span class="icon email"></a></li>
            </ul>
        </section>
        <section class="portfolio">

            <!-- 
            <article class="article-1 right__bgimage--full">
                <div class="image_description text_black">
                    <p class="project_number">.01</p>
                    <h3 class="project_name">Project Name</h3>
                    <p class="project_company_type">Company Name - Case Study</p>
                    <a class="project_link" href="#" target="blank"><span class="icon dribbble"></a>
                    <a class="project_link" href="#" target="blank"><span class="icon behance"></a>
                    <a class="project_link" href="#" target="blank"><span class="icon github"></a>
                </div>
            </article>
            <article class="article-2 right__bgimage--center">
                <div class="image_description text_white">
                    <p class="project_number">.02</p>
                    <h3 class="project_name">Project Name</h3>
                    <p class="project_company_type">Company Name - Case Study</p>
                    <a class="project_link" href="#" target="blank"><span class="icon dribbble"></a>
                    <a class="project_link" href="#" target="blank"><span class="icon github"></a>
                </div>
            </article>
            <article class="article-3 right__bgimage--center">
                <div class="image_description text_white">
                    <p class="project_number">.03</p>
                    <h3 class="project_name">Project Name</h3>
                    <p class="project_company_type">Company Name - Case Study</p>
                    <a class="project_link" href="#" target="blank"><span class="icon dribbble"></a>
                </div>
            </article>
            <article class="article-4 right__bgimage--center">
                <div class="image_description text_black">
                    <p class="project_number">.04</p>
                    <h3 class="project_name">Project Name</h3>
                    <p class="project_company_type">Company Name - Case Study</p>
                    <a class="project_link" href="#" target="blank"><span class="icon dribbble"></a>
                </div>
            </article>
             -->

            <!-- ACF -->

            <?php if( have_rows('projects') ): ?>

                <?php while( have_rows('projects') ): the_row(); 
                    // vars
                    $number = get_sub_field('number');
                    $image = get_sub_field('image');
                    $class_image = get_sub_field('class_image');
                    $background_color = get_sub_field('background_color');;
                    $name = get_sub_field('name');
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
                        <article class="<?php echo $class_image ?>" style="background-color:<?php echo $background_color; ?>; background-image: url(<?php echo $image; ?>);">
                            <div class="project__caption <?php echo $caption_color; ?>">
                                <p class="project_number"><?php echo $number; ?></p>
                                <h3 class="project_name"><?php echo $name; ?></h3>
                                <p class="project_company_type"><?php echo $company_type; ?></p>
                                <?php if( $link_dribbble ): ?>
                                <a href="<?php echo $link_dribbble; ?>" target="_blank"><span class="<?php echo $icon_dribbble; ?>"></span></a>
                                <?php endif; ?>
                                <?php if( $link_behance ): ?>
                                <a href="<?php echo $link_behance; ?>" target="_blank"><span class="<?php echo $icon_behance; ?>"></span></a>
                                <?php endif; ?>
                                <?php if( $link_github ): ?>
                                <a href="<?php echo $link_github; ?>" target="_blank"><span class="<?php echo $icon_github; ?>"></span></a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endif; ?>   

                <?php endwhile; ?>

            <?php endif; ?>
         
            <!-- /ACF -->

        </section>
    </div>

<?php get_footer(); ?>