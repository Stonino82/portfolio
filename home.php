<?php 
/*
 * Template Name: Blog Template
 * description: Blog Template
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
					<!-- <h1 class="entry-title fs-display-1 fw-bold tt-up tc-neutral-700"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1> -->
					<h1 class="entry-title fs-display-1 fw-bold margin-0">Design & Code Dialogues</h1>
					<h2 class="fs-body fw-regular margin-block-500">Dive into the world of UX, UI, and Front-end Development! I'll share insights, explore trends, and spark conversation on everything from user research to pixel-perfect interfaces.</h2>
				</div>
			</div>
			<div class="presentation__links">
				<div class="presentation__resume">
					<a class="btn btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/CV-Brochure-Antonino-Lattene-UX-UI-Front-End-1.jpg">
						<span class="btn--text">Resume</span>
						<span class="btn--icon">
							<i class="fas fa-arrow-down"></i>
						</span>
					</a>
					<a class="btn btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/03/CV-Resume-Antonino-Lattene-UX-UI-Front-End.pdf">
					
						<span class="btn--text">Linkedin</span>
						<span class="btn--icon">
							<i class="fas fa-arrow-down rotate"></i>
						</span>
					</a>
					<a class="btn btn__primary fs-btn" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
						<span class="btn--text">Email Me</span>
						<span class="btn--icon">
							<i class="fas fa-arrow-down rotate"></i>
						</span>
					</a>
				</div>
			</div>
		</section><!-- /presentation -->
		<section class="blog padding-600">
			<?php
			while ( have_posts() ) : the_post(); ?>
				<article>
					<?php if ( get_post_type() === 'post' ) : ?>
						<div class="article__thumbnail">
							<?php antoninolattene_post_thumbnail(); ?>
						</div>
						<div class="article__description">
							<h2 class="entry-title fs-body margin-0"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h2>
							<small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
							<ul class="chip-list">
								<?php $categories = get_the_category();
								if( $categories ): ?>
									<?php foreach( $categories as $category ): ?>
									<li>
										<!-- Get category without link -->
										<span class="chip chip__blog--category"><?php echo $category->cat_name . ' '; ?></span>
									</li>
									<?php endforeach; ?>
								<?php endif; ?>

								<?php $tags = get_the_tags(); if( $tags ): ?>
									<?php foreach( $tags as $tag ): ?>
									<li>
										<!-- Get tags without links  -->
										<span class="chip chip__blog--tags"><?php echo $tag->name; ?></span>
									</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
							<p><?php the_excerpt(); ?></p>
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
