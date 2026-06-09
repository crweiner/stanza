<?php
/**
 * Title: Hero background
 * Slug: stanza/hero-background
 * Categories: stanza
 * Description: Full-bleed photo hero with a single-author introduction and subscribe form.
 *
 * @package Stanza
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>","dimRatio":40,"overlayColor":"foreground","minHeight":760,"minHeightUnit":"px","className":"st-hero st-hero-background","layout":{"type":"constrained","contentSize":"1440px"}} -->
<div class="wp-block-cover st-hero st-hero-background" style="min-height:760px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"className":"st-hero-content","layout":{"type":"default"}} -->
	<div class="wp-block-group st-hero-content">
		<!-- wp:heading {"level":1} -->
		<h1>Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
		<!-- /wp:paragraph -->

		<!-- wp:html -->
		<form id="subscribe" class="st-subscribe-input" action="/" method="get">
			<label class="screen-reader-text" for="stanza-hero-email">Email address</label>
			<input id="stanza-hero-email" type="email" name="email" placeholder="jamie@example.com" autocomplete="email" />
			<button type="submit">Subscribe</button>
		</form>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
