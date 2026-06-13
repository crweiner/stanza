<?php
/**
 * Title: Project detail content
 * Slug: stanza/project-detail-content
 * Categories: stanza
 * Description: Editable project description and external link cards for sub-project pages.
 *
 * @package Stanza
 */

$stanza_link_cards = array(
	array( __( 'GitHub', 'stanza' ), __( 'Source repository', 'stanza' ), __( 'View code and releases', 'stanza' ), __( 'Open GitHub →', 'stanza' ) ),
	array( __( 'Live project', 'stanza' ), __( 'Published work', 'stanza' ), __( 'Open the public version', 'stanza' ), __( 'Visit project →', 'stanza' ) ),
	array( __( 'Notes', 'stanza' ), __( 'Reference docs', 'stanza' ), __( 'Read background and decisions', 'stanza' ), __( 'Read notes →', 'stanza' ) ),
);
?>
<!-- wp:group {"backgroundColor":"surface","style":{"border":{"left":{"color":"var:preset|color|tag-sage","width":"4px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|120","right":"var:preset|spacing|120","bottom":"var:preset|spacing|120","left":"var:preset|spacing|120"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-left-color:var(--wp--preset--color--tag-sage);border-left-style:solid;border-left-width:4px;padding-top:var(--wp--preset--spacing--120);padding-right:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--120);padding-left:var(--wp--preset--spacing--120)">
	<!-- wp:paragraph {"textColor":"brand-accent","fontSize":"meta","fontFamily":"jetbrains-mono","style":{"typography":{"fontWeight":"700"}}} -->
	<p class="has-brand-accent-color has-text-color has-jetbrains-mono-font-family has-meta-font-size" style="font-weight:700">About this project</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"fontSize":"heading-4"} -->
	<h2 class="wp-block-heading has-heading-4-font-size">What I am building</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"secondary-text"} -->
	<p class="has-secondary-text-color has-text-color">Use this section for the project description: what it is, why it exists, what changed over time, and where someone should go next. Keep it direct and useful.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group">
		<?php foreach ( $stanza_link_cards as $stanza_card ) : list( $stanza_eyebrow, $stanza_title, $stanza_body, $stanza_link ) = $stanza_card; ?>
		<!-- wp:group {"className":"is-style-project-card","backgroundColor":"background","style":{"border":{"color":"var:preset|color|border","width":"1px","style":"solid","top":{"color":"var:preset|color|brand-accent","width":"4px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-project-card has-border-color has-background-background-color has-background" style="border-color:var(--wp--preset--color--border);border-style:solid;border-width:1px;border-top-color:var(--wp--preset--color--brand-accent);border-top-style:solid;border-top-width:4px;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">
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
			<p style="font-weight:700"><a href="#"><?php echo esc_html( $stanza_link ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
