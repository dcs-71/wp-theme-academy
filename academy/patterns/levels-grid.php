<?php
/**
 * Title: Ruta de formación · 3 niveles
 * Slug: academy/levels-grid
 * Categories: academy
 * Description: Tarjetas de los tres niveles de la Formación Internacional en Punción Seca con fechas y horas académicas.
 * Keywords: niveles, ruta, basico, intermedio, avanzado, puncion seca
 * Viewport Width: 1400
 *
 * @package Academy
 */

$levels = array(
	array(
		'img'      => 'assets/images/nivel-basico.jpg',
		'nivel'    => 'Nivel Básico',
		'fechas'   => '31 de julio y 01 de agosto',
		'horas'    => '20 horas académicas',
		'musculos' => 'Músculos 1 al 17',
		'text'     => 'Fundamentos del síndrome de dolor miofascial, diagnóstico, seguridad y primeras técnicas de punción.',
	),
	array(
		'img'      => 'assets/images/nivel-intermedio.jpg',
		'nivel'    => 'Nivel Intermedio',
		'fechas'   => '08, 15 y 22 de agosto',
		'horas'    => '30 horas académicas',
		'musculos' => 'Músculos 18 al 59',
		'text'     => 'Miembro inferior y superior completos: cadera, muslo, pierna, pie, hombro, brazo y antebrazo.',
	),
	array(
		'img'      => 'assets/images/nivel-avanzado.jpg',
		'nivel'    => 'Nivel Avanzado',
		'fechas'   => '29 de agosto, 03 y 10 de octubre',
		'horas'    => '30 horas académicas',
		'musculos' => 'Músculos 60 al 101',
		'text'     => 'Punción seca torácica, musculatura paravertebral profunda, cráneo-cervical, mano y tronco.',
	),
);

$ic_cal   = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3.5v3M16 3.5v3"/></svg>';
$ic_clock = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>';
$ic_body  = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="4.5" r="2"/><path d="M12 7v8m0 0-3 5m3-5 3 5M6 10l6-2 6 2"/></svg>';
?>
<!-- wp:group {"tagName":"section","className":"section section--levels","anchor":"ruta","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--levels has-base-background-color has-background" id="ruta" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Ruta de formación</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Tres niveles para dominar la punción seca</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Clases 100% presenciales de 9:00 a. m. a 8:00 p. m. en nuestra sede de Lima, Perú.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"levels-grid","layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group levels-grid">
<?php foreach ( $levels as $l ) : ?>
<?php $img = academy_image_uri( $l['img'] ); ?>
<!-- wp:group {"className":"card card--level","style":{"border":{"radius":"16px"},"spacing":{"blockGap":"0"},"shadow":"var:preset|shadow|card"},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group card card--level has-base-background-color has-background" style="border-radius:16px;box-shadow:var(--wp--preset--shadow--card)"><!-- wp:html -->
<div class="card__media">
	<img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $l['nivel'] ); ?> de la Formación Internacional en Punción Seca" loading="lazy" />
	<span class="card__tag"><?php echo esc_html( $l['horas'] ); ?></span>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"card__body","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group card__body" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"textColor":"blue","fontSize":"small","style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}}} -->
<p class="has-blue-color has-text-color has-small-font-size" style="margin-bottom:0;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Seminario presencial</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"x-large","style":{"typography":{"fontWeight":"700"}}} -->
<h3 class="wp-block-heading has-x-large-font-size" style="font-weight:700"><?php echo esc_html( $l['nivel'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $l['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="level-meta">
	<li><?php echo $ic_cal; ?> <span><?php echo esc_html( $l['fechas'] ); ?></span></li>
	<li><?php echo $ic_clock; ?> <span>9:00 a. m. a 8:00 p. m.</span></li>
	<li><?php echo $ic_body; ?> <span><?php echo esc_html( $l['musculos'] ); ?></span></li>
</ul>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"levels-summary","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group levels-summary" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:html -->
<div class="stat"><strong>80</strong><span>horas académicas</span></div>
<div class="stat"><strong>101</strong><span>músculos abordados</span></div>
<div class="stat"><strong>8</strong><span>jornadas presenciales</span></div>
<div class="stat"><strong>3</strong><span>niveles progresivos</span></div>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"navy","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-navy-background-color has-text-color has-background wp-element-button" href="#programa">Ver el temario completo</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
