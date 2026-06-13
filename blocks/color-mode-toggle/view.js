import { store } from '@wordpress/interactivity';

const mq = window.matchMedia( '(prefers-color-scheme: dark)' );

function stored() {
	try {
		return localStorage.getItem( 'stanza-color-mode' );
	} catch ( e ) {
		return null;
	}
}

const { state } = store( 'stanza/colorMode', {
	state: {
		isDark: stored() ? 'dark' === stored() : mq.matches,
		locked: false,
	},
	actions: {
		toggle() {
			state.isDark = ! state.isDark;
			const mode = state.isDark ? 'dark' : 'light';
			document.documentElement.style.colorScheme = mode;
			try {
				localStorage.setItem( 'stanza-color-mode', mode );
			} catch ( e ) {}
		},
	},
	callbacks: {
		init() {
			const scheme = getComputedStyle( document.documentElement ).colorScheme || '';
			if ( scheme.startsWith( 'only' ) ) {
				state.locked = true;
				state.isDark = scheme.includes( 'dark' );
			}
		},
	},
} );

mq.addEventListener( 'change', ( event ) => {
	if ( ! stored() && ! state.locked ) {
		state.isDark = event.matches;
	}
} );
