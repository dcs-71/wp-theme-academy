<?php
/**
 * Title: Eventos · Lista
 * Slug: academy/events-list
 * Categories: academy, posts
 * Description: Lista de jornadas de la formación sobre fondo navy con imagen, badge de fecha y metadatos.
 * Keywords: eventos, agenda, lista, fechas, niveles
 * Viewport Width: 1180
 *
 * @package Academy
 */

$ic_cal   = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3.5v3M16 3.5v3"/></svg>';
$ic_clock = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>';
$ic_pin   = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>';

$sede = 'Clases presenciales en Lima, Perú';

$events = array(
	array(
		'img'   => 'assets/images/nivel-basico.webp',
		'day'   => '30',
		'month' => 'Octubre',
		'title' => 'Nivel Básico · Seminario presencial',
		'desc'  => 'Síndrome de dolor miofascial, criterios de diagnóstico, principios de la fisioterapia invasiva y seguridad. Músculos 1 al 17.',
		'date'  => '30 y 31 de octubre · 20 horas académicas',
	),
	array(
		'img'   => 'assets/images/nivel-intermedio.webp',
		'day'   => '',
		'month' => '',
		'title' => 'Nivel Intermedio · Seminario presencial',
		'desc'  => 'Abordaje completo de miembro inferior y superior con práctica supervisada en camilla. Músculos 18 al 59.',
		'date'  => 'Fechas próximamente · 30 horas académicas',
	),
	array(
		'img'   => 'assets/images/nivel-avanzado.webp',
		'day'   => '',
		'month' => '',
		'title' => 'Nivel Avanzado · Seminario presencial',
		'desc'  => 'Punción seca torácica, musculatura paravertebral profunda, región cráneo-cervical, mano y tronco. Músculos 60 al 101.',
		'date'  => 'Fechas próximamente · 30 horas académicas',
	),
);
?>
<!-- wp:html -->
<div class="events-list">
<?php foreach ( $events as $e ) : ?>
	<article class="event-row">
		<div class="event-row__media">
			<img src="<?php echo academy_image_uri( $e['img'] ); ?>" alt="<?php echo esc_attr( $e['title'] . ' de la Formación Internacional en Punción Seca' ); ?>" width="900" height="675" loading="lazy" decoding="async" />
			<?php if ( $e['day'] ) : ?>
			<div class="date-badge"><span class="date-badge__day"><?php echo esc_html( $e['day'] ); ?></span><span class="date-badge__month"><?php echo esc_html( $e['month'] ); ?></span></div>
			<?php else : ?>
			<div class="date-badge date-badge--soon"><span class="date-badge__month">Próximamente</span></div>
			<?php endif; ?>
		</div>
		<div class="event-row__body">
			<h3 class="event-row__title"><?php echo esc_html( $e['title'] ); ?></h3>
			<p class="event-row__desc"><?php echo esc_html( $e['desc'] ); ?></p>
			<ul class="event-row__meta">
				<li><?php echo $ic_cal; ?> <span><?php echo esc_html( $e['date'] ); ?></span></li>
				<li><?php echo $ic_clock; ?> <span>9:00 a. m. a 8:00 p. m. · Almuerzo 1:00 p. m. a 2:00 p. m.</span></li>
				<li><?php echo $ic_pin; ?> <span><?php echo esc_html( $sede ); ?></span></li>
			</ul>
		</div>
	</article>
<?php endforeach; ?>
</div>
<!-- /wp:html -->
