<?php
/**
 * Title: Feed classic
 * Slug: stanza/feed-classic
 * Categories: stanza, query
 * Block Types: core/query
 * Description: Large editorial post cards with feature images and compact metadata.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|120"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--120)">
	<!-- wp:query {"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|160"}}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|200"}},"layout":{"type":"default"}} -->
			<!-- wp:group {"tagName":"article","className":"is-style-card-classic","layout":{"type":"default"}} -->
			<article class="wp-block-group is-style-card-classic">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<!-- wp:post-title {"isLink":true,"fontSize":"heading-2"} /-->

					<!-- wp:group {"textColor":"tertiary-text","fontSize":"meta","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group has-tertiary-text-color has-text-color has-meta-font-size">
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
</section>
<!-- /wp:group -->
