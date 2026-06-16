( function ( blocks, blockEditor, element ) {
	var el = element.createElement;

	blocks.registerBlockType( 'stanza/nav-drawer', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps( { className: 'stanza-nav-drawer' } );
			var innerProps = blockEditor.useInnerBlocksProps(
				{},
				{
					template: [ [ 'core/navigation', { overlayMenu: 'never' } ] ],
					templateLock: false,
				}
			);
			return el(
				'div',
				blockProps,
				el(
					'button',
					{ className: 'stanza-nav-drawer__toggle', type: 'button', 'aria-label': 'Open menu' },
					el(
						'svg',
						{ viewBox: '0 0 24 24', fill: 'none', stroke: 'currentColor', strokeWidth: 2, width: 24, height: 24, 'aria-hidden': true },
						el( 'path', { d: 'M4 7h16M4 12h16M4 17h16' } )
					)
				),
				el( 'div', innerProps )
			);
		},
		save: function () {
			return el( window.wp.blockEditor.InnerBlocks.Content, null );
		},
	} );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element );
