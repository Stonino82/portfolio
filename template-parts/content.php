<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package antoninolattene
 */

?>
<div class="container">

	<section class="presentation opacityOnScroll">

		<div class="presentation__navbar">
			<a class="presentation__link-home" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" data-aos="fade-down" data-aos-duration="400" data-aos-delay="800" data-aos-once="true" data-aos-offset="0"><span class="icon fas fa-angle-left"></span>Portfolio</a>
			<div class="presentation__tag" data-aos="fade-down" data-aos-duration="400" data-aos-delay="700" data-aos-once="true" data-aos-offset="0"><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', "" );?></div>
		</div>

		<div class="presentation__central">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					antoninolattene_posted_on();
					antoninolattene_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<h2 data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" data-aos-once="true"><?php echo get_secondary_title(); ?></h2>
		</div>

	</section><!-- /presentation -->

	<section class="portfolio">

		<article id="post-<?php the_ID(); ?>" <?php post_class("case-study__article"); ?> >
			<header class="entry-header">
				
			</header><!-- .entry-header -->

			<?php antoninolattene_post_thumbnail(); ?>

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

			<footer class="entry-footer">
				<?php antoninolattene_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		</article><!-- #post-<?php the_ID(); ?> -->

		<footer class="footer__inner">
            <p>Antonino Lattene © 2020 - Made with <i class="fas fa-heart" title="Love"></i></p>
            <p><em>antoninolattene@gmail.com</em></p>
        </footer>

	</section><!-- /portfolio -->

</div><!-- /container -->
