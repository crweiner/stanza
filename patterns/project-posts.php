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
<!-- wp:group {"tagName":"section","style":{"border":{"top":{"color":"var:preset|color|border","width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|200"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group" style="border-top-color:var(--wp--preset--color--border);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--200)">
	<!-- wp:paragraph {"align":"wide","textColor":"brand-accent","fontSize":"meta","fontFamily":"jetbrains-mono","style":{"typography":{"fontWeight":"700"}}} -->
	<p class="alignwide has-brand-accent-color has-text-color has-jetbrains-mono-font-family has-meta-font-size" style="font-weight:700">Project notes</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"align":"wide","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading alignwide has-heading-2-font-size">Posts from Projects</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"wide","textColor":"secondary-text"} -->
	<p class="alignwide has-secondary-text-color has-text-color">Recent writing filed under the Projects category.</p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"stanzaCategorySlug":"projects"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|160"}}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|200"}},"layout":{"type":"default"}} -->
			<!-- wp:group {"tagName":"article","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"1200px","justifyContent":"left"}} -->
			<article class="wp-block-group">
				<!-- wp:post-title {"isLink":true,"fontSize":"heading-1"} /-->
				<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":28,"textColor":"secondary-text","fontSize":"lead"} /-->

				<!-- wp:group {"textColor":"tertiary-text","fontSize":"meta","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group has-tertiary-text-color has-text-color has-meta-font-size">
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
			<p>No project posts were found.</p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
