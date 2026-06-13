( function ( blocks, blockEditor, element ) {
	var el = element.createElement;

	blocks.registerBlockType( 'stanza/parallax-card', {
		edit: function () {
			var blockProps = blockEditor.useBlockProps( {
				className: 'stanza-parallax-card is-imageless',
				style: { minHeight: '280px' },
			} );
			return el(
				'article',
				blockProps,
				el(
					'div',
					{ className: 'stanza-parallax-card__body' },
					el( 'h2', { className: 'stanza-parallax-card__title' }, 'Post title' ),
					el( 'div', { className: 'stanza-parallax-card__meta' }, 'Date · Category' )
				)
			);
		},
		save: function () {
			return null;
		},
	} );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element );
