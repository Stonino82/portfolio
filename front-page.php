<?php get_header(); ?>

    <main class="container grid-layout">
        <?php
            get_template_part( 'template-parts/presentation-section', null, [
                // 'title'                    => 'I shape stunning Experiences that resonate on a Human level',
                'title'                    => 'Impactful Design for Scalable Products',
                // 'description'              => 'Hey I\'m Tony, Senior Product Designer based in Barcelona. I solve <strong class="text-gradient">complex business challenges </strong> and meet <strong class="text-gradient">user needs</strong> through thoughtful design. My process covers the entire product lifecycle, from defining strategy to crafting intuitive UX/UI and scalable Design Systems, all grounded in a background of Front-end development.',
                'description'              => 'Hey, I\'m Tony, a Senior Product Designer in Barcelona. I lead the complete product design lifecycle — from discovery to delivery — translating <strong class="text-primary">complex business goals</strong> into <strong class="text-accent">human-centered experiences</strong> that deliver measurable impact. My front-end background ensures every solution is technically feasible and built with excellence.',
                'show_breadcrumbs'         => false,
            ] );
        ?>

        <div class="content">
            <section class="showcase-portfolio portfolio">
                <?php
                // First, query for 'portfolio' post type.
                $portfolio_args = array(
                    'post_type'      => 'portfolio',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $portfolio_query = new WP_Query( $portfolio_args );

                if ( $portfolio_query->have_posts() ) {
                    while ( $portfolio_query->have_posts() ) {
                        $portfolio_query->the_post();
                        get_template_part( 'template-parts/project-card' );
                    }
                    wp_reset_postdata();
                }
                ?>
            </section> <!-- /Showcase -->
            <section class="showcase-blog blog">
                <div class="section__header">
                    <h5 class="section__title">Latest articles</h5>
                    <a class="btn btn-sm btn-tertiary" href="<?php echo get_post_type_archive_link( 'post' ); ?>">
                        Read More
                        <i class="icon-trailing fas fa-arrow-right"></i>
                    </a>
                </div>
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
            </section> <!-- /Showcase -->
        </div>
    </main><!-- .container -->

<?php get_footer(); ?>