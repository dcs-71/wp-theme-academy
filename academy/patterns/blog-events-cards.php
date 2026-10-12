<?php
/**
 * Title: Así se vive la formación · Destacado + cards
 * Slug: academy/blog-events-cards
 * Categories: academy, posts
 * Description: Momento destacado de la formación con badge de fecha y dos tarjetas secundarias. Editable.
 * Keywords: galeria, momentos, clases, eventos, cards
 * Viewport Width: 1400
 *
 * @package Academy
 */

$featured = academy_image_uri( 'assets/images/clase-teoria.webp' );

$minis = array(
	array(
		'img'   => 'assets/images/practica-supervisada.webp',
		'alt'   => 'Práctica supervisada en camilla durante la formación',
		'fecha' => 'Nivel Básico · 31 de julio',
		'cat'   => 'Práctica supervisada',
		'texto' => 'Cada participante practica sobre camilla con acompañamiento docente permanente.',
	),
	array(
		'img'   => 'assets/images/material-marcaje.webp',
		'alt'   => 'Marcaje anatómico previo a la punción seca',
		'fecha' => 'Todos los niveles',
		'cat'   => 'Marcaje anatómico',
		'texto' => 'Localización de puntos gatillo y referencias de seguridad antes de cada técnica.',
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--blog","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--blog has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Así se vive la formación</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Teoría, demostración y práctica en cada jornada de 9:00 a. m. a 8:00 p. m.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"blog-layout"} -->
<div class="wp-block-columns blog-layout"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:html -->
<article class="blog-featured">
	<img class="blog-featured__img" src="<?php echo $featured; ?>" alt="Clase teórica de la Formación Internacional en Punción Seca en Lima" width="1100" height="760" loading="lazy" decoding="async" />
	<span class="blog-featured__overlay"></span>
	<div class="date-badge"><span class="date-badge__day">31</span><span class="date-badge__month">Julio</span></div>
	<div class="blog-featured__content">
		<h3 class="blog-featured__title">Arranca el Nivel Básico: síndrome de dolor miofascial, diagnóstico y seguridad</h3>
		<div class="blog-featured__meta">
			<span>9:00 a. m. – 8:00 p. m.</span>
			<span>Lima, Perú</span>
		</div>
	</div>
</article>
<!-- /wp:html --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%"} -->
<div class="wp-block-column" style="flex-basis:42%"><!-- wp:html -->
<?php foreach ( $minis as $m ) : ?>
<article class="blog-mini">
	<img class="blog-mini__img" src="<?php echo academy_image_uri( $m['img'] ); ?>" alt="<?php echo esc_attr( $m['alt'] ); ?>" width="900" height="675" loading="lazy" decoding="async" />
	<div class="blog-mini__body">
		<span class="blog-mini__date"><?php echo esc_html( $m['fecha'] ); ?></span>
		<p class="blog-mini__cat"><?php echo esc_html( $m['cat'] ); ?></p>
		<p class="blog-mini__text"><?php echo esc_html( $m['texto'] ); ?></p>
	</div>
</article>
<?php endforeach; ?>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center","className":"blog-more","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"typography":{"fontWeight":"500"}}} -->
<p class="has-text-align-center blog-more" style="margin-top:var(--wp--preset--spacing--40);font-weight:500"><a href="#programacion">Ver la programación completa →</a></p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
