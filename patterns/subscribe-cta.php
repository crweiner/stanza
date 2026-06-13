<?php
/**
 * Title: Subscribe CTA
 * Slug: stanza/subscribe-cta
 * Categories: stanza, call-to-action
 * Description: Large subscription panel for post endings and pages.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","anchor":"subscribe","align":"wide","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|160","right":"var:preset|spacing|160","bottom":"var:preset|spacing|160","left":"var:preset|spacing|160"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
<section id="subscribe" class="wp-block-group alignwide has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--160);padding-right:var(--wp--preset--spacing--160);padding-bottom:var(--wp--preset--spacing--160);padding-left:var(--wp--preset--spacing--160)">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Get the next essay in your inbox</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"secondary-text"} -->
	<p class="has-secondary-text-color has-text-color">Join the list for new writing, notes, and member updates.</p>
	<!-- /wp:paragraph -->

	<!-- wp:stanza/subscribe-form /-->
</section>
<!-- /wp:group -->
