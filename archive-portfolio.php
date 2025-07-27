<?php 
/*
 * Template Name: Portfolio Archive Template
 * description: Portfolio Archive Template
 */
	get_header(); ?>
	<main class="container">
		<?php
			get_template_part( 'template-parts/presentation-section', null, [
				'title'       => 'Case Studies & Designs Showcase',
				'description' => 'Discover my design journey! This portfolio features <strong class="tc-primary">UX Case Studies</strong> and <strong class="tc-primary">UI Designs</strong>, showcasing my approach to <strong class="tc-primary">user-centered design</strong> and the final, polished results.',
			] );
		?>

		<section class="right-side">

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