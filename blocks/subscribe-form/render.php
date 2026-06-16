<?php
/**
 * Render the stanza/subscribe-form block.
 *
 * Provider slot priority: the stanza_subscribe_form_html filter, then an
 * active MailPoet form, then the native pill form (which is honest about
 * needing a provider — it never pretends to subscribe anyone).
 *
 * @package Stanza
 */

defined( 'ABSPATH' ) || exit;

$stanza_wrapper = get_block_wrapper_attributes( array( 'class' => 'stanza-subscribe-form' ) );

$stanza_custom_html = apply_filters( 'stanza_subscribe_form_html', '', $attributes );
if ( '' !== $stanza_custom_html ) {
	printf(
		'<div %s>%s</div>',
		$stanza_wrapper, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$stanza_custom_html // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- developer-supplied provider markup.
	);
	return;
}

$stanza_mailpoet_form = (int) apply_filters( 'stanza_mailpoet_form_id', 0 );
if ( $stanza_mailpoet_form && class_exists( '\MailPoet\API\API' ) ) {
	printf(
		'<div %s>%s</div>',
		$stanza_wrapper, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		do_shortcode( sprintf( '[mailpoet_form id="%d"]', $stanza_mailpoet_form ) )
	);
	return;
}

$stanza_placeholder = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : 'jamie@example.com';
$stanza_button_text = ! empty( $attributes['buttonText'] ) ? $attributes['buttonText'] : __( 'Subscribe', 'stanza' );
$stanza_action      = ! empty( $attributes['formAction'] ) ? $attributes['formAction'] : '';
$stanza_input_id    = ! empty( $attributes['inputId'] ) ? $attributes['inputId'] : wp_unique_id( 'stanza-subscribe-' );
$stanza_disabled    = '' === $stanza_action;

$stanza_notice = current_user_can( 'manage_options' )
	? __( 'Connect a newsletter plugin (or the stanza_subscribe_form_html filter) to make this form live.', 'stanza' )
	: __( 'Subscriptions aren’t set up yet — check back soon.', 'stanza' );
if ( ! $stanza_disabled && ! empty( $attributes['successMessage'] ) ) {
	$stanza_notice = $attributes['successMessage'];
}

$stanza_context = wp_json_encode( array( 'notice' => '', 'message' => $stanza_notice ) );
?>
<div
	<?php echo $stanza_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	data-wp-interactive="stanza/subscribe"
	data-wp-context='<?php echo esc_attr( $stanza_context ); ?>'
>
	<form
		class="stanza-subscribe-form__pill"
		action="<?php echo esc_url( $stanza_disabled ? '#' : $stanza_action ); ?>"
		method="post"
		<?php if ( $stanza_disabled ) : ?>
		aria-disabled="true"
		data-wp-on--submit="actions.intercept"
		<?php endif; ?>
	>
		<label class="screen-reader-text" for="<?php echo esc_attr( $stanza_input_id ); ?>"><?php esc_html_e( 'Email address', 'stanza' ); ?></label>
		<input id="<?php echo esc_attr( $stanza_input_id ); ?>" type="email" name="email" placeholder="<?php echo esc_attr( $stanza_placeholder ); ?>" autocomplete="email" required />
		<button type="submit"><?php echo esc_html( $stanza_button_text ); ?></button>
	</form>
	<p class="stanza-subscribe-form__notice" data-wp-bind--hidden="!context.notice" data-wp-text="context.notice" hidden></p>
</div>
