<?php 
/*
 * Template Name: Portfolio Archive Template
 * description: Portfolio Archive Template
 */
	get_header(); ?>
	<main class="container container-archive">
		<section class="presentation padding-600 opacityOnScroll ">
			<div class="presentation__header">
				<a class="logo" href="<?php echo home_url(); ?>">
					<img class="" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/04/Logo-UX-UI-Desginer-Antonino-Lattene.svg" alt="logo UX UI designer Barcelona"/>
					<div>
						<span>tony.</span>
						<span>UX/UI DESIGNER</span>
					</div>
				</a>
			</div>
			<div class="presentation__central">
				<?php get_template_part( 'navigation' ); ?>
				<div class="presentation__headlines margin-block-700">
					<!-- <h1 class="text-heading-1 text-gradient tt-up tc-neutral-700"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1> -->
					<h1 class="text-heading-1 text-gradient margin-0">Case Studies & Designs Showcase</h1>
					<h2 class="text-md-body-1 fw-regular margin-block-500">Discover my design journey! This portfolio features UX Case Studies and UI Designs, showcasing my approach to user-centered design and the final, polished results.</h2>
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
		</section><!-- /presentation -->
		<section class="portfolio padding-600">
			<?php
			while ( have_posts() ) : the_post(); ?>
				<article>
					<?php if ( get_post_type() === 'portfolio' ) : ?>
						<div class="article__thumbnail">
							<?php antoninolattene_post_thumbnail(); ?>
						</div>
						<div class="article__description">
							<h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
							<small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
							<ul class="chip-list">
								<?php $categories = get_the_terms( $post->ID, 'portfolio_category' );
								if( $categories ): ?>
									<?php foreach( $categories as $category ): ?>
									<li>
										<!-- Get category without link -->
										<span class="chip chip__portfolio--category"><?php echo $category->name; ?></span>
									</li>
									<?php endforeach; ?>
								<?php endif; ?>

								<?php $tags = get_the_terms( get_the_ID(), 'portfolio_tag' ); if( $tags ): ?>
									<?php foreach( $tags as $tag ): ?>
									<li>
										<!-- Get tags without links  -->
										<span class="chip chip__portfolio--tags"><?php echo $tag->name; ?></span>
									</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
							<p><?php echo get_the_excerpt(); ?></p>
							<?php
							// get_template_part( 'template-parts/content', get_post_type() );
							?>
						</div>
					<?php endif; ?>
				</article>
			<?php
			// the_post_navigation();
			endwhile; // End of the loop.
			?>
		</section>
	</main>
<?php
// get_sidebar();
get_footer();