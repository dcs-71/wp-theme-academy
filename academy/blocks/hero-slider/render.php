<?php
/**
 * Render del bloque Academy · Hero Slider (dinámico).
 *
 * El editor solo guarda las diapositivas (bloques Cover internos). Aquí se
 * construye la envoltura del carrusel a partir de los atributos y del
 * contenido interno ($content), de modo que no haya desajustes de validación
 * y los patrones solo necesiten incluir las diapositivas.
 *
 * Variables disponibles: $attributes, $content, $block.
 *
 * @package Academy
 */

$autoplay    = ! empty( $attributes['autoplay'] ) ? 'true' : 'false';
$loop        = ! empty( $attributes['loop'] ) ? 'true' : 'false';
$delay       = isset( $attributes['delay'] ) ? (int) $attributes['delay'] : 6000;
$show_arrows = ! isset( $attributes['showArrows'] ) || $attributes['showArrows'];
$show_dots   = ! isset( $attributes['showDots'] ) || $attributes['showDots'];

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'        => 'academy-hero-slider',
		'data-autoplay' => $autoplay,
		'data-loop'     => $loop,
		'data-delay'    => (string) $delay,
	)
);

$arrows = '';
if ( $show_arrows ) {
	$arrows = '<div class="academy-hero-slider__arrows">'
		. '<button type="button" class="academy-hero-slider__arrow academy-hero-slider__arrow--prev" aria-label="' . esc_attr__( 'Diapositiva anterior', 'academy' ) . '">&#8249;</button>'
		. '<button type="button" class="academy-hero-slider__arrow academy-hero-slider__arrow--next" aria-label="' . esc_attr__( 'Diapositiva siguiente', 'academy' ) . '">&#8250;</button>'
		. '</div>';
}

/*
 * Prioridad de carga: la primera diapositiva es la imagen más grande visible
 * al abrir la página (LCP), así que se pide con prioridad alta; el resto se
 * difiere hasta que haga falta.
 */
if ( class_exists( 'WP_HTML_Tag_Processor' ) ) {
	$tags  = new WP_HTML_Tag_Processor( $content );
	$first = true;
	while ( $tags->next_tag( array( 'tag_name' => 'img', 'class_name' => 'wp-block-cover__image-background' ) ) ) {
		$tags->set_attribute( 'decoding', 'async' );
		if ( $first ) {
			$tags->remove_attribute( 'loading' );
			$tags->set_attribute( 'fetchpriority', 'high' );
			$first = false;
		} else {
			$tags->set_attribute( 'loading', 'lazy' );
			$tags->remove_attribute( 'fetchpriority' );
		}
	}
	$content = $tags->get_updated_html();
}

$dots = '';
if ( $show_dots ) {
	$dots = '<div class="academy-hero-slider__dots" role="tablist" aria-label="' . esc_attr__( 'Navegación del slider', 'academy' ) . '"></div>';
}
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="academy-hero-slider__viewport">
		<div class="academy-hero-slider__track"><?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
	</div>
	<?php echo $arrows; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php echo $dots; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
