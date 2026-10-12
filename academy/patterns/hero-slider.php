<?php
/**
 * Title: Hero · Slider principal
 * Slug: academy/hero-slider
 * Categories: academy, featured
 * Description: Slider de portada de la Formación Internacional en Punción Seca. Editable desde el bloque Academy Hero Slider.
 * Keywords: hero, slider, portada, carrusel, puncion seca
 * Block Types: core/post-content
 * Viewport Width: 1400
 *
 * @package Academy
 */

/*
 * Solo la primera diapositiva lleva el <h1> de la página (una sola por URL,
 * con la búsqueda principal). Las demás usan <h2> con el mismo estilo.
 */
$slides = array(
	array(
		'img'       => 'assets/images/hero-1.webp',
		'alt'       => 'Fisioterapeutas practicando punción seca en camilla con supervisión docente en Academy by Total Therapy, Lima',
		'level'     => 1,
		'eyebrow'   => 'Academy by Total Therapy · Lima, Perú',
		'title'     => 'Formación Internacional en Punción Seca',
		'text'      => 'Dirigida por la Mg. Chantal Páucar en alianza con Seminarios Travell &amp; Simons. Tres niveles presenciales con práctica supervisada en grupos reducidos.',
		'cta'       => 'Reserva tu vacante',
		'url'       => academy_whatsapp_url( 'Hola, quiero reservar mi vacante en la Formación Internacional en Punción Seca. ¿Me pueden dar más información?' ),
		'secondary' => array( 'Ver la ruta de formación', '#ruta' ),
	),
	array(
		'img'       => 'assets/images/hero-2.webp',
		'alt'       => 'Clase teórica de la Formación Internacional en Punción Seca en la sede de Lima',
		'level'     => 2,
		'eyebrow'   => 'Ruta de formación',
		'title'     => 'De los fundamentos al nivel avanzado',
		'text'      => 'Básico, Intermedio y Avanzado: 80 horas académicas y 101 músculos abordados con práctica supervisada.',
		'cta'       => 'Ver la ruta de formación',
		'url'       => '#ruta',
		'secondary' => array( 'Temario completo', '#programa' ),
	),
	array(
		'img'       => 'assets/images/hero-3.webp',
		'alt'       => 'Docentes supervisando la práctica de punción seca en camilla durante la formación',
		'level'     => 2,
		'eyebrow'   => 'Excelencia clínica',
		'title'     => 'Práctica supervisada en grupos reducidos',
		'text'      => 'Acompañamiento docente en cada sesión, material de práctica completo y manual impreso a color por módulo, en nuestra sede de Lima.',
		'cta'       => 'Conoce el programa',
		'url'       => '#programa',
		'secondary' => array( 'Escríbenos', academy_whatsapp_url( 'Hola, solicito más información sobre la Formación Internacional en Punción Seca.' ) ),
	),
);
?>
<!-- wp:academy/hero-slider {"autoplay":true,"loop":true,"delay":7000,"align":"full"} -->
<?php foreach ( $slides as $s ) : ?>
<?php $bg = academy_image_uri( $s['img'] ); ?>
<!-- wp:cover {"url":"<?php echo $bg; ?>","alt":"<?php echo esc_attr( $s['alt'] ); ?>","dimRatio":70,"overlayColor":"midnight","minHeight":640,"className":"academy-slide","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-cover alignfull academy-slide" style="min-height:640px"><span aria-hidden="true" class="wp-block-cover__background has-midnight-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr( $s['alt'] ); ?>" src="<?php echo $bg; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"hero__content","layout":{"type":"constrained","contentSize":"660px","justifyContent":"left"}} -->
<div class="wp-block-group hero__content"><!-- wp:paragraph {"className":"hero__eyebrow","fontSize":"small"} -->
<p class="hero__eyebrow has-small-font-size"><?php echo wp_kses_post( $s['eyebrow'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":<?php echo (int) $s['level']; ?>,"className":"hero__title","textColor":"base","fontSize":"huge"} -->
<h<?php echo (int) $s['level']; ?> class="wp-block-heading hero__title has-base-color has-text-color has-huge-font-size"><?php echo esc_html( $s['title'] ); ?></h<?php echo (int) $s['level']; ?>>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero__text","fontSize":"large"} -->
<p class="hero__text has-large-font-size"><?php echo wp_kses_post( $s['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero__actions"} -->
<div class="wp-block-buttons hero__actions"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $s['url'] ); ?>"><?php echo esc_html( $s['cta'] ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="<?php echo esc_url( $s['secondary'][1] ); ?>"><?php echo esc_html( $s['secondary'][0] ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<?php endforeach; ?>
<!-- /wp:academy/hero-slider -->
