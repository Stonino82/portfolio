<?php
/**
 * Template part for displaying portfolio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>

<section class="presentation padding-600 opacityOnScroll ">
	<div class="presentation__central">
		<?php get_template_part( 'navigation' ); ?>
		<div class="presentation__headlines margin-block-900">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title fs-primary-heading fw-bold tt-up tc-neutral-700">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title fs-primary-heading fw-bold tt-up tc-neutral-700"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
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
			<h2 class="fs-secondary-heading fw-regular tc-primary margin-0"><?php echo get_secondary_title(); ?></h2>
		</div>
	</div>
	<div class="presentation__links">
		<ul class="presentation__icons margin-block-500">
			<li class="presentation__icons--item margin-inline-200"><a href="http://dribbble.com/antoninolattene" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://www.behance.net/antoninolattene" target="blank"><span class="icon fab fa-behance"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://github.com/Stonino82" target="blank"><span class="icon fab fa-github"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://www.linkedin.com/in/antoninolattene/" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li>
		</ul>
		<div class="presentation__resume">
			<a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2023/10/CV-Brochure-Antonino-Lattene-UX-UI-Front-End-1.jpg">
				<span class="btn--text">Brochure</span>
				<span class="btn--icon">
					<i class="fas fa-arrow-alt-circle-down"></i>
					<i class="fa fa-check"></i>
				</span>
			</a>
			<a class="btn btn--home btn__secondary fs-btn" download href="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/03/CV-Resume-Antonino-Lattene-UX-UI-Front-End.pdf">
			
				<span class="btn--text">Resume</span>
				<span class="btn--icon">
					<i class="fas fa-arrow-alt-circle-down"></i>
					<i class="fa fa-check"></i>
				</span>
			</a>
			<a class="btn btn--home btn__primary fs-btn" href="mailto:antoninolattene@gmail.com" role="btn" rel="noopener noreferrer">
				<span class="btn--text">email me</span>
				<span class="btn--icon">
					<i class="fa fa-paper-plane"></i>
					<i class="fa fa-check"></i>
				</span>
			</a>
		</div>
	</div>
</section><!-- /presentation -->

<section class="portfolio">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<header class="entry-header"></header><!-- .entry-header -->

		<div class="thumbnail">			
			<?php antoninolattene_post_thumbnail(); ?>
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