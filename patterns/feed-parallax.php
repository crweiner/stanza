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
<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"st-feed st-feed-parallax"} -->
<div class="wp-block-query st-feed st-feed-parallax">
	<!-- wp:post-template -->
		<!-- wp:group {"tagName":"article","className":"st-card st-card-parallax","layout":{"type":"default"}} -->
		<article class="wp-block-group st-card st-card-parallax">
			<!-- wp:post-featured-image {"isLink":true} /-->

			<!-- wp:group {"className":"st-card-body","layout":{"type":"default"}} -->
			<div class="wp-block-group st-card-body">
				<!-- wp:post-title {"isLink":true} /-->
				<!-- wp:group {"className":"st-card-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group st-card-meta">
					<!-- wp:post-date {"isLink":true} /-->
					<!-- wp:post-terms {"term":"category"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous {"label":"← Newer"} /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next {"label":"Older →"} /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p>No posts were found.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
