<?php get_header(); ?>

    <div class="container">
        <section class="presentation opacityOnScroll">

            <div class="presentation__central">
                <!-- <h1 data-aos="fade-right" data-aos-duration="800" data-aos-once="true">User Interface<br />Designer <br />& Front End <br />Developer</h1> -->
                <h1>User Interface<br />Designer <br />& Front End <br />Developer</h1>

                <!-- <h2 data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" data-aos-once="true">Hey, I’m Tony. Originally from Italy.<br /> Currently living in Barcelona.<br /> Mostly, in my head.</h2> -->
                <h2>Hey, I’m Tony. Originally from Italy.<br /> Currently living in Barcelona.<br /> Mostly, in my head.</h2>
                
                <ul class="presentation__icons">
                    <!-- <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="800" data-aos-once="true" data-aos-anchor-placement="top-bottom"><a href="http://dribbble.com/antoninolattene" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="700" data-aos-once="true" data-aos-anchor-placement="top-bottom"><a href="http://www.behance.net/antoninolattene" target="blank"><span class="icon fab fa-behance"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="600" data-aos-once="true" data-aos-anchor-placement="top-bottom"><a href="http://github.com/Stonino82" target="blank"><span class="icon fab fa-github"></span></a></li>
                    <li class="presentation__icons--item" data-aos="fade-right" data-aos-duration="400" data-aos-delay="500" data-aos-once="true" data-aos-anchor-placement="top-bottom"><a href="http://www.linkedin.com/in/antoninolattene/" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li> -->
                    <li class="presentation__icons--item"><a href="http://dribbble.com/antoninolattene" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
                    <li class="presentation__icons--item"><a href="http://www.behance.net/antoninolattene" target="blank"><span class="icon fab fa-behance"></span></a></li>
                    <li class="presentation__icons--item"><a href="http://github.com/Stonino82" target="blank"><span class="icon fab fa-github"></span></a></li>
                    <li class="presentation__icons--item"><a href="http://www.linkedin.com/in/antoninolattene/" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li>
                </ul>
            </div>

            <div class="presentation__links">
                <!-- <div class="presentation__email" data-aos="fade-up" data-aos-duration="400" data-aos-delay="800" data-aos-once="true" data-aos-offset="0"> -->
                <div class="presentation__email">
                    <a class="button" href="mailto:antoninolattene@gmail.com" role="button" rel="noopener noreferrer">
                        <span>email me</span>
                        <div class="icon">
                            <i class="fa fa-paper-plane"></i>
                            <i class="fa fa-check"></i>
                        </div>
                    </a>
                </div>
                <!-- <div class="presentation__resume" data-aos="fade-up" data-aos-duration="400" data-aos-delay="900" data-aos-once="true" data-aos-offset="0"> -->
                <div class="presentation__resume">
                    <a class="button" download href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/CV-Brochure-Antonino-Lattene-Frontend.jpg">
                        <span>resume</span>
                        <div class="icon">
                            <i class="fas fa-arrow-alt-circle-down"></i>
                            <i class="fa fa-check"></i>
                        </div>
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
                            <img src="<?php echo esc_url($image['url']); ?>" class="project__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <div class="project__caption--up">
                                <?php if( $name ): ?>
                                <p class="project__number"><?php echo $number; ?></p>
                                <h4 class="project__name"><?php echo $name; ?><span class="project__links--item <?php echo $icon_project_page; ?>"></span></h4>
                                <p class="project__company"><?php echo $company; ?></p>
                                <?php endif; ?>
                                <div class="project__links">
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

                            <ul class="project__tags">
                            <?php 
                            $category = get_sub_field('category');
                            if( $category ): ?>
                                    <li class="project__tags--item project__tags--item-category"><?php echo esc_html( $category->name ); ?></li>
                            <?php endif; ?>
                            
                            <?php 
                            $tags = get_sub_field('tags');
                            if( $tags ): ?>
                                <?php foreach( $tags as $tag ): ?>
                                    <li class="project__tags--item"><?php echo esc_html( $tag->name ); ?></li>
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
                                <img src="<?php echo esc_url($image['url']); ?>" class="project__img project-half__img <?php echo $class_image ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <div class="project__caption--up">
                                    <?php if( $name ): ?>
                                    <p class="project__number"><?php echo $number; ?></p>
                                    <h4 class="project__name"><?php echo $name; ?><span class="project__links--item <?php echo $icon_project_page; ?>"></span></h4>
                                    <p class="project__company"><?php echo $company; ?></p>
                                    <?php endif; ?>
                                    <div class="project__links">
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

                                <ul class="project__tags">
                                <?php 
                                $category = get_sub_field('category');
                                if( $category ): ?>
                                        <li class="project__tags--item project__tags--item-category"><?php echo esc_html( $category->name ); ?></li>
                                <?php endif; ?>
                                
                                <?php 
                                $tags = get_sub_field('tags');
                                if( $tags ): ?>
                                    <?php foreach( $tags as $tag ): ?>
                                        <li class="project__tags--item"><?php echo esc_html( $tag->name ); ?></li>
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
                <h3 class="process__title" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">Design Framework & Toolkit</h3>
                <img class="process__image" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/double-diamond-design-model-1.png" alt="double diamond design model" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250"/>
                <div class="process__content">
                    <div class="process__content--description" data-aos="fade-up" data-aos-duration="800" data-aos-offset="0">
                        <p>From <strong>UX Research</strong>, to <strong>Front End Development</strong>, through <strong>UI Design</strong>, my process involves developing the best solution to identified pain points through an iterative approach.</p>
                        <p>Based on the <strong>Double Diamond</strong> design process model, this is my toolkit, which includes some of the methods, techniques and tools that I usually use throughout the process to create <strong>compelling and meaningful experiences for users</strong>.</p>
                    </div>
                    <div class="process__toolkit" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250" data-aos-delay="350">
                        <div class="slider">
                            <div class="process__toolkit-column">
                                <h4> Discover</h4>
                                <p><em>phase 1</em></p>
                                <ul class="process__toolkit--items">
                                    <li class="process__toolkit--item">Needfinding</li>
                                    <li class="process__toolkit--item">Surveys</li>
                                    <li class="process__toolkit--item">Interviews</li>
                                    <li class="process__toolkit--item">Diary Studies</li>
                                    <li class="process__toolkit--item">Observation</li>
                                </ul>
                            </div>
                            <div class="process__toolkit-column">
                                <h4>Define</h4>
                                <p><em>phase 2</em></p>
                                <ul class="process__toolkit--items">
                                    <li class="process__toolkit--item">Personas</li>
                                    <li class="process__toolkit--item">Scenarios</li>
                                    <li class="process__toolkit--item">User Cases</li>
                                    <li class="process__toolkit--item">Journey Maps</li>
                                    <li class="process__toolkit--item">Stroyboards</li>
                                    <li class="process__toolkit--item">Sketches</li>
                                    <li class="process__toolkit--item">Stakeholders Maps</li>
                                    <li class="process__toolkit--item">Card Sorting</li>
                                </ul>
                            </div>
                            <div class="process__toolkit-column">
                                <h4>Develop</h4>
                                <p><em>phase 3</em></p>
                                <ul class="process__toolkit--items">
                                    <li class="process__toolkit--item">Ideation</li>
                                    <li class="process__toolkit--item">Hierarchy</li>
                                    <li class="process__toolkit--item">Information Architecture</li>
                                    <li class="process__toolkit--item">Wireframes</li>
                                    <li class="process__toolkit--item">Prototypes</li>
                                    <li class="process__toolkit--item">Digital Mockups</li>
                                    <li class="process__toolkit--item">User Flows</li>
                                </ul>
                            </div>
                            <div class="process__toolkit-column">
                                <h4>Deliver</h4>
                                <p><em>phase 4</em></p>
                                <ul class="process__toolkit--items">
                                    <li class="process__toolkit--item">User Interface</li>
                                    <li class="process__toolkit--item">Interaction Design</li>
                                    <li class="process__toolkit--item">Visual Design</li>
                                    <li class="process__toolkit--item">Adobe XD</li>
                                    <li class="process__toolkit--item">Front End development</li>
                                    <li class="process__toolkit--item">HTML5</li>
                                    <li class="process__toolkit--item">CSS3</li>
                                    <li class="process__toolkit--item">Javascript</li>
                                    <li class="process__toolkit--item">Gulp</li>
                                    <li class="process__toolkit--item">Bootstrap</li>
                                    <li class="process__toolkit--item">Front End Frameworks</li>
                                </ul>
                            </div>
                        </div><!-- /slider -->
                        <div class="process__toolkit-column process__toolkit-column--fixed">
                                <h4>Test</h4>
                                <p><em>Throughout the entire process</em></p>
                                <ul class="process__toolkit--items">
                                    <li class="process__toolkit--item">Heuristic Evaluation</li>
                                    <li class="process__toolkit--item">User Test</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer__inner">
                <p>Antonino Lattene © 2020 - Made with <i class="fas fa-heart" title="Love"></i></p>
                <p><em>antoninolattene@gmail.com</em></p>
            </footer>

        </section> <!-- /Portfolio -->
    </div>

<?php get_footer(); ?>