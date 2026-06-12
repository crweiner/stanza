<?php
/**
 * Stanza v2 functions and definitions.
 *
 * CANONICAL SOURCE — copy verbatim into the theme root.
 * Everything styling-related here is either:
 *   (a) a block style variation registration, or
 *   (b) a per-block stylesheet enqueue (wp_enqueue_block_style → inlined on demand), or
 *   (c) a behavior filter ported from v1 (data/markup, not style).
 * There is NO global stylesheet enqueue beyond style.css (theme header + reported utilities).
 *
 * @package Stanza
 */

// ─────────────────────────────────────────────────────────────────────────────
// Theme supports
// ─────────────────────────────────────────────────────────────────────────────

if ( ! function_exists( 'stanza_setup' ) ) :
	function stanza_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	}
endif;
add_action( 'after_setup_theme', 'stanza_setup' );

// ─────────────────────────────────────────────────────────────────────────────
// Theme stylesheet (header + the few reported utilities only).
// ─────────────────────────────────────────────────────────────────────────────

function stanza_styles() {
	wp_enqueue_style( 'stanza-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'stanza_styles' );

// ─────────────────────────────────────────────────────────────────────────────
// Per-block stylesheets — one file per block type, inlined only when the block
// renders. NEVER add a monolithic stylesheet here.
// ─────────────────────────────────────────────────────────────────────────────

function stanza_block_style_sheet( $block, $path ) {
	wp_enqueue_block_style(
		$block,
		array(
			'handle' => 'stanza-' . str_replace( '/', '-', $block ),
			'src'    => get_theme_file_uri( $path ),
			'path'   => get_theme_file_path( $path ),
			'ver'    => wp_get_theme()->get( 'Version' ),
		)
	);
}

function stanza_block_styles() {
	stanza_block_style_sheet( 'core/navigation', 'assets/css/blocks/core-navigation.css' );
	stanza_block_style_sheet( 'core/post-terms', 'assets/css/blocks/core-post-terms.css' );
	stanza_block_style_sheet( 'core/group', 'assets/css/blocks/core-group.css' );
	stanza_block_style_sheet( 'core/post-content', 'assets/css/blocks/core-post-content.css' );
	stanza_block_style_sheet( 'core/search', 'assets/css/blocks/core-search.css' );
	stanza_block_style_sheet( 'core/post-comments-form', 'assets/css/blocks/core-post-comments-form.css' );
	stanza_block_style_sheet( 'core/post-title', 'assets/css/blocks/core-post-title.css' );
	stanza_block_style_sheet( 'core/loginout', 'assets/css/blocks/core-loginout.css' );
	stanza_block_style_sheet( 'core/paragraph', 'assets/css/blocks/core-paragraph.css' );
}
add_action( 'init', 'stanza_block_styles' );

// ─────────────────────────────────────────────────────────────────────────────
// Block style variations. CSS for each lives in the matching per-block file.
// ─────────────────────────────────────────────────────────────────────────────

function stanza_register_block_styles() {
	// Feed card: image-right two-column card (feed-classic pattern).
	register_block_style( 'core/group', array(
		'name'  => 'card-classic',
		'label' => __( 'Classic card', 'stanza' ),
	) );

	// Project card: surface panel, accent top border, hover lift.
	register_block_style( 'core/group', array(
		'name'  => 'project-card',
		'label' => __( 'Project card', 'stanza' ),
	) );

	// Kicker: small accent pill label (projects index, style guide).
	register_block_style( 'core/paragraph', array(
		'name'  => 'kicker',
		'label' => __( 'Kicker', 'stanza' ),
	) );

	// Search: pill input + embedded button.
	register_block_style( 'core/search', array(
		'name'  => 'pill',
		'label' => __( 'Pill', 'stanza' ),
	) );
}
add_action( 'init', 'stanza_register_block_styles' );

// NOTE: button "outline" and "secondary" variations are defined in theme.json
// (styles.blocks.core/button.variations) — no CSS, no registration needed here.

// ─────────────────────────────────────────────────────────────────────────────
// Custom blocks (build-less; block.json + render.php + Interactivity API).
// ─────────────────────────────────────────────────────────────────────────────

function stanza_register_blocks() {
	foreach ( array( 'color-mode-toggle', 'subscribe-form', 'parallax-card', 'nav-drawer' ) as $block ) {
		register_block_type( get_theme_file_path( "blocks/{$block}" ) );
	}
}
add_action( 'init', 'stanza_register_blocks' );

// ─────────────────────────────────────────────────────────────────────────────
// Color mode pre-paint bootstrap. Pairs with blocks/color-mode-toggle and the
// light-dark() palette in theme.json. No classes, no variable rewriting —
// setting color-scheme is the entire mechanism. See blueprint/04-color-modes.md.
// ─────────────────────────────────────────────────────────────────────────────

function stanza_color_mode_bootstrap() {
	?>
	<script>
	try{var m=localStorage.getItem("stanza-color-mode");if(m==="light"||m==="dark"){document.documentElement.style.colorScheme=m;}}catch(e){}
	</script>
	<?php
}
add_action( 'wp_head', 'stanza_color_mode_bootstrap', 0 );

// ─────────────────────────────────────────────────────────────────────────────
// Pattern category.
// ─────────────────────────────────────────────────────────────────────────────

function stanza_pattern_categories() {
	register_block_pattern_category( 'stanza', array(
		'label' => __( 'Stanza', 'stanza' ),
	) );
}
add_action( 'init', 'stanza_pattern_categories' );

// ─────────────────────────────────────────────────────────────────────────────
// Behavior filters ported from v1 (markup/data — not style). Class prefix
// renamed st- → stanza-; the matching CSS lives in per-block files.
// ─────────────────────────────────────────────────────────────────────────────

/**
 * Add stanza-category-{slug} classes to category links so the per-term accent
 * map in assets/css/blocks/core-post-terms.css works with pretty and plain
 * permalinks alike.
 */
function stanza_category_link_classes( $links ) {
	foreach ( $links as &$link ) {
		if ( preg_match( '/category\/([^\/"]+)\//', $link, $m ) || preg_match( '/cat=(\d+)[^"]*"[^>]*>([^<]+)</', $link, $m ) ) {
			$slug = sanitize_html_class( strtolower( $m[1] ) );
			$link = str_replace( '<a ', '<a class="stanza-category-' . esc_attr( $slug ) . '" ', $link );
		}
	}
	return $links;
}
add_filter( 'term_links-category', 'stanza_category_link_classes' );

/**
 * Let a Query Loop filter by category slug via the block's "stanzaCategorySlug"
 * attribute (used by the project-posts pattern).
 */
function stanza_query_loop_category( $query, $block ) {
	if ( ! empty( $block->context['query']['stanzaCategorySlug'] ) ) {
		$query['category_name'] = sanitize_title( $block->context['query']['stanzaCategorySlug'] );
	}
	return $query;
}
add_filter( 'query_loop_block_query_vars', 'stanza_query_loop_category', 10, 2 );

/**
 * Multipage post navigation markup (wp_link_pages), styled by
 * assets/css/blocks/core-post-content.css.
 */
function stanza_link_pages_args( $args ) {
	$args['before']      = '<nav class="stanza-page-links" aria-label="' . esc_attr__( 'Page', 'stanza' ) . '"><span class="stanza-page-links-label">' . esc_html__( 'Pages', 'stanza' ) . '</span>';
	$args['after']       = '</nav>';
	$args['link_before'] = '<span class="stanza-page-link">';
	$args['link_after']  = '</span>';
	return $args;
}
add_filter( 'wp_link_pages_args', 'stanza_link_pages_args' );

/**
 * MailPoet form id used by the stanza/subscribe-form block's plugin slot
 * (see blocks/subscribe-form/render.php). Site owners set it via:
 *   add_filter( 'stanza_mailpoet_form_id', fn() => 3 );
 * or hook 'stanza_subscribe_form_html' to supply arbitrary provider markup.
 */
