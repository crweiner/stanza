<?php
/**
 * Render the stanza/color-mode-toggle block.
 *
 * @package Stanza
 */

defined( 'ABSPATH' ) || exit;

$stanza_wrapper = get_block_wrapper_attributes( array( 'class' => 'stanza-color-mode-toggle' ) );
?>
<button
	<?php echo $stanza_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	type="button"
	aria-label="<?php esc_attr_e( 'Switch color mode', 'stanza' ); ?>"
	aria-pressed="false"
	data-wp-interactive="stanza/colorMode"
	data-wp-init="callbacks.init"
	data-wp-on--click="actions.toggle"
	data-wp-bind--aria-pressed="state.isDark"
	data-wp-bind--disabled="state.locked"
	data-wp-class--is-dark="state.isDark"
>
	<svg class="stanza-color-mode-toggle__moon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.9 13.5A8.5 8.5 0 0 1 10.5 3.1 8.5 8.5 0 1 0 20.9 13.5Z"></path></svg>
	<svg class="stanza-color-mode-toggle__sun" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path></svg>
</button>
