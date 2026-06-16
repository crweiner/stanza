<?php
/**
 * Title: Feed parallax
 * Slug: stanza/feed-parallax
 * Categories: stanza, query
 * Block Types: core/query
 * Description: Full-width image-backed post cards for a more immersive home page.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|120"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--120)">
	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|160"}}} -->
	<div class="wp-block-query alignfull">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|200"}},"layout":{"type":"default"}} -->
			<!-- wp:stanza/parallax-card /-->
		<!-- /wp:post-template -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:query-pagination {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
				<!-- wp:query-pagination-previous {"label":"← Newer"} /-->
				<!-- wp:query-pagination-numbers /-->
				<!-- wp:query-pagination-next {"label":"Older →"} /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:group -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p>No posts were found.</p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
