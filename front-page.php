<?php get_header(); ?>

<main class="container">
    <section class="presentation padding-600 opacityOnScroll">
        <div class="presentation__central">
            <?php get_template_part( 'navigation' ); ?>
            <div class="presentation__headlines margin-block-900">
                <h1 class="fs-primary-heading fw-bold tt-up tc-neutral-700 margin-0">User Experience <br> User Interface Designer</h1>
                <!-- <h2 class="fs-secondary-heading fw-bold tt-up tc-neutral-700">& Front-end Developer</h2> -->
                <h2 class="fs-secondary-heading fw-regular tc-primary margin-block-500">Hey, I’m Tony! <strong>Barcelona</strong>-based <strong>UX/UI Designer</strong>, with an emphasis in <strong>Visual Design</strong> and a background in <strong>Front-end Development</strong>, who craft engaging and immersive <strong>human-centered solutions</strong>.</h2>
            </div>
        </div>
        <div class="presentation__links">
            <ul class="presentation__icons margin-block-500">
                <li class="presentation__icons--item margin-inline-200"><a href="http://dribbble.com/antoninolattene" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
                <li class="presentation__icons--item margin-inline-200"><a href="http://www.behance.net/antoninolattene" target="blank"><span class="icon fab fa-behance"></span></a></li>
                <li class="presentation__icons--item margin-inline-200"><a href="http://github.com/Stonino82" target="blank"><span class="icon fab fa-github"></span></a></li>
                <li class="presentation__icons--item margin-inline-200"><a href="http://www.linkedin.com/in/antoninolattene/" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li>
            </ul>
            <div class="presentation__resume">
                <a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/CV-Brochure-Antonino-Lattene-UX-UI-Front-End-1.jpg">
                    <span class="btn--text">Brochure</span>
                    <span class="btn--icon">
                        <i class="fas fa-arrow-alt-circle-down"></i>
                        <i class="fa fa-check"></i>
                    </span>
                </a>
                <a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/03/CV-Resume-Antonino-Lattene-UX-UI-Front-End.pdf">
                
                    <span class="btn--text">Resume</span>
                    <span class="btn--icon">
                        <i class="fas fa-arrow-alt-circle-down"></i>
                        <i class="fa fa-check"></i>
                    </span>
                </a>
                <a class="btn btn--home btn__primary fs-btn" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
                    <span class="btn--text">email me</span>
                    <span class="btn--icon">
                        <i class="fa fa-paper-plane"></i>
                        <i class="fa fa-check"></i>
                    </span>
                </a>
            </div>
        </div>
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
                        $caption_color = get_sub_field('caption_color');
                        $post_type = get_sub_field('post_type');
                    ?>
                    <!-- <article class="project-full <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;" data-aos="fade-up" data-aos-duration="800" data-aos-offset="50" data-aos-anchor-placement="top-bottom"> -->
                    <article class="project-full <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;">

                        <!-- /link to the project -->
                        <?php if( $link_project_page ): 
                            $link_url = $link_project_page['url'];
                            $link_title = $link_project_page['title'];
                            $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" class="project__link"></a>
                        <?php endif; ?>
                        <!-- /link to the project -->

                        <?php if( $image ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                        <?php if( $video ): ?>
                        <video muted autoplay loop playsinline src="<?php echo esc_url($video['url']); ?>" class="project__video <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>"></video>
                        <?php endif; ?>
                        
                        <div class="project__caption">
                            <?php if( $name ): ?>
                            <!-- <p class="pfs-body"><?php echo $number; ?></p> -->
                            <div class="project__subtitle">
                                <span class="chip"><?php echo $post_type; ?></span>
                                <small class="margin-inline-200"><?php echo $company; ?></small>
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
                            </div>
                            <h2 class="fs-secondary-heading fw-bold margin-block-500"><?php echo $name; ?></h2>
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
                        </ul><!-- /project-tags -->
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
                    

                <?php elseif( get_row_layout() == 'half_project' ): ?>
                    <div class="split-article">
                    <?php while( have_rows('half_project') ): the_row(); 
                        // vars
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
                        <!-- <article class="project-half <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;" data-aos="fade-up" data-aos-duration="800" data-aos-offset="50" data-aos-anchor-placement="top-bottom"> -->
                        <article class="project-half <?php echo $caption_color; ?>" style="background-color:<?php echo $background_color; ?>;">
                            <!-- link to the project -->
                            <?php if( $link_project_page ): 
                            $link_url = $link_project_page['url'];
                            $link_title = $link_project_page['title'];
                            $link_target = $link_project_page['target'] ? $link_project_page['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>" class="project__link"></a>
                            <?php endif; ?>
                            <!-- /link to the project -->
                            <?php if( $image ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                            <?php if( $video ): ?>
                            <video muted autoplay loop playsinline src="<?php echo esc_url($video['url']); ?>" class="project__video <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>"></video>
                            <?php endif; ?>
                            <div class="project__caption">
                                <?php if( $name ): ?>
                                <!-- <p class="fs-body"><?php echo $number; ?></p> -->
                                <div class="project__subtitle">
                                    <span class="chip"><?php echo $post_type; ?></span>
                                    <small class="margin-inline-200"><?php echo $company; ?></small>
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
                                </div>
                                <h2 class="fs-secondary-heading fw-bold margin-block-500"><?php echo $name; ?></h2>
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
                            </ul><!-- /project-tags -->
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
                    </div> <!-- split__article -->

                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>
        <!-- /ACF -->
        <section class="process">
            <h2 class="fs-primary-heading fw-bold tt-up tc-neutral-700 margin-0 ta-center" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">About Me</h2>
            <h2 class="fs-secondary-heading tc-primary margin-block-200 ta-center" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">From UX Research, to Front End Development, through UI Design: bridging the gap between Design and Development</h2>
            <!-- <img class="process__image margin-block-800 margin-inline-auto" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/double-diamond-design-model-1.png" alt="double diamond design model" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250"/> -->
            <div class="process__description margin-block-700" data-aos="fade-up" data-aos-duration="800" data-aos-offset="0">
                <div class="even-columns">
                    <p class="fs-body">With a deep understanding of user needs and a passion for crafting intuitive and impactful experiences, I seamlessly navigate the design process <strong>from UX Research and UI Design to Front-end Development.</strong> My iterative approach, guided by the Double Diamond design framework, has consistently resulted in user-centered solutions that meet business objectives.</p>
                    <img class="process__image margin-block-200" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/11/Double-Diamond-framework.jpg" alt="double diamond framework"/>
                    <p class="fs-body">Throughout my design journey, <strong>I've consistently sought to bridge the gap between design and development.</strong> This has allowed me to create not only visually appealing and user-friendly interfaces but also technically feasible solutions that align with business goals.</p>
                </div>
                <div class="even-columns">
                    <p class="fs-body">My dedication to <strong>user-centered design</strong> is paramount. I believe that truly great designs are born from a deep understanding of user needs, behaviors, and motivations. Through extensive user research, empathy mapping, and iterative prototyping, I strive to create experiences that are not only functional and aesthetically pleasing but also emotionally resonant with users.</p>
                    <p class="fs-body">My expertise in <strong>UX Research</strong> allows me to uncover user needs, pain points, and motivations, providing the foundation for creating user-centered solutions.</strong></p>
                    <p class="fs-body">In <strong>UI Design</strong>, I transform research insights into visually appealing and intuitive interfaces that guide users seamlessly through their journey. </p>
                    <p class="fs-body">And as a <strong>Front-end Developer</strong>, I bring these designs to life using the latest technologies, ensuring that my creations are not only functional and responsive but also performant and accessible.</p>
                    <p class="fs-body">In a nutshell, I'm the UX/UI Designer who can code and the Front-end Developer who understands user needs. I'm basically the unicorn of the design world. And yes, I can fly too!</p>
                </div>
            </div>
            <div class="process__toolkit margin-block-800" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250" data-aos-delay="350">
                <div class="column">
                    <h2 class="fs-secondary-heading tc-primary margin-block-200 ta-center">UX Research Toolkit</h2>
                    <div class="slider margin-block-700">
                        <div class="slide">
                            <!-- <h6>1. Discover</h6> -->
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">User Research</li>
                                <li class="chip chip--tags fw-regular tt-cap">Market Research</li>
                                <li class="chip chip--tags fw-regular tt-cap">Competitive Research</li>
                                <li class="chip chip--tags fw-regular tt-cap">Needfinding</li>
                                <li class="chip chip--tags fw-regular tt-cap">Surveys</li>
                                <li class="chip chip--tags fw-regular tt-cap">Interviews</li>
                                <li class="chip chip--tags fw-regular tt-cap">Diary Studies</li>
                                <li class="chip chip--tags fw-regular tt-cap">Participant Observation</li>
                                <li class="chip chip--tags fw-regular tt-cap">Focus Groups</li>
                            </ul>
                        </div>
                        <div class="slide">
                            <!-- <h6>2. Define</h6> -->
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">Problem Definition</li>
                                <li class="chip chip--tags fw-regular tt-cap">Goal Setting</li>
                                <li class="chip chip--tags fw-regular tt-cap">Brainstorming</li>
                                <li class="chip chip--tags fw-regular tt-cap">Mindmaps</li>
                            </ul>
                        </div>
                        <div class="slide">
                            <!-- <h6>3. Develop</h6> -->
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">Personas</li>
                                <li class="chip chip--tags fw-regular tt-cap">Scenarios</li>
                                <li class="chip chip--tags fw-regular tt-cap">Storytelling</li>
                                <li class="chip chip--tags fw-regular tt-cap">User Cases</li>
                                <li class="chip chip--tags fw-regular tt-cap">Journey Maps</li>
                                <li class="chip chip--tags fw-regular tt-cap">Stroyboards</li>
                                <li class="chip chip--tags fw-regular tt-cap">Sketches</li>
                                <li class="chip chip--tags fw-regular tt-cap">Stakeholders Maps</li>
                                <li class="chip chip--tags fw-regular tt-cap">Card Sorting</li>
                                <li class="chip chip--tags fw-regular tt-cap">Hierarchy</li>
                                <li class="chip chip--tags fw-regular tt-cap">Information Architecture</li>
                                <li class="chip chip--tags fw-regular tt-cap">Wireframes</li>
                                <li class="chip chip--tags fw-regular tt-cap">Mockups</li>
                                <li class="chip chip--tags fw-regular tt-cap">Prototypes</li>
                                <li class="chip chip--tags fw-regular tt-cap">Digital Mockups</li>
                                <li class="chip chip--tags fw-regular tt-cap">User Flows</li>
                            </ul>
                        </div>
                        <div class="slide">
                            <!-- <h6>4. Deliver</h6> -->
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">Development</li>
                                <li class="chip chip--tags fw-regular tt-cap">Deployment</li>
                                <li class="chip chip--tags fw-regular tt-cap">Heuristic Evaluation</li>
                                <li class="chip chip--tags fw-regular tt-cap">User Test</li>
                            </ul>
                        </div>
                    </div><!-- /slider -->
                    <!-- <div id="slider-controls">
                        <button class="previous"><i class="fas fa-angle-left"></i></button>
                        <button class="next"><i class="fas fa-angle-right"></i></button>
                    </div> -->
                    <ul class="slider-nav">
                        <li>Discover</li>
                        <li>Define</li>
                        <li>Develop</li>
                        <li>Deliver</li>
                    </ul>
                </div>
                <div class="column">
                    <div class="no-slider">
                        <div class="slide">
                            <h2 class="fs-secondary-heading tc-primary margin-block-200 ta-center">UI Design Toolkit</h2>
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">Adobe Suite</li>
                                <li class="chip chip--tags fw-regular tt-cap">Adobe XD</li>
                                <li class="chip chip--tags fw-regular tt-cap">Figma</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="no-slider">
                        <div class="slide">
                            <h2 class="fs-secondary-heading tc-primary margin-block-200 ta-center">Front End Toolkit</h2>
                            <ul>
                                <li class="chip chip--tags fw-regular tt-cap">HTML5</li>
                                <li class="chip chip--tags fw-regular tt-cap">CSS3</li>
                                <li class="chip chip--tags fw-regular tt-cap">Sass</li>
                                <li class="chip chip--tags fw-regular tt-cap">Bootstrap</li>
                                <li class="chip chip--tags fw-regular tt-cap">Material Design</li>
                                <li class="chip chip--tags fw-regular tt-cap">Javascript</li>
                                <li class="chip chip--tags fw-regular tt-cap">React</li>
                                <li class="chip chip--tags fw-regular tt-cap">Angular</li>
                                <li class="chip chip--tags fw-regular tt-cap">Webpack</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section> <!-- /Portfolio -->
</main>

<?php get_footer(); ?>