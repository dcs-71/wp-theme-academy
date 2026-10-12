/**
 * Academy · Hero Slider — frontend.
 *
 * Slider ligero y accesible, sin dependencias. Respeta prefers-reduced-motion,
 * soporta teclado (flechas), swipe táctil, autoplay con pausa al interactuar,
 * y expone estados ARIA. ~2KB.
 */
( function () {
	'use strict';

	var prefersReduced = window.matchMedia
		? window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches
		: false;

	function initSlider( root ) {
		var track = root.querySelector( '.academy-hero-slider__track' );
		if ( ! track ) {
			return;
		}

		var slides = Array.prototype.slice.call( track.children );
		if ( slides.length === 0 ) {
			return;
		}

		var loop = root.getAttribute( 'data-loop' ) === 'true';
		var autoplay = root.getAttribute( 'data-autoplay' ) === 'true' && ! prefersReduced;
		var delay = parseInt( root.getAttribute( 'data-delay' ), 10 ) || 6000;

		var current = 0;
		var timer = null;

		// Accesibilidad base del contenedor.
		root.setAttribute( 'role', 'region' );
		root.setAttribute( 'aria-roledescription', 'carrusel' );
		if ( ! root.getAttribute( 'aria-label' ) ) {
			root.setAttribute( 'aria-label', 'Slider de portada' );
		}

		slides.forEach( function ( slide, i ) {
			slide.classList.add( 'academy-hero-slider__slide' );
			slide.setAttribute( 'role', 'group' );
			slide.setAttribute( 'aria-roledescription', 'diapositiva' );
			slide.setAttribute( 'aria-label', ( i + 1 ) + ' de ' + slides.length );
			slide.setAttribute( 'aria-hidden', i === 0 ? 'false' : 'true' );
		} );

		// Las diapositivas 2+ se cargan en diferido; una vez cargada la página
		// se piden ya para que no aparezcan en blanco al deslizar.
		function loadAllSlides() {
			track.querySelectorAll( 'img[loading="lazy"]' ).forEach( function ( img ) {
				img.loading = 'eager';
			} );
		}
		if ( document.readyState === 'complete' ) {
			loadAllSlides();
		} else {
			window.addEventListener( 'load', loadAllSlides );
		}

		// Construye los puntos de navegación.
		var dotsWrap = root.querySelector( '.academy-hero-slider__dots' );
		var dots = [];
		if ( dotsWrap && slides.length > 1 ) {
			slides.forEach( function ( _slide, i ) {
				var dot = document.createElement( 'button' );
				dot.type = 'button';
				dot.className = 'academy-hero-slider__dot';
				dot.setAttribute( 'role', 'tab' );
				dot.setAttribute( 'aria-label', 'Ir a la diapositiva ' + ( i + 1 ) );
				dot.addEventListener( 'click', function () {
					goTo( i, true );
				} );
				dotsWrap.appendChild( dot );
				dots.push( dot );
			} );
		}

		function update() {
			var pending = slides[ current ].querySelector( 'img[loading="lazy"]' );
			if ( pending ) {
				pending.loading = 'eager';
			}
			track.style.transform = 'translateX(' + ( -current * 100 ) + '%)';
			slides.forEach( function ( slide, i ) {
				slide.setAttribute( 'aria-hidden', i === current ? 'false' : 'true' );
				// Evita que el foco del teclado entre en diapositivas ocultas.
				slide.inert = i !== current;
			} );
			dots.forEach( function ( dot, i ) {
				var active = i === current;
				dot.classList.toggle( 'is-active', active );
				dot.setAttribute( 'aria-selected', active ? 'true' : 'false' );
			} );
		}

		function goTo( index, fromUser ) {
			var last = slides.length - 1;
			if ( index < 0 ) {
				current = loop ? last : 0;
			} else if ( index > last ) {
				current = loop ? 0 : last;
			} else {
				current = index;
			}
			update();
			if ( fromUser ) {
				restart();
			}
		}

		function next() { goTo( current + 1 ); }
		function prev() { goTo( current - 1 ); }

		// Flechas.
		var prevBtn = root.querySelector( '.academy-hero-slider__arrow--prev' );
		var nextBtn = root.querySelector( '.academy-hero-slider__arrow--next' );
		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', function () { prev(); restart(); } );
		}
		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', function () { next(); restart(); } );
		}
		if ( slides.length <= 1 ) {
			if ( prevBtn ) { prevBtn.style.display = 'none'; }
			if ( nextBtn ) { nextBtn.style.display = 'none'; }
		}

		// Teclado.
		root.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'ArrowLeft' ) { prev(); restart(); }
			else if ( e.key === 'ArrowRight' ) { next(); restart(); }
		} );

		// Swipe táctil.
		var startX = 0;
		var dragging = false;
		track.addEventListener( 'touchstart', function ( e ) {
			startX = e.touches[ 0 ].clientX;
			dragging = true;
			stop();
		}, { passive: true } );
		track.addEventListener( 'touchend', function ( e ) {
			if ( ! dragging ) { return; }
			dragging = false;
			var dx = e.changedTouches[ 0 ].clientX - startX;
			if ( Math.abs( dx ) > 40 ) {
				if ( dx < 0 ) { next(); } else { prev(); }
			}
			restart();
		}, { passive: true } );

		// Autoplay con pausa al pasar el cursor o enfocar.
		function start() {
			if ( ! autoplay || slides.length <= 1 ) { return; }
			stop();
			timer = window.setInterval( next, delay );
		}
		function stop() {
			if ( timer ) { window.clearInterval( timer ); timer = null; }
		}
		function restart() { stop(); start(); }

		root.addEventListener( 'mouseenter', stop );
		root.addEventListener( 'mouseleave', start );
		root.addEventListener( 'focusin', stop );
		root.addEventListener( 'focusout', start );
		document.addEventListener( 'visibilitychange', function () {
			if ( document.hidden ) { stop(); } else { start(); }
		} );

		root.classList.add( 'is-ready' );
		update();
		start();
	}

	function init() {
		var sliders = document.querySelectorAll( '.academy-hero-slider' );
		Array.prototype.forEach.call( sliders, initSlider );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
