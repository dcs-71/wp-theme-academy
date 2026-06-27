<?php
/**
 * Title: Nivel Básico
 * Slug: academy-puncion/nivel-basico
 * Categories: academy
 * Description: Contenido del nivel básico: temario, peligros y complicaciones, músculos y horas académicas.
 * Keywords: nivel, basico, contenido, musculos
 * Viewport Width: 1400
 *
 * @package Academy
 */

$contenido = array(
	'Introducción al síndrome de dolor miofascial (SDM).',
	'Características del dolor miofascial.',
	'Criterios de diagnóstico.',
	'Factores de perpetuación.',
	'Tratamiento fisioterapéutico conservador del SDM: terapias manuales.',
	'Naturaleza de los PGM.',
	'Principios de la fisioterapia invasiva: clasificación, indicaciones, contraindicaciones, peligros y complicaciones.',
	'Mecanismos de acción de las técnicas invasivas.',
	'Tratamiento fisioterapéutico conservador del SDM: técnicas instrumentales.',
	'Consentimiento informado.',
);

$peligros = array(
	'Dolor', 'Neumotórax', 'Lesiones nerviosas', 'Lesiones viscerales', 'Infecciones',
	'Reacciones vegetativas', 'Punción seca en el embarazo', 'Situaciones especiales, entre otros',
	'Toma de aguja en pinza y plana',
);

$musculos = array(
	'Infraespinoso', 'Esternocleidomastoideo', 'Trapecio superior', 'Elevador de la escápula',
	'Glúteo medio', 'Glúteo menor', 'Glúteo mayor', 'Tensor de la fascia lata', 'Piriforme',
	'Recto femoral', 'Vasto medial', 'Vasto lateral', 'Vasto intermedio', 'Sartorio', 'Pectíneo',
	'Aductor largo', 'Aductor corto',
);
?>
<!-- wp:group {"tagName":"section","className":"section section--nivel","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--nivel has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:html -->
<span class="nivel-badge nivel-badge--navy">Nivel Básico</span>
<!-- /wp:html -->

<!-- wp:heading {"level":2,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--30)">¿En qué consiste?</h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:paragraph {"textColor":"orange","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-orange-color has-text-color" style="font-weight:600">Contenido</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"nivel-list"} -->
<ul class="wp-block-list nivel-list">
<?php foreach ( $contenido as $c ) : ?>
<!-- wp:list-item --><li><?php echo esc_html( $c ); ?></li><!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%"} -->
<div class="wp-block-column" style="flex-basis:42%"><!-- wp:group {"className":"peligros-card","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"shadow":"var:preset|shadow|card"},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group peligros-card has-base-background-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--card)"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Peligros, complicaciones y contraindicaciones</h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"nivel-list"} -->
<ul class="wp-block-list nivel-list">
<?php foreach ( $peligros as $p ) : ?>
<!-- wp:list-item --><li><?php echo esc_html( $p ); ?></li><!-- /wp:list-item -->
<?php endforeach; ?>
</ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"level":3,"fontSize":"x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--60)">Músculos para este nivel</h3>
<!-- /wp:heading -->

<!-- wp:html -->
<ol class="muscle-list" start="1">
<?php foreach ( $musculos as $m ) : ?>
	<li><?php echo esc_html( $m ); ?></li>
<?php endforeach; ?>
</ol>
<div class="hours-badge"><span class="hours-badge__num">20</span> horas académicas</div>
<!-- /wp:html --></section>
<!-- /wp:group -->
