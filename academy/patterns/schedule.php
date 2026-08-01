<?php
/**
 * Title: Programación · Fechas y horarios
 * Slug: academy/schedule
 * Categories: academy
 * Description: Cuadro de programación de la formación: fechas, horario de clases y almuerzo por cada nivel.
 * Keywords: programacion, fechas, horarios, calendario, cronograma
 * Viewport Width: 1400
 *
 * @package Academy
 */

$schedule = array(
	array(
		'nivel'  => 'Básico',
		'fechas' => array( '31 de julio', '01 de agosto' ),
	),
	array(
		'nivel'  => 'Intermedio',
		'fechas' => array( '08 de agosto', '15 de agosto', '22 de agosto' ),
	),
	array(
		'nivel'  => 'Avanzado',
		'fechas' => array( '29 de agosto', '03 de octubre', '10 de octubre' ),
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--schedule","anchor":"programacion","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"navy","textColor":"base","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--schedule has-base-color has-navy-background-color has-text-color has-background" id="programacion" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Clases presenciales</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">Programación de la formación</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#c7cbe8"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#c7cbe8;margin-bottom:var(--wp--preset--spacing--50)">Ocho jornadas presenciales en nuestra sede de Lima, Perú.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="schedule-grid">
<?php foreach ( $schedule as $s ) : ?>
	<article class="schedule-card">
		<h3 class="schedule-card__level"><?php echo esc_html( $s['nivel'] ); ?></h3>
		<div class="schedule-card__block">
			<span class="schedule-card__label">Fechas</span>
			<ul class="schedule-card__dates">
			<?php foreach ( $s['fechas'] as $f ) : ?>
				<li><?php echo esc_html( $f ); ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<div class="schedule-card__block">
			<span class="schedule-card__label">Horario de clases</span>
			<p class="schedule-card__value">9:00 a. m. a 8:00 p. m.</p>
		</div>
		<div class="schedule-card__block">
			<span class="schedule-card__label">Almuerzo</span>
			<p class="schedule-card__value">1:00 p. m. a 2:00 p. m.</p>
		</div>
	</article>
<?php endforeach; ?>
</div>
<!-- /wp:html --></section>
<!-- /wp:group -->
