<?php
/**
 * Title: Nivel Intermedio
 * Slug: academy-puncion/nivel-intermedio
 * Categories: academy
 * Description: Nivel intermedio: músculos, cita de respaldo científico y horas académicas.
 * Keywords: nivel, intermedio, musculos
 * Viewport Width: 1400
 *
 * @package Academy
 */

$musculos = array(
	'Aductor mayor', 'Grácil', 'Bíceps femoral', 'Semimembranoso', 'Semitendinoso',
	'Gastrocnemio', 'Sóleo', 'Supraespinoso', 'Deltoides anterior', 'Deltoides medio',
	'Deltoides posterior', 'Dorsal ancho', 'Redondo mayor', 'Redondo menor', 'Poplíteo',
	'Peroneos largo y corto', 'Tercer peroneo', 'Tibial anterior', 'Extensor largo de los dedos',
	'Extensor largo del dedo gordo', 'Tibial posterior', 'Flexor largo de los dedos',
	'Flexor largo del dedo gordo', 'Extensor corto de los dedos y del dedo gordo',
	'Abductor del dedo gordo', 'Abductor del 5.º dedo', 'Flexor corto de los dedos',
	'Cuadrado plantar', 'Flexor corto del dedo gordo', 'Aductor del dedo gordo',
	'Interóseos dorsales y plantares', 'Braquial', 'Bíceps braquial', 'Coracobraquial',
	'Tríceps cabeza larga', 'Tríceps cabeza corta', 'Tríceps cabeza medial',
	'Extensor cubital del carpo', 'Extensor radial corto', 'Extensor de los dedos',
	'Extensor radial largo', 'Braquiorradial',
);
?>
<!-- wp:group {"tagName":"section","className":"section section--nivel","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"gray","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--nivel has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:html -->
<span class="nivel-badge nivel-badge--orange">Nivel Intermedio</span>
<!-- /wp:html -->

<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--30)">Músculos para este nivel</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<ol class="muscle-list" start="18">
<?php foreach ( $musculos as $m ) : ?>
	<li><?php echo esc_html( $m ); ?></li>
<?php endforeach; ?>
</ol>
<!-- /wp:html -->

<!-- wp:group {"className":"nivel-quote","style":{"border":{"left":{"color":"var:preset|color|orange","width":"4px"}},"spacing":{"padding":{"left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group nivel-quote" style="border-left-color:var(--wp--preset--color--orange);border-left-width:4px;margin-top:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"fontSize":"large","style":{"typography":{"fontStyle":"italic","fontWeight":"500"}}} -->
<p class="has-large-font-size" style="font-style:italic;font-weight:500">“La punción seca es una técnica respaldada científicamente para el tratamiento del dolor miofascial y los puntos gatillo, ayudando a disminuir el dolor, mejorar la movilidad y recuperar la función muscular.”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size">Basado en investigaciones de Janet Travell y estudios actuales en fisioterapia musculoesquelética.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="hours-badge hours-badge--orange"><span class="hours-badge__num">30</span> horas académicas</div>
<!-- /wp:html --></section>
<!-- /wp:group -->
