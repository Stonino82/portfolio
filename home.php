<?php 
/*
 * Template Name: Blog Template
 * description: Blog Template
 */
	get_header(); ?>
	
	<main class="container">
		<?php
			get_template_part( 'template-parts/presentation-section', null, [
				'title'       => 'Design & Code Dialogues',
				'description' => 'Dive into the world of <strong class="tc-accent">UX, UI, and Front-end Development!</strong> I\'ll share insights, explore trends, and spark conversation on everything from <strong class="tc-accent">user research to pixel-perfect interfaces.</strong>',
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

			<?php get_footer(); ?>
		</section>
	</main>
