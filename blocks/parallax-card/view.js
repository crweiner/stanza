import { store, getElement } from '@wordpress/interactivity';

const reduceMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );

store( 'stanza/parallax', {
	callbacks: {
		observe() {
			if ( reduceMotion.matches ) {
				return;
			}
			const { ref } = getElement();
			const media = ref.querySelector( '.stanza-parallax-card__media img' );
			if ( ! media ) {
				return;
			}
			let ticking = false;
			const update = () => {
				ticking = false;
				const rect = ref.getBoundingClientRect();
				const vh = window.innerHeight;
				if ( rect.bottom < 0 || rect.top > vh ) {
					return;
				}
				const progress =
					( rect.top + rect.height / 2 - vh / 2 ) /
					( vh / 2 + rect.height / 2 );
				media.style.transform = `translateY(${ ( progress * 8 ).toFixed( 2 ) }%)`;
			};
			const onScroll = () => {
				if ( ! ticking ) {
					ticking = true;
					requestAnimationFrame( update );
				}
			};
			const io = new IntersectionObserver( ( entries ) => {
				if ( entries[ 0 ].isIntersecting ) {
					window.addEventListener( 'scroll', onScroll, { passive: true } );
					update();
				} else {
					window.removeEventListener( 'scroll', onScroll );
				}
			} );
			io.observe( ref );
		},
	},
} );
