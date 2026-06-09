<?php
/**
 * Stanza functions and definitions.
 *
 * @package Stanza
 */

if ( ! function_exists( 'stanza_setup' ) ) :
	/**
	 * Sets up theme defaults.
	 *
	 * @return void
	 */
	function stanza_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
	}
endif;
add_action( 'after_setup_theme', 'stanza_setup' );

if ( ! function_exists( 'stanza_enqueue_assets' ) ) :
	/**
	 * Enqueues front-end assets.
	 *
	 * @return void
	 */
	function stanza_enqueue_assets() {
		$theme = wp_get_theme();

		wp_enqueue_style(
			'stanza-style',
			get_stylesheet_uri(),
			array(),
			$theme->get( 'Version' )
		);

		wp_style_add_data(
			'stanza-style',
			'path',
			get_stylesheet_directory() . '/style.css'
		);

		wp_enqueue_script(
			'stanza-color-mode',
			get_theme_file_uri( 'assets/js/color-mode.js' ),
			array(),
			$theme->get( 'Version' ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'stanza_enqueue_assets' );

if ( ! function_exists( 'stanza_print_color_mode_bootstrap' ) ) :
	/**
	 * Prints a small head script so dark mode resolves before first paint.
	 *
	 * @return void
	 */
	function stanza_print_color_mode_bootstrap() {
		$script = "(function(){try{var s=localStorage.getItem('stanza-color-mode');var d=s==='dark'||(!s&&window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches);document.documentElement.classList.toggle('has-light-text',d);document.documentElement.style.setProperty('--background-color',d?'#15171a':'#ffffff');}catch(e){}})();";

		if ( function_exists( 'wp_print_inline_script_tag' ) ) {
			wp_print_inline_script_tag( $script );
			return;
		}

		printf( '<script>%s</script>', $script ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;
add_action( 'wp_head', 'stanza_print_color_mode_bootstrap', 0 );

if ( ! function_exists( 'stanza_render_multipage_content_links' ) ) :
	/**
	 * Appends links for posts split with the Next Page block/comment.
	 *
	 * @param string $block_content The rendered Post Content block.
	 * @return string
	 */
	function stanza_render_multipage_content_links( $block_content ) {
		if ( is_admin() || is_feed() || ! is_singular() || ! in_the_loop() ) {
			return $block_content;
		}

		$page_links = wp_link_pages(
			array(
				'before'      => '<nav class="st-page-links" aria-label="' . esc_attr__( 'Post pages', 'stanza' ) . '"><span class="st-page-links__label">' . esc_html__( 'Pages:', 'stanza' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="st-page-links__item">',
				'link_after'  => '</span>',
				'echo'        => 0,
			)
		);

		return $block_content . $page_links;
	}
endif;
add_filter( 'render_block_core/post-content', 'stanza_render_multipage_content_links' );

if ( ! function_exists( 'stanza_add_category_link_classes' ) ) :
	/**
	 * Adds stable category slug classes to category term links.
	 *
	 * @param string[] $links Category term links.
	 * @return string[]
	 */
	function stanza_add_category_link_classes( $links ) {
		if ( ! is_array( $links ) || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
			return $links;
		}

		static $categories = null;

		if ( null === $categories ) {
			$categories = get_terms(
				array(
					'taxonomy'   => 'category',
					'hide_empty' => false,
				)
			);

			if ( is_wp_error( $categories ) ) {
				$categories = array();
			}
		}

		foreach ( $links as $index => $link ) {
			$term = stanza_get_category_from_link( $link, $categories );

			if ( ! $term ) {
				continue;
			}

			$processor = new WP_HTML_Tag_Processor( $link );

			if ( $processor->next_tag( 'a' ) ) {
				$processor->add_class( 'st-category-term' );
				$processor->add_class( 'st-category-' . sanitize_html_class( $term->slug ) );
				$links[ $index ] = $processor->get_updated_html();
			}
		}

		return $links;
	}
endif;
add_filter( 'term_links-category', 'stanza_add_category_link_classes' );

if ( ! function_exists( 'stanza_filter_project_posts_query' ) ) :
	/**
	 * Limits Project Posts query-loop patterns to the Projects category.
	 *
	 * @param array    $query Query arguments prepared for WP_Query.
	 * @param WP_Block $block Query block instance.
	 * @return array
	 */
	function stanza_filter_project_posts_query( $query, $block ) {
		if ( ! is_array( $query ) || ! is_object( $block ) || empty( $block->context ) || ! is_array( $block->context ) ) {
			return $query;
		}

		$category_slug = $block->context['query']['stanzaCategorySlug'] ?? '';

		if ( 'projects' !== $category_slug ) {
			return $query;
		}

		$query['category_name'] = 'projects';

		return $query;
	}
endif;
add_filter( 'query_loop_block_query_vars', 'stanza_filter_project_posts_query', 10, 2 );

if ( ! function_exists( 'stanza_get_category_from_link' ) ) :
	/**
	 * Matches a rendered category link back to its term object.
	 *
	 * @param string    $link       Rendered category link.
	 * @param WP_Term[] $categories Category terms.
	 * @return WP_Term|null
	 */
	function stanza_get_category_from_link( $link, $categories ) {
		if ( ! is_array( $categories ) ) {
			return null;
		}

		$normalized_link = html_entity_decode( $link, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$link_text       = trim( wp_strip_all_tags( $link ) );

		foreach ( $categories as $category ) {
			if ( ! $category instanceof WP_Term ) {
				continue;
			}

			if (
				preg_match( '/[?&]cat=' . preg_quote( (string) $category->term_id, '/' ) . '(?:[&#]|$)/', $normalized_link )
				|| preg_match( '#/category/' . preg_quote( $category->slug, '#' ) . '(?:/|$)#', $normalized_link )
				|| $link_text === $category->name
			) {
				return $category;
			}
		}

		return null;
	}
endif;

if ( ! function_exists( 'stanza_pattern_categories' ) ) :
	/**
	 * Registers Stanza pattern categories.
	 *
	 * @return void
	 */
	function stanza_pattern_categories() {
		register_block_pattern_category(
			'stanza',
			array(
				'label'       => __( 'Stanza', 'stanza' ),
				'description' => __( 'Stanza hero, feed, CTA, and publishing layouts.', 'stanza' ),
			)
		);
	}
endif;
add_action( 'init', 'stanza_pattern_categories' );

if ( ! function_exists( 'stanza_block_styles' ) ) :
	/**
	 * Registers small block style affordances used by the theme.
	 *
	 * @return void
	 */
	function stanza_block_styles() {
		register_block_style(
			'core/button',
			array(
				'name'  => 'secondary',
				'label' => __( 'Secondary', 'stanza' ),
			)
		);
	}
endif;
add_action( 'init', 'stanza_block_styles' );
