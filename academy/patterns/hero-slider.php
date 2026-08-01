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

$slides = array(
	array(
		'img'     => 'assets/images/hero-1.jpg',
		'eyebrow' => 'En alianza con Seminarios Travell &amp; Simons',
		'title'   => 'Formación Internacional en Punción Seca',
		'text'    => 'Dirigida por la Mg. Chantal Páucar. Tres niveles presenciales en Lima, del 31 de julio al 10 de octubre.',
		'cta'     => 'Reserva tu vacante',
		'url'     => '#inscripcion',
	),
	array(
		'img'     => 'assets/images/hero-2.jpg',
		'eyebrow' => 'Ruta de formación',
		'title'   => 'Tres niveles para dominar la punción seca',
		'text'    => 'Básico, Intermedio y Avanzado: 80 horas académicas y 101 músculos abordados con práctica supervisada.',
		'cta'     => 'Ver la ruta de formación',
		'url'     => '#ruta',
	),
	array(
		'img'     => 'assets/images/hero-3.jpg',
		'eyebrow' => 'Excelencia clínica',
		'title'   => 'Formación que transforma, impacto que perdura',
		'text'    => 'Material de práctica completo, manual impreso a color por módulo y grupos reducidos en nuestra sede de Lima.',
		'cta'     => 'Conoce el programa',
		'url'     => '#programa',
	),
);
?>
<!-- wp:academy/hero-slider {"autoplay":true,"loop":true,"delay":6500,"align":"full"} -->
<?php foreach ( $slides as $s ) : ?>
<?php $bg = esc_url( get_theme_file_uri( $s['img'] ) ); ?>
<!-- wp:cover {"url":"<?php echo $bg; ?>","dimRatio":60,"overlayColor":"base","minHeight":620,"className":"academy-slide","align":"full"} -->
<div class="wp-block-cover alignfull academy-slide" style="min-height:620px"><span aria-hidden="true" class="wp-block-cover__background has-base-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $bg; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"hero__content","layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group hero__content"><!-- wp:paragraph {"align":"center","className":"hero__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"}}} -->
<p class="has-text-align-center hero__eyebrow has-orange-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.14em;text-transform:uppercase"><?php echo wp_kses_post( $s['eyebrow'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"navy","fontSize":"huge","style":{"typography":{"fontWeight":"700"}}} -->
<h1 class="wp-block-heading has-text-align-center has-navy-color has-text-color has-huge-font-size" style="font-weight:700"><?php echo esc_html( $s['title'] ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"navy","fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<p class="has-text-align-center has-navy-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html( $s['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $s['url'] ); ?>"><?php echo esc_html( $s['cta'] ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<?php endforeach; ?>
<!-- /wp:academy/hero-slider -->
