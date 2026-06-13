<?php
/**
 * Title: Project index
 * Slug: stanza/project-index
 * Categories: stanza
 * Description: Grid of project cards for a main Projects page.
 *
 * @package Stanza
 */

$stanza_project_cards = array(
	array( 'brand-accent', __( 'Theme system', 'stanza' ), __( 'Stanza for WordPress', 'stanza' ), __( 'A block-first publishing theme built around large type, a calm canvas, and portable patterns for personal sites.', 'stanza' ) ),
	array( 'tag-clay', __( 'Members', 'stanza' ), __( 'Membership experiments', 'stanza' ), __( 'A project space for subscriber offers, private updates, launches, and paid-community writing.', 'stanza' ) ),
	array( 'tag-mustard', __( 'Reading', 'stanza' ), __( 'Reading system', 'stanza' ), __( 'A running index for books, references, reading notes, and source material behind longer essays.', 'stanza' ) ),
	array( 'tag-sage', __( 'Evergreen', 'stanza' ), __( 'Field notes archive', 'stanza' ), __( 'A long-running project collecting essays, notes, and reference posts that stay useful after the week they were published.', 'stanza' ) ),
	array( 'tag-petrol', __( 'Media', 'stanza' ), __( 'Photography index', 'stanza' ), __( 'A visual archive for travel, process, and image-led writing, organized as a project rather than a chronological feed.', 'stanza' ) ),
	array( 'tag-plum', __( 'Notes', 'stanza' ), __( 'Personal log', 'stanza' ), __( 'A quieter project for short updates, process notes, small discoveries, and personal publishing rituals.', 'stanza' ) ),
);
?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|200"},"blockGap":"var:preset|spacing|80"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--200)">
	<!-- wp:paragraph {"align":"wide","textColor":"secondary-text"} -->
	<p class="alignwide has-secondary-text-color has-text-color">A working shelf for projects, tools, experiments, and evergreen bodies of work. Each card can point to a dedicated sub-project page.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $stanza_project_cards as $stanza_card ) : list( $stanza_accent, $stanza_eyebrow, $stanza_title, $stanza_body ) = $stanza_card; ?>
		<!-- wp:group {"tagName":"article","className":"is-style-project-card","backgroundColor":"surface","style":{"border":{"top":{"color":"var:preset|color|<?php echo esc_attr( $stanza_accent ); ?>","width":"4px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"layout":{"type":"default"}} -->
		<article class="wp-block-group is-style-project-card has-surface-background-color has-background" style="border-top-color:var(--wp--preset--color--<?php echo esc_attr( $stanza_accent ); ?>);border-top-style:solid;border-top-width:4px;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">
			<!-- wp:paragraph {"textColor":"brand-accent","fontSize":"meta","fontFamily":"jetbrains-mono","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-brand-accent-color has-text-color has-jetbrains-mono-font-family has-meta-font-size" style="font-weight:700"><?php echo esc_html( $stanza_eyebrow ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"heading-4"} -->
			<h3 class="wp-block-heading has-heading-4-font-size"><?php echo esc_html( $stanza_title ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"secondary-text"} -->
			<p class="has-secondary-text-color has-text-color"><?php echo esc_html( $stanza_body ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
			<p style="font-weight:700"><a href="#"><?php esc_html_e( 'View project →', 'stanza' ); ?></a></p>
			<!-- /wp:paragraph -->
		</article>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
