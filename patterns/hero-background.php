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
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>","dimRatio":100,"gradient":"hero-scrim","focalPoint":{"x":0.5,"y":0.3},"minHeight":90,"minHeightUnit":"vh","contentPosition":"bottom left","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|200","bottom":"var:preset|spacing|160","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1440px","justifyContent":"left"}} -->
<div class="wp-block-cover alignfull is-position-bottom-left" style="padding-top:var(--wp--preset--spacing--200);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--160);padding-left:var(--wp--preset--spacing--60);min-height:90vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-hero-scrim-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/stanza-hero.jpg' ) ); ?>" style="object-position:50% 30%" data-object-fit="cover" data-object-position="50% 30%"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":1,"textColor":"white","fontSize":"heading-1","style":{"typography":{"lineHeight":"1.2"}}} -->
		<h1 class="wp-block-heading has-white-color has-text-color has-heading-1-font-size" style="line-height:1.2">Hey there. I’m Stanza, a minimal personal WordPress theme</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"lead","style":{"typography":{"fontWeight":"500","lineHeight":"1.45"},"color":{"text":"rgba(255,255,255,0.74)"}}} -->
		<p class="has-text-color has-lead-font-size" style="color:rgba(255,255,255,0.74);font-weight:500;line-height:1.45">Showcase your work to your growing audience. Readers can subscribe below to receive the latest posts directly in their inbox.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:stanza/subscribe-form {"anchor":"subscribe"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
