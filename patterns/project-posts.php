<?php
/**
 * Title: Project posts
 * Slug: stanza/project-posts
 * Categories: stanza, query
 * Block Types: core/query
 * Description: Related posts from the Projects category with pagination.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","className":"st-project-posts st-wide","layout":{"type":"default"}} -->
<section class="wp-block-group st-project-posts st-wide">
	<!-- wp:paragraph {"className":"st-project-eyebrow"} -->
	<p class="st-project-eyebrow">Project notes</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2} -->
	<h2>Posts from Projects</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Recent writing filed under the Projects category.</p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"stanzaCategorySlug":"projects"},"className":"st-feed st-feed-typographic st-project-posts-query"} -->
	<div class="wp-block-query st-feed st-feed-typographic st-project-posts-query">
		<!-- wp:post-template -->
			<!-- wp:group {"tagName":"article","className":"st-card st-card-typographic","layout":{"type":"default"}} -->
			<article class="wp-block-group st-card st-card-typographic">
				<!-- wp:post-title {"isLink":true} /-->
				<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":28} /-->
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
			<!-- wp:query-pagination-previous {"label":"\u2190 Newer"} /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next {"label":"Older \u2192"} /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p>No project posts were found.</p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
