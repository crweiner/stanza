import { store, getContext } from '@wordpress/interactivity';

store( 'stanza/subscribe', {
	actions: {
		intercept( event ) {
			event.preventDefault();
			const ctx = getContext();
			ctx.notice = ctx.message;
		},
	},
} );
