<?php 
/*
 * Template Name: Portfolio Archive Template
 * description: Portfolio Archive Template
 */
	get_header(); ?>
	<main class="container container-archive">
		<section class="presentation opacityOnScroll ">
			<div class="presentation__header">
				<?php get_template_part( 'template-parts/logo' ); ?>
			</div>

			<div class="presentation__central">
				<div class="presentation__headlines">
					<h1 class="text-heading-1 text-gradient margin-block-100">Case Studies & Designs Showcase</h1>
				</div>
				<div class="presentation__description">
					<h2 class="text-md-body-1 fw-regular">Discover my design journey! This portfolio features <strong>UX Case Studies</strong> and <strong>UI Designs</strong>, showcasing my approach to <strong>user-centered design</strong> and the final, polished results.</h2>
				</div>
			</div>

			<div class="presentation__links">
				<?php get_template_part( 'template-parts/presentation-links' ); ?>
			</div>
		</section><!-- /presentation -->

		<section class="right-side">

			<?php if ( get_post_type() === 'portfolio' ) : ?>
			<section class="portfolio">
				<?php while ( have_posts() ) : the_post(); ?>
				<article>
						<?php antoninolattene_post_thumbnail(); ?>
						<div class="article__description">
							<h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
							<small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
							<div class="categories">
								<ul class="chip-list">
									<?php $categories = wp_get_post_terms( get_the_id(), 'portfolio_category', array( 'orderby' => 'term_order'));
									if( $categories ): ?>
										<?php foreach( $categories as $category ): ?>
											<?php if ( $category->parent == 0 ): ?>
												<li>
													<a class="chip chip__portfolio--category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
														<i class="fa-solid fa-bars"></i>
														<?php echo $category->name; ?>
													</a>
												</li>
											<?php else: ?>
												<li>
													<a class="chip chip__portfolio--sub-category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
														<i class="fa-solid fa-bars-staggered"></i>
														<?php echo $category->name; ?>
													</a>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							<div class="tags">
								<ul class="chip-list">								
									<?php $tags = get_the_terms( get_the_ID(), 'portfolio_tag' );
									if( $tags ): ?>
										<?php foreach( $tags as $tag ): ?>
										<li>
											<a class="chip chip__portfolio--tags" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
												<i class="fa-solid fa-tag"></i>
												<?php echo $tag->name; ?>
											</a>
										</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							<p><?php echo get_the_excerpt(); ?></p>
							<?php
							// get_template_part( 'template-parts/content', get_post_type() );
							?>
						</div>
				</article>
				<?php endwhile; ?>
			</section>
			<?php endif; ?>

			<?php get_footer(); ?>
		</section>
	</main>