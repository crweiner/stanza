<?php
/**
 * Render the stanza/nav-drawer block.
 *
 * @package Stanza
 */

defined( 'ABSPATH' ) || exit;

$stanza_wrapper    = get_block_wrapper_attributes( array( 'class' => 'stanza-nav-drawer' ) );
$stanza_overlay_id = wp_unique_id( 'stanza-nav-drawer-' );
?>
<div
	<?php echo $stanza_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	data-wp-interactive="stanza/navDrawer"
	data-wp-context='{"open":false}'
	data-wp-on-document--keydown="actions.onKeydown"
	data-wp-watch="callbacks.lockScroll"
>
	<button
		class="stanza-nav-drawer__toggle"
		type="button"
		aria-label="<?php esc_attr_e( 'Open menu', 'stanza' ); ?>"
		aria-expanded="false"
		aria-controls="<?php echo esc_attr( $stanza_overlay_id ); ?>"
		data-wp-on--click="actions.open"
		data-wp-bind--aria-expanded="context.open"
	>
		<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
	</button>
	<div
		id="<?php echo esc_attr( $stanza_overlay_id ); ?>"
		class="stanza-nav-drawer__overlay"
		role="dialog"
		aria-modal="true"
		aria-label="<?php esc_attr_e( 'Menu', 'stanza' ); ?>"
		inert
		data-wp-class--is-open="context.open"
		data-wp-bind--inert="!context.open"
		data-wp-on--click="actions.onOverlayClick"
	>
		<button
			class="stanza-nav-drawer__close"
			type="button"
			aria-label="<?php esc_attr_e( 'Close menu', 'stanza' ); ?>"
			data-wp-on--click="actions.close"
		>
			<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6 6 18"></path></svg>
		</button>
		<nav class="stanza-nav-drawer__nav" aria-label="<?php esc_attr_e( 'Mobile', 'stanza' ); ?>">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner blocks. ?>
		</nav>
	</div>
</div>
