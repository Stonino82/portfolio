<?php
/**
 * Template part for displaying portfolio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>

<section class="presentation opacityOnScroll ">
	<div class="presentation__header">
		<?php get_template_part( 'template-parts/logo' ); ?>
	</div>

	<div class="presentation__central">
		<div class="presentation__headlines">
			<ul class="chip-list">
					<li>
						<span class="chip chip__portfolio--category"><i class="fa-solid fa-folder-open"></i>Portfolio</span>
					</li>
				</ul>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="text-heading-1 text-gradient margin-block-100">', '</h1>' );
			else :
				the_title( '<h1 class="text-heading-1 text-gradient margin-block-100"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
	
			if ( 'post' === get_post_type() ) :
				?>
				<!-- <div class="entry-meta">
					<?php
					antoninolattene_posted_on();
					antoninolattene_posted_by();
					?>
				</div> -->
			<?php endif; ?>
		</div>
		<div class="presentation__description">
			<h2 class="text-md-body-1 fw-regular"><?php echo get_secondary_title(); ?></h2>
		</div>
	</div>

	<div class="presentation__links">
		<?php get_template_part( 'template-parts/presentation-links' ); ?>
	</div>
</section><!-- /presentation -->

<section class="right-side">

	<section class="portfolio">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<header class="entry-header"></header><!-- .entry-header -->

			<div class="thumbnail">			
				<?php antoninolattene_post_thumbnail(); ?>
				<ul class="chip-list">
					<?php $categories = get_the_terms( $post->ID, 'portfolio_category' );
					if( $categories ): ?>
						<?php foreach( $categories as $category ): ?>
						<li>
							<!-- Get category without link -->
							<!-- <span class="chip chip__portfolio--category"><?php echo $category->name; ?></span> -->
							<a class="chip chip__portfolio--category" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
								<?php echo $category->name; ?>
							</a>
						</li>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php $tags = get_the_terms( get_the_ID(), 'portfolio_tag' ); if( $tags ): ?>
						<?php foreach( $tags as $tag ): ?>
						<li>
							<!-- Get tags without links  -->
							<!-- <span class="chip chip__portfolio--tags"><?php echo $tag->name; ?></span> -->
							<a class="chip chip__portfolio--tags" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
								<?php echo $tag->name; ?>
							</a>
						</li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>

			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'antoninolattene' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'antoninolattene' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<!-- <footer class="entry-footer">
				<?php antoninolattene_entry_footer(); ?>
			</footer> -->

		</article><!-- #post-<?php the_ID(); ?> -->
	</section><!-- /portfolio -->

	<?php get_footer(); ?>
</section>