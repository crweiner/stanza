<?php
/**
 * Title: Hero side by side
 * Slug: stanza/hero-side
 * Categories: stanza
 * Description: Split hero with text, subscribe form, and a square feature image.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","className":"st-hero st-hero-side st-wide","layout":{"type":"default"}} -->
<section class="wp-block-group st-hero st-hero-side st-wide">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1} -->
			<h1>Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<form id="subscribe" class="st-subscribe-input" action="/" method="get">
				<label class="screen-reader-text" for="stanza-side-email">Email address</label>
				<input id="stanza-side-email" type="email" name="email" placeholder="jamie@example.com" autocomplete="email" />
				<button type="submit">Subscribe</button>
			</form>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" alt=""/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
