<?php
/**
 * Title: Hero typographic profile
 * Slug: stanza/hero-typographic
 * Categories: stanza
 * Description: Stacked profile image hero with large personal introduction.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","className":"st-hero st-hero-typographic st-wide","layout":{"type":"default"}} -->
<section class="wp-block-group st-hero st-hero-typographic st-wide">
	<!-- wp:image {"width":"104px","height":"104px","sizeSlug":"full","linkDestination":"none","className":"st-hero-avatar"} -->
	<figure class="wp-block-image size-full is-resized st-hero-avatar"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" alt="" style="width:104px;height:104px"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"level":1} -->
	<h1>Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
	<!-- /wp:paragraph -->

	<!-- wp:html -->
	<form id="subscribe" class="st-subscribe-input" action="/" method="get">
		<label class="screen-reader-text" for="stanza-profile-email">Email address</label>
		<input id="stanza-profile-email" type="email" name="email" placeholder="jamie@example.com" autocomplete="email" />
		<button type="submit">Subscribe</button>
	</form>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->
