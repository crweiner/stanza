<?php
/**
 * Render the stanza/parallax-card block.
 *
 * @package Stanza
 */

defined( 'ABSPATH' ) || exit;

$stanza_post_id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : 0;
if ( ! $stanza_post_id ) {
	return;
}

$stanza_image_id = get_post_thumbnail_id( $stanza_post_id );

// minHeight is an editor-supplied attribute injected into an inline style; only
// allow a bare CSS length so a malformed value can't add unexpected declarations.
$stanza_min_height = '480px';
if ( ! empty( $attributes['minHeight'] ) && preg_match( '/^\d+(\.\d+)?(px|rem|em|vh|vw|%)$/', $attributes['minHeight'] ) ) {
	$stanza_min_height = $attributes['minHeight'];
}

$stanza_dim      = max( 0, min( 100, (int) ( $attributes['dimOpacity'] ?? 55 ) ) ) / 100;
$stanza_parallax = ! empty( $attributes['parallax'] ) && $stanza_image_id && ! is_admin();

$stanza_wrapper = get_block_wrapper_attributes(
	array(
		'class' => 'stanza-parallax-card' . ( $stanza_image_id ? '' : ' is-imageless' ),
		'style' => 'min-height:' . esc_attr( $stanza_min_height ),
	)
);

$stanza_terms = get_the_term_list( $stanza_post_id, 'category', '', '' );
?>
<article
	<?php echo $stanza_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php if ( $stanza_parallax ) : ?>
	data-wp-interactive="stanza/parallax"
	data-wp-init="callbacks.observe"
	<?php endif; ?>
>
	<?php if ( $stanza_image_id ) : ?>
	<div class="stanza-parallax-card__media">
		<?php
		// Bounded size + srcset, not the full original: a feed of these cards
		// would otherwise ship several multi-megabyte images on one uncached view.
		echo wp_get_attachment_image(
			$stanza_image_id,
			'1536x1536',
			false,
			array(
				'loading' => 'lazy',
				'sizes'   => '100vw',
			)
		);
		?>
	</div>
	<?php endif; ?>
	<div class="stanza-parallax-card__scrim" style="background:rgba(0,0,0,<?php echo esc_attr( $stanza_dim ); ?>)"></div>
	<div class="stanza-parallax-card__body">
		<h2 class="stanza-parallax-card__title">
			<a href="<?php echo esc_url( get_permalink( $stanza_post_id ) ); ?>"><?php echo esc_html( get_the_title( $stanza_post_id ) ); ?></a>
		</h2>
		<div class="stanza-parallax-card__meta">
			<a class="stanza-parallax-card__date" href="<?php echo esc_url( get_permalink( $stanza_post_id ) ); ?>">
				<time datetime="<?php echo esc_attr( get_the_date( 'c', $stanza_post_id ) ); ?>"><?php echo esc_html( get_the_date( '', $stanza_post_id ) ); ?></time>
			</a>
			<?php if ( $stanza_terms && ! is_wp_error( $stanza_terms ) ) : ?>
			<div class="stanza-parallax-card__terms"><?php echo wp_kses_post( $stanza_terms ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</article>
