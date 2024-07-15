<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package antoninolattene
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="logo">
			<img class="" src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2024/04/Logo-UX-UI-Desginer-Antonino-Lattene.svg" alt="logo UX UI designer Barcelona"/>
			<div>
				<span>tony.</span>
				<span>PRODUCT DESIGNER</span>
			</div>
		</div>
		<ul class="presentation__icons">
			<li class="presentation__icons--item margin-inline-200"><a href="http://dribbble.com/antoninolattene" target="blank"><span class="icon fab fa-dribbble"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://www.behance.net/antoninolattene" target="blank"><span class="icon fab fa-behance"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://github.com/Stonino82" target="blank"><span class="icon fab fa-github"></span></a></li>
			<li class="presentation__icons--item margin-inline-200"><a href="http://www.linkedin.com/in/antoninolattene/" target="blank"><span class="icon fab fa-linkedin-in"></span></a></li>
		</ul>
		<div class="site-info">
			<small class="tc-neutral-500">antoninolattene@gmail.com ©<?PHP echo date("Y"); ?></small>
			<small class="tc-neutral-500">made with <i class="fas fa-heart" title="Love"></i></small>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
