<?php
/**
 * Title: Eventos · Lista
 * Slug: academy/events-list
 * Categories: academy, posts
 * Description: Lista de eventos sobre fondo navy con imagen, badge de fecha, título y metadatos.
 * Keywords: eventos, agenda, lista
 * Viewport Width: 1180
 *
 * @package Academy
 */

$img = esc_url( get_theme_file_uri( 'assets/images/placeholder-course.svg' ) );

$ic_cal   = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M3.5 9.5h17M8 3.5v3M16 3.5v3"/></svg>';
$ic_clock = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>';
$ic_pin   = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>';

$events = array(
	array( 'day' => '28', 'month' => 'Marzo', 'title' => 'Lorem ipsum is simply dummy text', 'date' => '24 Enero, 2021', 'time' => '3 pm - 4 pm', 'place' => 'when an unknown printer took a galley of' ),
	array( 'day' => '28', 'month' => 'Marzo', 'title' => 'Lorem ipsum is simply dummy text', 'date' => '24 Enero, 2021', 'time' => '3 pm - 4 pm', 'place' => 'when an unknown printer took a galley of' ),
	array( 'day' => '28', 'month' => 'Marzo', 'title' => 'Lorem ipsum is simply dummy text', 'date' => '24 Enero, 2021', 'time' => '3 pm - 4 pm', 'place' => 'when an unknown printer took a galley of' ),
);
?>
<!-- wp:html -->
<div class="events-list">
<?php foreach ( $events as $e ) : ?>
	<article class="event-row">
		<div class="event-row__media">
			<img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $e['title'] ); ?>" loading="lazy" />
			<div class="date-badge"><span class="date-badge__day"><?php echo esc_html( $e['day'] ); ?></span><span class="date-badge__month"><?php echo esc_html( $e['month'] ); ?></span></div>
		</div>
		<div class="event-row__body">
			<h3 class="event-row__title"><?php echo esc_html( $e['title'] ); ?></h3>
			<p class="event-row__desc">when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
			<ul class="event-row__meta">
				<li><?php echo $ic_cal; ?> <span><?php echo esc_html( $e['date'] ); ?></span></li>
				<li><?php echo $ic_clock; ?> <span><?php echo esc_html( $e['time'] ); ?></span></li>
				<li><?php echo $ic_pin; ?> <span><?php echo esc_html( $e['place'] ); ?></span></li>
			</ul>
		</div>
	</article>
<?php endforeach; ?>
	<nav class="events-pagination" aria-label="Paginación de eventos">
		<button type="button" class="events-pagination__dot is-active" aria-current="page">1</button>
		<button type="button" class="events-pagination__dot">2</button>
		<button type="button" class="events-pagination__dot">3</button>
	</nav>
</div>
<!-- /wp:html -->
