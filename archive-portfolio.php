<?php 
/*
 * Template Name: Portfolio Archive Template
 * description: Portfolio Archive Template
 */
	get_header(); ?>
	<main class="container container-archive">
		<section class="presentation padding-600 opacityOnScroll ">
			<div class="presentation__header">
				<div class="logo">
					<img class="" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/04/Logo-UX-UI-Desginer-Antonino-Lattene.svg" alt="logo UX UI designer Barcelona"/>
					<div>
						<span>tony.</span>
						<span>UX/UI DESIGNER</span>
					</div>
				</div>
			</div>
			<div class="presentation__central">
				<?php get_template_part( 'navigation' ); ?>
				<div class="presentation__headlines margin-block-700">
					<!-- <h1 class="entry-title fs-primary-heading fw-bold tt-up tc-neutral-700"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1> -->
					<h1 class="entry-title fs-primary-heading fw-bold margin-0">Case Studies & Designs Showcase</h1>
					<h2 class="fs-secondary-heading fw-regular margin-block-500">Discover my design journey! This portfolio features UX Case Studies and UI Designs, showcasing my approach to user-centered design and the final, polished results.</h2>
				</div>
			</div>
			<div class="presentation__links">
				<div class="presentation__resume">
					<a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/CV-Brochure-Antonino-Lattene-UX-UI-Front-End-1.jpg">
						<span class="btn--text">Resume</span>
						<span class="btn--icon">
							<i class="fas fa-arrow-down"></i>
						</span>
					</a>
					<a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/03/CV-Resume-Antonino-Lattene-UX-UI-Front-End.pdf">
					
						<span class="btn--text">Linkedin</span>
						<span class="btn--icon">
							<i class="fas fa-arrow-down rotate"></i>
						</span>
					</a>
					<a class="btn btn--home btn__primary fs-btn" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
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
							<h2 class="entry-title fs-secondary-heading margin-0"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h2>
							<small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
							<ul class="presentation__tags">
								<button class="btn btn__primary fs-btn chip"><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', "" );?></button>
								<?php 
								$tags = get_the_terms( get_the_ID(), 'portfolio_tag' );
								if( $tags ): ?>
									<?php foreach( $tags as $tag ): ?>
									<li>
										<a class="btn btn__primary fs-btn chip chip--tags" href="<?php echo get_tag_link( $tag ); ?>"><?php echo $tag->name; ?></a>
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