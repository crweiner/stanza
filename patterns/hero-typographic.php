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
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|200"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--200)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:image {"width":"104px","height":"104px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
		<figure class="wp-block-image size-full is-resized has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" alt="" style="border-radius:50%;width:104px;height:104px"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":1,"fontSize":"heading-1","style":{"typography":{"lineHeight":"1.2"}}} -->
		<h1 class="wp-block-heading has-heading-1-font-size" style="line-height:1.2">Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"secondary-text","fontSize":"lead","style":{"typography":{"fontWeight":"500","lineHeight":"1.45"}}} -->
		<p class="has-secondary-text-color has-text-color has-lead-font-size" style="font-weight:500;line-height:1.45">Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
		<!-- /wp:paragraph -->

		<!-- wp:stanza/subscribe-form {"anchor":"subscribe"} /-->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
