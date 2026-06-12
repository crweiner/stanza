<?php
/**
 * Render the stanza/parallax-card block.
 *
 * @package Stanza
 */

$stanza_post_id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : 0;
if ( ! $stanza_post_id ) {
	return;
}

$stanza_image_id   = get_post_thumbnail_id( $stanza_post_id );
$stanza_min_height = ! empty( $attributes['minHeight'] ) ? $attributes['minHeight'] : '480px';
$stanza_dim        = max( 0, min( 100, (int) ( $attributes['dimOpacity'] ?? 55 ) ) ) / 100;
$stanza_parallax   = ! empty( $attributes['parallax'] ) && $stanza_image_id && ! is_admin();

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
		<?php echo wp_get_attachment_image( $stanza_image_id, 'full', false, array( 'loading' => 'lazy' ) ); ?>
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
