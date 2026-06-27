<?php
/**
 * Title: Nivel Avanzado
 * Slug: academy-puncion/nivel-avanzado
 * Categories: academy
 * Description: Nivel avanzado: temario, músculos y horas académicas.
 * Keywords: nivel, avanzado, musculos
 * Viewport Width: 1400
 *
 * @package Academy
 */

$contenido = array(
	'Clarificación de conceptos y debate.',
	'Dolor referido de puntos gatillo ligamentosos.',
	'Punción seca torácica, particularidades y medidas de seguridad adicional.',
	'Musculatura paravertebral profunda.',
	'Tratamientos conservador e invasivo.',
);

$musculos = array(
	'Supinador', 'Flexor radial del carpo', 'Flexor cubital del carpo', 'Palmar largo',
	'Flexor superficial y profundo de los dedos', 'Flexor largo del pulgar', 'Pronador redondo',
	'Aductor del pulgar', 'Oponente y flexor corto del pulgar', 'Interóseos dorsales y palmares',
	'Masetero', 'Temporal', 'Pterigoideo medial', 'Pterigoideo lateral', 'Digástrico',
	'Frontooccipital', 'Cigomático mayor', 'Orbicular de los ojos', 'Platisma', 'Escalenos',
	'Suboccipital', 'Esplenio de la cabeza', 'Esplenio del cuello', 'Semiespinoso de la cabeza',
	'Multífidos cervicales', 'Multífidos torácicos', 'Multífidos lumbares', 'Subescapular',
	'Pectoral mayor', 'Pectoral menor', 'Trapecio medio', 'Trapecio inferior',
	'Romboides mayor y menor', 'Serrato anterior', 'Longísimo', 'Iliocostal',
	'Serrato posteroinferior', 'Serrato posterosuperior', 'Recto abdominal',
	'Músculo oblicuo externo', 'Cuadrado lumbar', 'Iliopsoas',
);
?>
<!-- wp:group {"tagName":"section","className":"section section--nivel","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--nivel has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:html -->
<span class="nivel-badge nivel-badge--navy">Nivel Avanzado</span>
<!-- /wp:html -->

<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--30)">¿Qué incluye?</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<ul class="check-list">
<?php foreach ( $contenido as $c ) : ?>
	<li><?php echo esc_html( $c ); ?></li>
<?php endforeach; ?>
</ul>
<!-- /wp:html -->

<!-- wp:heading {"level":3,"fontSize":"x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--60)">Músculos para este nivel</h3>
<!-- /wp:heading -->

<!-- wp:html -->
<ol class="muscle-list" start="60">
<?php foreach ( $musculos as $m ) : ?>
	<li><?php echo esc_html( $m ); ?></li>
<?php endforeach; ?>
</ol>
<div class="hours-badge"><span class="hours-badge__num">30</span> horas académicas</div>
<!-- /wp:html --></section>
<!-- /wp:group -->
