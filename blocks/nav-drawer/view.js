import { store, getContext, getElement } from '@wordpress/interactivity';

const FOCUSABLE =
	'a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])';

let toggleEl = null;

function rootOf( el ) {
	return el.closest( '[data-wp-interactive="stanza/navDrawer"]' );
}

const { actions } = store( 'stanza/navDrawer', {
	actions: {
		open() {
			const ctx = getContext();
			ctx.open = true;
			const root = rootOf( getElement().ref );
			toggleEl = root.querySelector( '.stanza-nav-drawer__toggle' );
			const close = root.querySelector( '.stanza-nav-drawer__close' );
			requestAnimationFrame( () => close && close.focus() );
		},
		close() {
			getContext().open = false;
			if ( toggleEl ) {
				toggleEl.focus();
			}
		},
		onOverlayClick( event ) {
			if ( event.target.closest( 'a' ) ) {
				actions.close();
			}
		},
		onKeydown( event ) {
			const ctx = getContext();
			if ( ! ctx.open ) {
				return;
			}
			if ( 'Escape' === event.key ) {
				actions.close();
				return;
			}
			if ( 'Tab' !== event.key ) {
				return;
			}
			const overlay = rootOf( getElement().ref ).querySelector(
				'.stanza-nav-drawer__overlay'
			);
			const items = overlay.querySelectorAll( FOCUSABLE );
			if ( ! items.length ) {
				return;
			}
			const first = items[ 0 ];
			const last = items[ items.length - 1 ];
			if ( event.shiftKey && document.activeElement === first ) {
				event.preventDefault();
				last.focus();
			} else if ( ! event.shiftKey && document.activeElement === last ) {
				event.preventDefault();
				first.focus();
			}
		},
	},
	callbacks: {
		lockScroll() {
			document.body.style.overflow = getContext().open ? 'hidden' : '';
		},
	},
} );
