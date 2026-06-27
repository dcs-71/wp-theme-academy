/**
 * Academy · Hero Slider — registro del bloque (editor).
 *
 * Sin paso de build: se escribe con wp.element.createElement y los globales
 * de WordPress, por lo que el tema funciona sin npm/webpack.
 */
( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var registerBlockType = wp.blocks.registerBlockType;
	var blockEditor = wp.blockEditor;
	var components = wp.components;

	var useBlockProps = blockEditor.useBlockProps;
	var InnerBlocks = blockEditor.InnerBlocks;
	var InspectorControls = blockEditor.InspectorControls;

	var ALLOWED = [ 'core/cover' ];

	// Plantilla por defecto: dos diapositivas Cover listas para editar.
	var TEMPLATE = [
		[ 'core/cover', { dimRatio: 40, minHeight: 520 }, [
			[ 'core/heading', { textAlign: 'center', level: 2, content: __( 'Tu titular aquí', 'academy' ) } ],
			[ 'core/paragraph', { align: 'center', content: __( 'Describe tu propuesta de valor.', 'academy' ) } ],
		] ],
		[ 'core/cover', { dimRatio: 40, minHeight: 520 }, [
			[ 'core/heading', { textAlign: 'center', level: 2, content: __( 'Segunda diapositiva', 'academy' ) } ],
		] ],
	];

	registerBlockType( 'academy/hero-slider', {
		edit: function ( props ) {
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;

			var blockProps = useBlockProps( {
				className: 'academy-hero-slider is-editing',
			} );

			var inspector = el(
				InspectorControls,
				{ key: 'inspector' },
				el(
					components.PanelBody,
					{ title: __( 'Ajustes del slider', 'academy' ), initialOpen: true },
					el( components.ToggleControl, {
						label: __( 'Reproducción automática', 'academy' ),
						checked: attributes.autoplay,
						onChange: function ( v ) { setAttributes( { autoplay: v } ); },
					} ),
					el( components.ToggleControl, {
						label: __( 'Bucle infinito', 'academy' ),
						checked: attributes.loop,
						onChange: function ( v ) { setAttributes( { loop: v } ); },
					} ),
					el( components.RangeControl, {
						label: __( 'Intervalo (ms)', 'academy' ),
						value: attributes.delay,
						min: 2000,
						max: 12000,
						step: 500,
						onChange: function ( v ) { setAttributes( { delay: v } ); },
					} ),
					el( components.ToggleControl, {
						label: __( 'Mostrar flechas', 'academy' ),
						checked: attributes.showArrows,
						onChange: function ( v ) { setAttributes( { showArrows: v } ); },
					} ),
					el( components.ToggleControl, {
						label: __( 'Mostrar puntos', 'academy' ),
						checked: attributes.showDots,
						onChange: function ( v ) { setAttributes( { showDots: v } ); },
					} )
				)
			);

			var help = el(
				'p',
				{ className: 'academy-hero-slider__editor-hint', key: 'hint' },
				__( 'En el editor las diapositivas se muestran apiladas para editarlas con facilidad. En la web se convierten en un carrusel.', 'academy' )
			);

			var inner = el( InnerBlocks, {
				key: 'inner',
				allowedBlocks: ALLOWED,
				template: TEMPLATE,
				templateLock: false,
				orientation: 'vertical',
			} );

			return el( 'div', blockProps, [ inspector, help, inner ] );
		},

		// Bloque dinámico: el wrapper del carrusel lo genera render.php.
		// save() solo persiste las diapositivas (bloques internos).
		save: function () {
			return el( InnerBlocks.Content );
		},
	} );
} )( window.wp );
