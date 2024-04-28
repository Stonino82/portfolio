<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>

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
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title fs-primary-heading fw-bold margin-0">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title fs-primary-heading fw-bold margin-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
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
			<h2 class="fs-secondary-heading fw-regular margin-0"><?php echo get_secondary_title(); ?></h2>
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

<section class="blog">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<header class="entry-header"></header><!-- .entry-header -->

		<div class="thumbnail">			
			<?php antoninolattene_post_thumbnail(); ?>
			<ul class="chip-list">
				<?php $categories = get_the_category();
				if( $categories ): ?>
					<?php foreach( $categories as $category ): ?>
					<li>
						<!-- Get category without link -->
						<span class="chip chip__category"><?php echo $category->cat_name . ' '; ?></span>
					</li>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php $tags = get_the_tags(); if( $tags ): ?>
					<?php foreach( $tags as $tag ): ?>
					<li>
						<!-- Get tags without links  -->
						<span class="chip chip__tags"><?php echo $tag->name; ?></span>
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
</section><!-- /blog -->