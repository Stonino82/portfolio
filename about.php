<?php get_header(); ?>

<main class="container">
    <section class="presentation opacityOnScroll">
        <div class="presentation__header">
            <a class="logo" href="<?php echo home_url(); ?>">
                <img class="" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/04/Logo-UX-UI-Desginer-Antonino-Lattene.svg" alt="logo UX UI designer Barcelona"/>
                <div>
                    <span>tony.</span>
                    <span>PRODUCT DESIGNER</span>
                </div>
            </a>
        </div>
        <div class="presentation__central">
            <?php get_template_part( 'navigation' ); ?>
            <div class="presentation__headlines margin-block-700">
                <h1 class="text-heading-1 text-gradient margin-0">I build stunning UIs that resonate on a human level</h1>
                <!-- <h2 class="text-md-body-1 tt-up tc-neutral-700">& Front-end Developer</h2> -->
                <h2 class="text-md-body-1 fw-regular margin-block-500">Hey, I’m Tony, <strong>User Experience & User Interface Designer</strong> based in Barcelona. With an emphasis in <strong>Visual Design</strong> and a background in <strong>Front-end Development</strong>, I transform user needs into solutions that drive results.</h2>
            </div>
        </div>
        <div class="presentation__links">
            <div class="presentation__resume">
                <a class="btn btn__secondary text-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/CV-Brochure-Antonino-Lattene-UX-UI-Front-End-1.jpg">
                    <span class="btn--text">Resume</span>
                    <span class="btn--icon">
                        <i class="fas fa-arrow-down"></i>
                    </span>
                </a>
                <a class="btn btn__secondary text-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/03/CV-Resume-Antonino-Lattene-UX-UI-Front-End.pdf">
                
                    <span class="btn--text">Linkedin</span>
                    <span class="btn--icon">
                        <i class="fas fa-arrow-down rotate"></i>
                    </span>
                </a>
                <a class="btn btn__primary text-btn" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
                    <span class="btn--text">Email Me</span>
                    <span class="btn--icon">
                        <i class="fas fa-arrow-down rotate"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section class="process">
        <h2 class="text-heading-1 tt-up tc-neutral-700 margin-0 ta-center" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">About Me</h2>
        <h2 class="text-md-body-1 tc-primary margin-block-200 ta-center" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250">From UX Research, to Front End Development, through UI Design: bridging the gap between Design and Development</h2>
        <!-- <img class="process__image margin-block-800 margin-inline-auto" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/double-diamond-design-model-1.png" alt="double diamond design model" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250"/> -->
        <div class="process__description margin-block-700" data-aos="fade-up" data-aos-duration="800" data-aos-offset="0">
            <div class="even-columns">
                <p class="text-md-body-1">With a deep understanding of user needs and a passion for crafting intuitive and impactful experiences, I seamlessly navigate the design process <strong>from UX Research and UI Design to Front-end Development.</strong> My iterative approach, guided by the Double Diamond design framework, has consistently resulted in user-centered solutions that meet business objectives.</p>
                <img class="process__image margin-block-200" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/11/Double-Diamond-framework.jpg" alt="double diamond framework"/>
                <p class="text-md-body-1">Throughout my design journey, <strong>I've consistently sought to bridge the gap between design and development.</strong> This has allowed me to create not only visually appealing and user-friendly interfaces but also technically feasible solutions that align with business goals.</p>
            </div>
            <div class="even-columns">
                <p class="text-md-body-1">My dedication to <strong>user-centered design</strong> is paramount. I believe that truly great designs are born from a deep understanding of user needs, behaviors, and motivations. Through extensive user research, empathy mapping, and iterative prototyping, I strive to create experiences that are not only functional and aesthetically pleasing but also emotionally resonant with users.</p>
                <p class="text-md-body-1">My expertise in <strong>UX Research</strong> allows me to uncover user needs, pain points, and motivations, providing the foundation for creating user-centered solutions.</strong></p>
                <p class="text-md-body-1">In <strong>UI Design</strong>, I transform research insights into visually appealing and intuitive interfaces that guide users seamlessly through their journey. </p>
                <p class="text-md-body-1">And as a <strong>Front-end Developer</strong>, I bring these designs to life using the latest technologies, ensuring that my creations are not only functional and responsive but also performant and accessible.</p>
                <p class="text-md-body-1">In a nutshell, I'm the UX/UI Designer who can code and the Front-end Developer who understands user needs. I'm basically the unicorn of the design world. And yes, I can fly too!</p>
            </div>
        </div>
        <div class="process__toolkit margin-block-800" data-aos="fade-up" data-aos-duration="800" data-aos-offset="250" data-aos-delay="350">
            <div class="column">
                <h2 class="text-md-body-1 tc-primary margin-block-200 ta-center">UX Research Toolkit</h2>
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
                        <h2 class="text-md-body-1 tc-primary margin-block-200 ta-center">UI Design Toolkit</h2>
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
                        <h2 class="text-md-body-1 tc-primary margin-block-200 ta-center">Front End Toolkit</h2>
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
</main>

<?php get_footer(); ?>