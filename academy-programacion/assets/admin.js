/**
 * Academy · Programación — añadir/quitar fechas y atenuar las fechas cuando
 * el nivel está en «Próximamente». Sin dependencias.
 */
( function () {
	'use strict';

	document.querySelectorAll( '.acp-level' ).forEach( function ( level ) {
		var list = level.querySelector( '.acp-dates__list' );
		var add = level.querySelector( '.acp-dates__add' );
		var template = level.querySelector( '.acp-dates__template' );
		var max = parseInt( list.getAttribute( 'data-max' ), 10 ) || 10;

		function refresh() {
			add.disabled = list.children.length >= max;
		}

		add.addEventListener( 'click', function () {
			if ( list.children.length >= max ) {
				return;
			}
			list.appendChild( template.content.firstElementChild.cloneNode( true ) );
			list.lastElementChild.querySelector( 'input' ).focus();

			// Al añadir una fecha, lo lógico es querer mostrarla.
			var fechas = level.querySelector( 'input[value="fechas"]' );
			if ( fechas && ! fechas.checked ) {
				fechas.checked = true;
				level.setAttribute( 'data-mode', 'fechas' );
			}
			refresh();
		} );

		list.addEventListener( 'click', function ( event ) {
			var button = event.target.closest( '.acp-date__remove' );
			if ( ! button ) {
				return;
			}
			var row = button.closest( '.acp-date' );
			if ( list.children.length > 1 ) {
				row.remove();
			} else {
				row.querySelector( 'input' ).value = '';
			}
			refresh();
		} );

		level.querySelectorAll( 'input[type="radio"]' ).forEach( function ( radio ) {
			radio.addEventListener( 'change', function () {
				level.setAttribute( 'data-mode', radio.value );
			} );
		} );

		refresh();
	} );
} )();
