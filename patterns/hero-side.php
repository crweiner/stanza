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
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|120"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--120)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|120"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1,"fontSize":"heading-1","style":{"typography":{"lineHeight":"1.2"}}} -->
			<h1 class="wp-block-heading has-heading-1-font-size" style="line-height:1.2">Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"secondary-text","fontSize":"lead","style":{"typography":{"fontWeight":"500","lineHeight":"1.45"}}} -->
			<p class="has-secondary-text-color has-text-color has-lead-font-size" style="font-weight:500;line-height:1.45">Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
			<!-- /wp:paragraph -->

			<!-- wp:stanza/subscribe-form {"anchor":"subscribe"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","aspectRatio":"1","scale":"cover"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
