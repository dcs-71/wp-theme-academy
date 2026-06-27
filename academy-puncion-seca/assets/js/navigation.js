/**
 * Academy — navigation.js
 *
 * Mejora progresiva del header fijo: añade una sombra sutil al hacer scroll.
 * El menú móvil lo gestiona de forma nativa el bloque core/navigation, por lo
 * que aquí no se reimplementa nada de eso.
 */
( function () {
	'use strict';

	var header = document.querySelector( '.site-header' );
	if ( ! header ) {
		return;
	}

	var ticking = false;

	function onScroll() {
		if ( ticking ) {
			return;
		}
		ticking = true;
		window.requestAnimationFrame( function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
			ticking = false;
		} );
	}

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	onScroll();
} )();
