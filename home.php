<?php 
/*
 * Template Name: Blog Template
 * description: Blog Template
 */
	get_header(); ?>
	
	<main class="container container-archive">
		<section class="presentation opacityOnScroll ">
			<div class="presentation__header">
				<?php get_template_part( 'template-parts/logo' ); ?>
			</div>

			<div class="presentation__central">
				<div class="presentation__headlines">
					<ul class="chip-list">
						<li>
							<span class="chip chip__blog--category"><i class="fa-solid fa-feather-pointed"></i>Blog</span>
						</li>
					</ul>
					<h1 class="text-heading-1 text-gradient margin-block-100">Design & Code Dialogues</h1>
				</div>
				<div class="presentation__description">
					<h2 class="text-md-body-1 fw-regular">Dive into the world of <strong class="tc-accent">UX, UI, and Front-end Development!</strong> I'll share insights, explore trends, and spark conversation on everything from <strong class="tc-accent">user research to pixel-perfect interfaces.</strong></h2>
				</div>
			</div>

			<div class="presentation__links">
				<?php get_template_part( 'template-parts/presentation-links' ); ?>
			</div>
		</section><!-- /presentation -->

		<section class="right-side">
		
			<?php if ( get_post_type() === 'post' ) : ?>
			<section class="blog">
				<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<?php antoninolattene_post_thumbnail(); ?>
					<div class="article__description">
						<h3 class="project__title text-heading-5"><a rel="bookmark" href="<?php echo esc_url( get_permalink() )?>"><?php the_title() ?></a></h3>
						<small><?php antoninolattene_posted_on(); antoninolattene_posted_by();?></small>
						<ul class="chip-list">
							<?php $categories = get_the_category();
							if( $categories ): ?>
								<?php foreach( $categories as $category ): ?>
								<li>
									<!-- Get category without link -->
									<!-- <span class="chip chip__blog--category"><?php echo $category->cat_name . ' '; ?></span> -->
									<a class="chip chip__blog--category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
										<?php echo $category->name; ?>
									</a>
								</li>
								<?php endforeach; ?>
							<?php endif; ?>

							<?php $tags = get_the_tags(); if( $tags ): ?>
								<?php foreach( $tags as $tag ): ?>
								<li>
									<!-- Get tags without links  -->
									<!-- <span class="chip chip__blog--tags"><?php echo $tag->name; ?></span> -->
									<a class="chip chip__blog--tags" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
										<?php echo $tag->name; ?>
									</a>
								</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
						<p><?php the_excerpt(); ?></p>
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
