<?php get_header(); ?>

<main>
    <div class="content-404">
        <section class="central">
            <div class="section__inner">
                <div class="section__content">
                    <div class="column">
                        <h2 class="text-gradient">404</h2>
                        <h1>Page not found</h1>
                        <p>The page you're looking for doesn't exist or has been moved.</p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-lg btn-primary">
                            <i class="icon-leading ph ph-house"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="links">
            <div class="section__inner">
                <div class="section__content">
                    <div class="column portfolio">
                        <div class="section__header">
                            <h5 class="section__title">Projects</h5>
                            <a class="btn btn-sm btn-tertiary"
                                href="<?php echo get_post_type_archive_link('portfolio'); ?>">
                                See More
                                <i class="icon-trailing ph ph-arrow-right"></i>
                            </a>
                        </div>
                        <?php
                        $portfolio_query = new WP_Query([
                            'post_type' => 'portfolio',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        if ($portfolio_query->have_posts()):
                            while ($portfolio_query->have_posts()):
                                $portfolio_query->the_post();
                                get_template_part('template-parts/project-tile');
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    <div class="column blog">
                        <div class="section__header">
                            <h5 class="section__title">Latest articles</h5>
                            <a class="btn btn-sm btn-tertiary" href="<?php echo get_post_type_archive_link('post'); ?>">
                                Read More
                                <i class="icon-trailing ph ph-arrow-right"></i>
                            </a>
                        </div>
                        <?php
                        $blog_query = new WP_Query([
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        if ($blog_query->have_posts()):
                            while ($blog_query->have_posts()):
                                $blog_query->the_post();
                                get_template_part('template-parts/project-tile');
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>