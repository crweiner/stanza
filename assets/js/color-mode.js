( function () {
	var root = document.documentElement;
	var storageKey = 'stanza-color-mode';
	var media = window.matchMedia ? window.matchMedia( '(prefers-color-scheme: dark)' ) : null;

	function storedMode() {
		try {
			return window.localStorage.getItem( storageKey );
		} catch ( error ) {
			return null;
		}
	}

	function applyMode( mode ) {
		var isDark = mode === 'dark' || ( ! mode && media && media.matches );

		root.classList.toggle( 'has-light-text', isDark );
		root.style.setProperty( '--background-color', isDark ? '#15171a' : '#ffffff' );

		document.querySelectorAll( '.st-color-toggle' ).forEach( function ( button ) {
			button.setAttribute( 'aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode' );
			button.setAttribute( 'aria-pressed', isDark ? 'true' : 'false' );
		} );
	}

	function setMode( mode ) {
		try {
			window.localStorage.setItem( storageKey, mode );
		} catch ( error ) {}

		applyMode( mode );
	}

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( '.st-color-toggle' );

		if ( ! button ) {
			return;
		}

		event.preventDefault();
		setMode( root.classList.contains( 'has-light-text' ) ? 'light' : 'dark' );
	} );

	if ( media ) {
		media.addEventListener( 'change', function () {
			if ( ! storedMode() ) {
				applyMode( null );
			}
		} );
	}

	applyMode( storedMode() );
}() );
