<?php 
/*
 * Template Name: Blog Template
 * description: Blog Template
 */
	get_header(); ?>
	
	<main class="container">
		<?php
			// Get title and description from the Theme Customizer for flexibility.
			$title       = get_theme_mod( 'blog_page_title', '' );
			$description = get_theme_mod( 'blog_page_description', '' );

			get_template_part( 'template-parts/presentation-section', null, [
				'title'       => $title,
				'description' => $description,
			] );
		?>

		<section class="content">
			<section>
				<?php while ( have_posts() ) : the_post();
					get_template_part('template-parts/project-tile');
				endwhile; ?>
			</section>

			<?php get_footer(); ?>
		</section>
	</main>
