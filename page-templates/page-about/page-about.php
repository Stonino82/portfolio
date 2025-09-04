<?php
/**
 * Template Name: About Page
 *
 * The template for displaying the About page.
 *
 * @package antoninolattene-child
 */
get_header(); ?>


    <main>
        <div class="content-about">
            <section class="hero">
                <div class="section__inner">
                    <div class="section__content">
                        <div class="column-left">
                            <img src="<?php echo esc_url(get_vite_asset('img/photo-of-antonino-lattene-product-designer-in-barcelona.png')); ?>" alt="Antonino Lattene Product Designer">
                        </div>
                        <div class="column-right">
                            <div class="hero-content hero-swiper swiper">
                                <div class="hero-swiper-pagination">
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>👋🏻</i> <span>For Anyone</span></p>
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>🕵🏻</i> <span>Recruiters</span></p>
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>🎯</i> <span>Design Managers</span></p>
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>🫱🏼‍🫲🏻</i> <span>Product Managers</span></p>
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>🎨</i> <span>Product Designers</span></p>
                                    <p class="text-body-sm" data-swiper-pagination-bullet><i>🧑🏻‍💻</i> <span>Engineers</span></p>
                                </div>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <h1 class="text-display-3 text-gradient">I bring clarity to complex product challenges</h1>
                                        <h2 class="text-body-lg">My strength lies in navigating ambiguity and defining a clear path forward. I transform intricate business requirements and user needs into powerful, scalable products that are intuitive, human-centered, and genuinely easy to use. I'm passionate about making sophisticated systems feel effortless.</h2>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1 class="text-display-3 text-gradient">A Senior Designer for Your Product Team</h1>
                                        <h2 class="text-body-lg">I am a Senior Product Designer whose experience is rooted in the challenges of complex SaaS and enterprise applications. I lead the end-to-end design lifecycle, effectively bridging high-level business strategy with practical technical execution to deliver impactful results.</h2>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1 class="text-display-3 text-gradient">Elevating the Craft & the Team</h1>
                                        <h2 class="text-body-lg">My strength lies in bringing structure to ambiguity, owning the end-to-end design process to create clarity and direction. This foundation is often built upon a scalable design system, ensuring both product consistency and team efficiency from the start. I am committed to mentoring other designers, helping them leverage our system to refine their craft and deliver consistent, high-quality work.</h2>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1 class="text-display-3 text-gradient">A Partner in Achieving Product Goals</h1>
                                        <h2 class="text-body-lg">I see the relationship between Product and Design as a true partnership. My goal is to help shape our shared vision, translating business objectives and user needs into an effective product that delivers real, measurable impact. I am focused on driving outcomes over simply creating outputs.</h2>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1 class="text-display-3 text-gradient">Let's Build Something Great Together</h1>
                                        <h2 class="text-body-lg">I thrive in a culture of open collaboration and high standards. I'm the type of designer who loves to jam on complex flows, act as a thoughtful sparring partner in critiques, and obsess over the details that elevate a good product to a great one.</h2>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="code-block">
                                        <?php get_template_part('page-templates/page-about/code-snippet'); ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-ctas">
                                <a class="btn btn-md btn-primary" href="https://www.linkedin.com/in/antoninolattene/" target="_blank">
                                    <span class="shine-animation"></span>
                                    <i class="icon-leading fa-brands fa-linkedin-in"></i>
                                    Let's connect
                                </a>
                                <a class="btn btn-md btn-tertiary" href="<?php echo esc_url( get_resume_url() ); ?>" target="_blank">
                                    <span class="icon-leading material-symbols-rounded">download</span>
                                    Resume
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="philosophy">
                <div class="section__inner">
                    <div class="section__content">
                        <div class="column">
                            <div class="column__header">
                                <span class="material-symbols-rounded text-gradient">person_play</span>
                                <h4>My philosophy</h4>
                            </div>
                            <div class="column__content">
                                <p>I believe the best digital products are born at the intersection of user needs, business goals, and technical feasibility. My role is to find the perfect balance between these forces, creating solutions that are not only desirable for people, but also viable for the business and robustly built.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column__header">
                                <span class="material-symbols-rounded text-gradient">handshake</span>
                                <h4>My approach</h4>
                            </div>
                            <div class="column__content">
                                <p>My process is deeply grounded in collaboration and pragmatism. I believe that the best products are built when we work as true partners. I partner closely with Product and Engineering to translate ambitious strategy into a clear, actionable plan that the entire cross-functional team can rally behind.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column__header">
                                <span class="material-symbols-rounded text-gradient">diamond</span>
                                <h4>My principles</h4>
                            </div>
                            <div class="column__content">
                                <p>I am convinced that creating genuine value for people is the best way to drive business results. My guiding principle is clarity: I simplify complex systems into intuitive experiences through a deep commitment to craft and iteration, refining details until the solution feels effortless.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="stats">
                <div class="section__inner">
                    <div class="section__content">
                        <div class="column">
                            <div class="column__header">
                                <h4 class="text-eyebrow-normal">Years of Experience</h4>
                            </div>
                            <div class="column__content">
                                <p class="text-display-1 text-gradient">15+</p>
                                <p>A professional journey evolving from Web Design & Development to Product Design in the SaaS, enterprise, and agency space, gaining a unique perspective on the entire end-to-end product development lifecycle, from initial ideation to final launch and post-launch iteration.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column__header">
                                <h4 class="text-eyebrow-normal">Industries Served</h4>
                            </div>
                            <div class="column__content">
                                <p class="text-display-1 text-gradient">5+</p>
                                <p>Bringing deep, user-centered product design expertise to a diverse range of  industries, including EdTech, Pharma, SaaS, and E-Commerce.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column__header">
                            <h4 class="text-eyebrow-normal">Cross-Functional Teams</h4>
                            </div>
                            <div class="column__content">
                                <p class="text-display-1 text-gradient">12+</p>
                                <p>A history of building strong, successful partnerships with Product Managers and Engineers to ship unified and effective product solutions that not only meet user needs but also achieve key, ambitious business objectives.</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column__header">
                                <h4 class="text-eyebrow-normal">Design Systems Contributed</h4>
                            </div>
                            <div class="column__content">
                                <p class="text-display-1 text-gradient">7+</p>
                                <p>Experience building and scaling design systems from scratch to ensure brand consistency across all digital products and platforms, and improve overall team efficiency.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="journey">
                <div class="section__inner">
                    <div class="section__header">
                        <h2 class="section__title text-gradient">My journey to Product Design</h2>
                    </div>
                    <div class="section__content">
                        <div class="column-big">
                            <div class="sub-column">
                                <p>Ever since I can remember, I've been fascinated by how we think, learn, and perceive, and how we see and interact with information. This curiosity led me to study Information Technology with a focus on <strong>Cognitive Science</strong>, exploring the intricacies of human cognition and language. It provided the academic foundation for my future, grounding me in the 'why' behind <strong>human-computer interaction</strong> long before I officially became a designer.</p>
                                <p>This academic passion soon met a hands-on fascination with visual design and code. I found joy not just in understanding the user, but in building the tangible interfaces they would use.</p>
                            </div>
                            <div class="sub-column">
                                <p><strong>Product Design</strong> ultimately became the place where my two worlds converged: the human-centered inquiry of cognitive science and the practical craft of digital products. Now, I use this holistic view to create products that are not only intuitive but also thoughtfully engineered.</p>
                                <p>Today, as a Senior Product Designer at <strong>SAP - Learning Systems</strong>, my journey comes full circle: I get to apply my foundational knowledge of how humans learn and process information directly to the challenge of designing more effective and engaging learning platforms for a global audience.</p>
                            </div>
                        </div>
                        <div class="column-small">
                            <div class="details-item">
                                <span class="material-symbols-rounded">license</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Google UX Design</h6>
                                    <p class="text-caption">2024 · Certificate · Google Career</p>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">license</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">User Experience: Research & Prototyping</h6>
                                    <p class="text-caption">2020 · Certificate · UC San Diego</p>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">school</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">User Experience</h6>
                                    <p class="text-caption">2018-2019 · Master's Degree · UOC</p>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">license</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Human-Centered Design</h6>
                                    <p class="text-caption">2017 · Certificate · UC San Diego</p>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">license</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Graphic & Web Design, Web Development</h6>
                                    <p class="text-caption">2010-2011 · Certificate · CEI</p>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">school</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Information Technologies (Cognitive Science)</h6>
                                    <p class="text-caption">2006-2010 · Bachelor's Degree · Università di Messina</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="testimonials">
                <div class="section__inner">
                    <div class="section__header">
                        <h2 class="section__title text-gradient">Kind words</h2>
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev btn btn-sm btn-tertiary">
                                <span class="icon-only material-symbols-rounded">chevron_left</span>
                            </div>
                            <div class="swiper-button-next btn btn-sm btn-tertiary">
                                <span class="icon-only material-symbols-rounded">chevron_right</span>
                            </div>
                        </div>
                    </div>
                    <div class="section__content">
                        <div class="testimonials-swiper swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-card__header">
                                            <img src="<?php echo esc_url(get_vite_asset('img/testimonial-constantin.png')); ?>" alt="testimonial Constantin" class="testimonial-card__avatar">
                                            <div class="testimonial-card__author">
                                                <h5>Constantin Dusescu</h5>
                                                <p class="text-caption">Software Developer @SAP</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-card__body">
                                            <p class="text-body-md">I had the pleasure of working with Antonino while we were on the same team at SAP. <strong>He took great care of our design system and made sure everything we built looked and felt consistent,</strong> with a real eye for detail. As a person he is very approachable and collaborative — always available for a quick chat, whether to clarify a design decision, discuss a weird edge case, or brainstorm together. This kind of openness really helped smooth the connection between design and development. A great teammate — someone who genuinely listens, brings thoughtful feedback, and always keeps users in mind.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-card__header">
                                            <img src="<?php echo esc_url(get_vite_asset('img/testimonial-ece.png')); ?>" alt="testimonial Ece" class="testimonial-card__avatar">
                                            <div class="testimonial-card__author">
                                                <h5>Ece Hamzalioglu</h5>
                                                <p class="text-caption">Product Manager - Joule Agentic AI @SAP</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-card__body">
                                            <p class="text-body-md">I had the pleasure of working closely with Toni in SAP Learning, where he consistently demonstrated deep expertise in UI design and design systems. <strong>He brings a holistic perspective to his work—anticipating the broader impact of design decisions on both the user experience and cross-functional implementation.</strong> Toni's background in web development is a clear asset. It enables seamless collaboration with engineers and allows him to spot feasibility issues early in the process. He's proactive, open to feedback, and builds feedback loops into his workflow, which helps accelerate alignment and delivery. I believe he would be a valuable addition to any team.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-card__header">
                                            <img src="<?php echo esc_url(get_vite_asset('img/testimonial-tatiana.png')); ?>" alt="testimonial Tatiana" class="testimonial-card__avatar">
                                            <div class="testimonial-card__author">
                                                <h5>Tatiana Fagúndez Cleimbosky</h5>
                                                <p class="text-caption">UX Copywriter @SAP</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-card__body">
                                            <p class="text-body-md">I had the chance to work with Antonino on a SAP project, and his UX skills truly stood out. <strong>He excels at turning complex requirements into intuitive, user-friendly designs.</strong></p>
                                            <br>
                                            <p class="text-body-md"> Antonino is a thoughtful designer and he'd be a great asset to any UX team! </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-card__header">
                                            <img src="<?php echo esc_url(get_vite_asset('img/testimonial-gabriela.png')); ?>" alt="testimonial Gabriela" class="testimonial-card__avatar">
                                            <div class="testimonial-card__author">
                                                <h5>Gabriela Klewenhagen</h5>
                                                <p class="text-caption">Content strategy and product management @SAP</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-card__body">
                                            <p class="text-body-md">Antonino is an exceptional UX designer.</strong> </p>
                                            <br>
                                            <p class="text-body-md">I thoroughly enjoyed collaborating with him; <strong>he consistently brought innovative ideas to the table and was always incredibly quick to offer help.</strong> </p>
                                            <br>
                                            <p class="text-body-md">A true asset to any team!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section__footer">
                        <div class="column-left">
                            <div class="testimonial-images">
                                <img src="<?php echo esc_url(get_vite_asset('img/testimonial-tatiana.png')); ?>" alt="testimonial Tatiana">
                                <img src="<?php echo esc_url(get_vite_asset('img/testimonial-gabriela.png')); ?>" alt="testimonial Gabriela">
                                <img src="<?php echo esc_url(get_vite_asset('img/testimonial-constantin.png')); ?>" alt="testimonial Constantin">
                                <img src="<?php echo esc_url(get_vite_asset('img/testimonial-ece.png')); ?>" alt="testimonial Ece">
                            </div>
                            <p class="text-body-md">See more testimonials</p>
                        </div>
                        <div class="column-right">
                            <a class="btn btn-sm btn-primary" href="https://www.linkedin.com/in/antoninolattene/" target="_blank">
                                Linkedin
                                <i class="icon-trailing fa-solid fa-arrow-down rotate"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="skills">
                <div class="section__inner">
                    <div class="section__header">
                        <h2 class="section__title text-gradient">Skills & Stack</h2>
                    </div>
                    <div class="section__content">
                        <div class="column-small">
                            <p>I'm a hands-on product designer passionate about the full end-to-end process. While I partner on early product strategy, my core strength lies in execution: translating insights into engaging Interaction Designs, polished UI, and high-fidelity prototypes. I specialize in creating and scaling robust Design Systems. Grounded in my front-end background, I'm always exploring new tools to stay at the forefront of the craft.</p>                            
                        </div>
                        <div class="column-big">
                            <div class="details-item">
                                <span class="material-symbols-rounded">chess</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Skills</h6>
                                    <div class="chip-list chip-list--md">
                                        <span class="chip chip--squared">Product strategy</span>
                                        <span class="chip chip--squared">Interaction design</span>
                                        <span class="chip chip--squared">Design System</span>
                                        <span class="chip chip--squared">Prototyping</span>
                                        <span class="chip chip--squared">Accessibility</span>
                                        <span class="chip chip--squared">Visual Design</span>
                                        <span class="chip chip--squared">Information Architecture</span>
                                    </div>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">tools_power_drill</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Tools & Technology</h6>
                                    <div class="chip-list chip-list--md">
                                        <span class="chip chip--squared">Figma</span>
                                        <span class="chip chip--squared">Adobe XD</span>
                                        <span class="chip chip--squared">Sketch</span>
                                        <span class="chip chip--squared">Adobe</span>
                                        <span class="chip chip--squared">Jira</span>
                                        <span class="chip chip--squared">Slack</span>
                                        <span class="chip chip--squared">Miro</span>
                                        <span class="chip chip--squared">Notion</span>
                                        <span class="chip chip--squared">HTML5</span>
                                        <span class="chip chip--squared">CSS3 / SASS</span>
                                        <span class="chip chip--squared">JavaScript</span>
                                        <span class="chip chip--squared">React</span>
                                        <span class="chip chip--squared">Angular</span>
                                        <span class="chip chip--squared">PHP</span>
                                        <span class="chip chip--squared">Git</span>
                                        <span class="chip chip--squared">Vite</span>
                                        <span class="chip chip--squared">Tailwind</span>
                                        <span class="chip chip--squared">Meterial Design</span>
                                    </div>
                                </div>
                            </div>
                            <div class="details-item">
                                <span class="material-symbols-rounded">auto_stories</span>
                                <div class="details-item-content">
                                    <h6 class="text-eyebrow-normal">Currently Learning</h6>
                                    <div class="chip-list chip-list--md">
                                        <span class="chip chip--squared">Generative AI</span>
                                        <span class="chip chip--squared">AI in Design</span>
                                        <span class="chip chip--squared">Vibe Design</span>
                                        <span class="chip chip--squared">Vibe Coding</span>
                                        <span class="chip chip--squared">v0</span>
                                        <span class="chip chip--squared">Lovable</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="passions">
                <div class="section__inner">
                    <div class="section__header">
                        <h2 class="section__title text-gradient">Beyond the Pixels</h2>
                    </div>
                    <div class="section__content">
                        <div class="column-big">
                            <p>When I'm not designing, I'm usually out exploring. You might find me riding my motorbike through the Catalan countryside, playing beach volley, or discovering new corners of Barcelona with my camera.  I believe that disconnecting and experiencing the world, whether through travel or just a good book in a new coffee shop, is the best way to bring a fresh, human perspective back to my work.</p>
                            <p>I'm a life-long learner, passionate about applying new knowledge over collecting certifications and I'm a firm believer in giving back to the design community. I find great joy in connecting with and informally mentoring aspiring designers who are starting their journey. Whether it's a portfolio review over coffee or sharing advice, I think it's essential to support the next generation of talent in our industry.</p>
                            <div class="details-item">
                                <!-- <span class="material-symbols-rounded">tools_power_drill</span> -->
                                <div class="details-item-content">
                                    <!-- <h6 class="text-eyebrow-normal">Tools & Technology</h6> -->
                                    <div class="chip-list chip-list--md">
                                        <span class="chip chip--squared"><i>🏐</i> Beach Volleyball</span>
                                        <span class="chip chip--squared"><i>🏍️</i> Riding</span>
                                        <span class="chip chip--squared"><i>📷</i> Photography</span>
                                        <span class="chip chip--squared"><i>📖</i> Reading</span>
                                        <span class="chip chip--squared"><i>☕️</i> Coffee Lover</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-small">
                            <?php
                                get_template_part(
                                    'template-parts/promotional-banner',
                                    null,
                                    array(
                                        'layout' => 'vertical', // or 'horizontal'
                                        'type' => 'primary',
                                        'title' => 'Nino AI',
                                        'title_icon_type' => 'custom',
                                        'title_icon_path' => 'img/nino-ai-white.svg',
                                        'title_icon_position' => 'icon-leading',
                                        'text' => 'Have specific questions about my professional journey? You can have a conversation with my AI Clone to explore my skills and experience interactively. It\'s the fastest way to get to know my professional profile.',

                                        'primary_cta_text' => 'Nino AI',
                                        'primary_cta_url' => get_permalink( get_page_by_path( 'nino-ai' ) ),
                                        'primary_cta_classes' => 'btn-sm btn-secondary',

                                        'primary_cta_icon_type' => 'fa',
                                        'primary_cta_icon_class' => 'fa-regular fa-message',
                                        'primary_cta_icon_position' => 'icon-leading',
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="blog showcase-blog">
                <div class="section__inner">
                    <div class="section__header">
                        <h2 class="section__title text-gradient">Design & Code Dialogues</h2>
                        <a class="btn btn-sm btn-tertiary" href="<?php echo get_post_type_archive_link( 'post' ); ?>">
                            Read More
                            <i class="icon-trailing fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="section__content">
                        <div class="column">
                            <p>I'm a firm believer in giving back to the design community. Here, I share my latest articles, practical learnings, and reflections on my journey, hoping to help others who are on a similar path in the product design world.</p>
                        </div>
                        <div class="column">
                            <?php
                            // Next, query for 'post' post type.
                            $blog_args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => -1,
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            );

                            $blog_query = new WP_Query( $blog_args );

                            if ( $blog_query->have_posts() ) {
                                while ( $blog_query->have_posts() ) {
                                    $blog_query->the_post();
                                    get_template_part( 'template-parts/project-tile' );
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="last">
                <div class="section__inner">
                    <div class="section__content">
                        <?php
                        get_template_part(
                            'template-parts/promotional-banner',
                            null,
                            array(
                                'layout' => 'horizontal', // or 'horizontal'
                                'title' => 'Get in touch',
                                'text' => 'Thanks for taking the time to learn about my work and journey. Whether you have a specific opportunity or would just like to connect with a fellow product enthusiast, you\'re welcome to reach out on LinkedIn.',
                                
                                'primary_cta_text' => 'Let\'s connect',
                                'primary_cta_url' => 'https://www.linkedin.com/in/antoninolattene/',
                                'primary_cta_classes' => 'btn-sm btn-primary',
                                
                                'primary_cta_icon_type' => 'fa',
                                'primary_cta_icon_class' => 'fa-brands fa-linkedin-in',
                                'primary_cta_icon_position' => 'icon-leading',

                                'secondary_cta_text' => 'Resume',
                                'secondary_cta_url' => get_resume_url(),
                                'secondary_cta_classes' => 'btn-sm btn-tertiary',

                                'secondary_cta_icon_type' => 'md',
                                'secondary_cta_icon_class' => 'download',
                                'secondary_cta_icon_position' => 'icon-leading',
                            )
                        );
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>