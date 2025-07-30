<?php get_header(); ?>

    <main class="container">
        <?php
            get_template_part( 'template-parts/presentation-section', null, [
                'title'                    => 'I shape stunning Experiences that resonate on a Human level',
                'description'              => 'Hey I\'m Tony, <strong class="text-highlight">👷🏻‍♂️ Product Designer</strong> based in Barcelona. I solve <strong class="text-gradient">complex business challenges</strong> and meet <strong class="text-gradient">user needs</strong> through thoughtful design.<br>My process covers the entire product lifecycle, from defining strategy to crafting intuitive UX/UI and scalable Design Systems, all grounded in a background of Front-end development.',
                'show_breadcrumbs'         => false,
            ] );
        ?>

        <div class="right-side">
            <section class="showcase">
                <?php
                // Use a native WordPress Query to automatically fetch and display the latest posts.
                $args = array(
                    'post_type'      => array( 'portfolio', 'post' ), // Fetch from both post types.
                    'posts_per_page' => 6,                           // Show the 6 most recent items.
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $latest_posts_query = new WP_Query( $args );

                if ( $latest_posts_query->have_posts() ) {
                    while ( $latest_posts_query->have_posts() ) {
                        $latest_posts_query->the_post();
                        // The project-card template is designed to work within the standard loop.
                        get_template_part( 'template-parts/project-card' );
                    }
                    wp_reset_postdata(); // Restore original Post Data.
                }
                ?>
            </section> <!-- /Showcase -->

            <?php get_footer(); ?>
        </div>
    </main>