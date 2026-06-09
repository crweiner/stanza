<?php
/**
 * Title: Feed typographic
 * Slug: stanza/feed-typographic
 * Categories: stanza, query
 * Block Types: core/query
 * Description: Image-free feed that makes titles and excerpts the primary design element.
 *
 * @package Stanza
 */

?>
<!-- wp:query {"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"st-feed st-feed-typographic st-wide"} -->
<div class="wp-block-query st-feed st-feed-typographic st-wide">
	<!-- wp:post-template -->
		<!-- wp:group {"tagName":"article","className":"st-card st-card-typographic","layout":{"type":"default"}} -->
		<article class="wp-block-group st-card st-card-typographic">
			<!-- wp:post-title {"isLink":true} /-->
			<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":32} /-->
			<!-- wp:group {"className":"st-card-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group st-card-meta">
				<!-- wp:post-date {"isLink":true} /-->
				<!-- wp:post-terms {"term":"category"} /-->
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
