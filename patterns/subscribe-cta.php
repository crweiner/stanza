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
<!-- wp:group {"tagName":"section","className":"st-cta","layout":{"type":"default"}} -->
<section id="subscribe" class="wp-block-group st-cta">
	<!-- wp:heading {"level":3} -->
	<h3>Get the next essay in your inbox</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Join the list for new writing, notes, and member updates.</p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<form class="st-subscribe-input" action="/" method="get">
		<label class="screen-reader-text" for="stanza-cta-email">Email address</label>
		<input id="stanza-cta-email" type="email" name="email" placeholder="jamie@example.com" autocomplete="email" />
		<button type="submit">Subscribe</button>
	</form>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->
