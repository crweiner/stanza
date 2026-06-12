( function ( blocks, blockEditor, element ) {
	var el = element.createElement;

	blocks.registerBlockType( 'stanza/color-mode-toggle', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps( {
				className: 'stanza-color-mode-toggle',
				type: 'button',
				'aria-label': 'Color mode toggle',
			} );
			return el(
				'button',
				blockProps,
				el(
					'svg',
					{ viewBox: '0 0 24 24', fill: 'none', stroke: 'currentColor', strokeWidth: 2, width: 20, height: 20, 'aria-hidden': true },
					el( 'path', { d: 'M20.9 13.5A8.5 8.5 0 0 1 10.5 3.1 8.5 8.5 0 1 0 20.9 13.5Z' } )
				)
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element );
