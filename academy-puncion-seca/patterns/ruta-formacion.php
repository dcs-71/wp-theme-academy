<?php
/**
 * Title: Ruta de formación
 * Slug: academy-puncion/ruta-formacion
 * Categories: academy
 * Description: Línea de tiempo con los tres niveles (Básico, Intermedio, Avanzado), fechas y horarios.
 * Keywords: ruta, niveles, timeline, formacion
 * Viewport Width: 1400
 *
 * @package Academy
 */

$steps = array(
	array( 'level' => 'Básico', 'color' => 'navy', 'fecha' => '31 de Julio y 01 de Agosto', 'hora' => '9:00 am a 8:00 pm' ),
	array( 'level' => 'Intermedio', 'color' => 'orange', 'fecha' => '08, 15 y 22 de Agosto', 'hora' => '9:00 am a 8:00 pm' ),
	array( 'level' => 'Avanzado', 'color' => 'navy', 'fecha' => '29 de Agosto, 03 y 10 de Octubre', 'hora' => '9:00 am a 8:00 pm' ),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--ruta","anchor":"ruta","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"gray","layout":{"type":"constrained","contentSize":"1000px"}} -->
<section id="ruta" class="wp-block-group section section--ruta has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Ruta de <span class="has-orange-color has-text-color">formación</span></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)">Tres niveles presenciales para dominar la punción seca</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ol class="ruta-timeline">
<?php foreach ( $steps as $i => $s ) : ?>
	<li class="ruta-step ruta-step--<?php echo esc_attr( $s['color'] ); ?>">
		<span class="ruta-step__dot"><?php echo (int) ( $i + 1 ); ?></span>
		<div class="ruta-step__card">
			<h3 class="ruta-step__level"><?php echo esc_html( $s['level'] ); ?></h3>
			<p class="ruta-step__mode">Clases presenciales</p>
			<p class="ruta-step__meta"><strong>Fecha:</strong> <?php echo esc_html( $s['fecha'] ); ?></p>
			<p class="ruta-step__meta"><strong>Hora:</strong> <?php echo esc_html( $s['hora'] ); ?></p>
		</div>
	</li>
<?php endforeach; ?>
</ol>
<!-- /wp:html --></section>
<!-- /wp:group -->
