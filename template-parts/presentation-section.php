<?php
/**
 * Reusable template part for the main "presentation" section.
 *
 * This component is used across various pages (front-page, archives, singles)
 * to display a consistent hero section, customized via arguments.
 *
 * @package antoninolattene
 *
 * @var array $args {
 *     @type string $title                    The main H1 title content.
 *     @type string $description              The H2 description content.
 *     @type bool   $show_breadcrumbs         (Optional) Whether to display breadcrumbs. Default true.
 * }
 */

$title                    = $args['title'] ?? '';
$description              = $args['description'] ?? '';
$show_breadcrumbs         = $args['show_breadcrumbs'] ?? true;

?>
<section class="presentation">
	<div class="presentation__central">
		<div class="presentation__description">
			<?php
			// Define the allowed HTML tags and attributes for the description.
			// This is a more secure and explicit way to allow specific classes than disabling sanitization.
			$allowed_html = array(
				'strong' => array(
				'class' => array(),
				),
				'br'     => array(),
			);
			?>
			<h2 class="text-md-body-1 fw-regular"><?php echo wp_kses( $description, $allowed_html ); ?></h2>
		</div>
		<div class="presentation__headlines">
			<h1 class="text-heading-1 text-gradient margin-block-100"><?php echo wp_kses( $title, $allowed_html ); ?></h1>
		</div>
		<div class="presentation__taxonomy">
			<?php get_template_part( 'template-parts/archive-context-label' ); ?>
		</div>
		<?php if ( $show_breadcrumbs ) { get_template_part( 'template-parts/breadcrumbs' ); } ?>
	</div>
	<?php get_template_part( 'template-parts/scroll-indicator' ); ?>
</section>