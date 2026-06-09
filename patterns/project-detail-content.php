<?php
/**
 * Title: Project detail content
 * Slug: stanza/project-detail-content
 * Categories: stanza
 * Description: Editable project description and external link cards for sub-project pages.
 *
 * @package Stanza
 */

?>
<!-- wp:group {"className":"st-project-content-panel","layout":{"type":"default"}} -->
<div class="wp-block-group st-project-content-panel">
	<!-- wp:paragraph {"className":"st-project-eyebrow"} -->
	<p class="st-project-eyebrow">About this project</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2} -->
	<h2>What I am building</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Use this section for the project description: what it is, why it exists, what changed over time, and where someone should go next. Keep it direct and useful.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"st-project-link-grid","layout":{"type":"default"}} -->
	<div class="wp-block-group st-project-link-grid">
		<!-- wp:group {"className":"st-project-link-card","layout":{"type":"default"}} -->
		<div class="wp-block-group st-project-link-card">
			<!-- wp:paragraph {"className":"st-project-eyebrow"} -->
			<p class="st-project-eyebrow">GitHub</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Source repository</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>View code and releases</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"st-project-card-link"} -->
			<p class="st-project-card-link"><a href="#">Open GitHub &rarr;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"st-project-link-card","layout":{"type":"default"}} -->
		<div class="wp-block-group st-project-link-card">
			<!-- wp:paragraph {"className":"st-project-eyebrow"} -->
			<p class="st-project-eyebrow">Live project</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Published work</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Open the public version</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"st-project-card-link"} -->
			<p class="st-project-card-link"><a href="#">Visit project &rarr;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"st-project-link-card","layout":{"type":"default"}} -->
		<div class="wp-block-group st-project-link-card">
			<!-- wp:paragraph {"className":"st-project-eyebrow"} -->
			<p class="st-project-eyebrow">Notes</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Reference docs</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Read background and decisions</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"st-project-card-link"} -->
			<p class="st-project-card-link"><a href="#">Read notes &rarr;</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
