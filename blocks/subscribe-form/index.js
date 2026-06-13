( function ( blocks, blockEditor, element, components, i18n ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'stanza/subscribe-form', {
		edit: function ( props ) {
			var blockProps = blockEditor.useBlockProps( { className: 'stanza-subscribe-form' } );
			return el(
				'div',
				blockProps,
				el(
					blockEditor.InspectorControls,
					null,
					el(
						components.PanelBody,
						{ title: __( 'Subscribe form', 'stanza' ) },
						el( components.TextControl, {
							label: __( 'Placeholder', 'stanza' ),
							value: props.attributes.placeholder,
							onChange: function ( v ) { props.setAttributes( { placeholder: v } ); },
						} ),
						el( components.TextControl, {
							label: __( 'Button text', 'stanza' ),
							value: props.attributes.buttonText,
							onChange: function ( v ) { props.setAttributes( { buttonText: v } ); },
						} ),
						el( components.TextControl, {
							label: __( 'Form action URL', 'stanza' ),
							help: __( 'Leave empty to use a newsletter plugin via the provider slot.', 'stanza' ),
							value: props.attributes.formAction,
							onChange: function ( v ) { props.setAttributes( { formAction: v } ); },
						} )
					)
				),
				el(
					'div',
					{ className: 'stanza-subscribe-form__pill' },
					el( 'input', { type: 'email', placeholder: props.attributes.placeholder, disabled: true } ),
					el( 'button', { type: 'button', disabled: true }, props.attributes.buttonText || __( 'Subscribe', 'stanza' ) )
				)
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element, window.wp.components, window.wp.i18n );
