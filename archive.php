<?php 
/*
 * Template Name: Archive Template
 * description: Archive Template
 */
	get_header(); ?>
	<main class="container">
		<?php
			get_template_part( 'template-parts/presentation-section', null, [
				'title'       => single_term_title( '', false ),
				'description' => get_the_archive_description(),
			] );
		?>

        <section class="right-side">

            <?php if ( get_post_type() === 'post' ) : ?>
            <section class="blog">
                <?php while ( have_posts() ) : the_post();
					get_template_part('template-parts/project-tile');
				endwhile; ?>
            </section>
            <?php endif; ?>

            <?php if ( get_post_type() === 'portfolio' ) : ?>
            <section class="portfolio">
                <?php while ( have_posts() ) : the_post();
					get_template_part('template-parts/project-tile');
				endwhile; ?>
            </section>
            <?php endif; ?>

            <?php get_footer(); ?>
        </section>
	</main>
