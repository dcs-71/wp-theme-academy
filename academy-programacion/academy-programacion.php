<?php
/**
 * Plugin Name:       Academy · Programación y Alumnos
 * Plugin URI:        https://github.com/dcs-71/wp-theme-academy
 * Description:       Gestiona desde el escritorio las fechas de la Formación Internacional en Punción Seca (Básico, Intermedio y Avanzado, o «Próximamente») y los alumnos formados que aparecen en la página «Alumnos». Requiere el tema Academy by Total Therapy.
 * Version:           1.1.0
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            Total Therapy
 * Author URI:        https://totaltherapy.pe
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       academy-programacion
 *
 * Cómo se conecta con el tema (fechas; los alumnos están en includes/alumnos.php):
 * el tema Academy pinta las fechas a partir de `academy_schedule()`, que pasa
 * por el filtro `academy_schedule`. Este plugin guarda la programación en la
 * opción `academy_programacion` y la inyecta en ese filtro. El formato en
 * español («30 y 31 de octubre») y el paso automático a «Próximamente» cuando
 * las fechas ya pasaron los hace el tema.
 *
 * @package AcademyProgramacion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ACADEMY_PROGRAMACION_VERSION', '1.1.0' );
define( 'ACADEMY_PROGRAMACION_OPTION', 'academy_programacion' );
define( 'ACADEMY_PROGRAMACION_URL', plugin_dir_url( __FILE__ ) );

require_once __DIR__ . '/includes/alumnos.php';

/**
 * Máximo de fechas por nivel.
 */
const ACADEMY_PROGRAMACION_MAX_DATES = 10;

/**
 * Capacidad necesaria para editar la programación (editores y administradores).
 *
 * @return string
 */
function academy_programacion_capability() {
	return apply_filters( 'academy_programacion_capability', 'edit_pages' );
}

/**
 * Niveles disponibles. Se toman del tema si está activo.
 *
 * @return array<string,string> slug => nombre.
 */
function academy_programacion_levels() {
	$levels = array(
		'basico'     => 'Nivel Básico',
		'intermedio' => 'Nivel Intermedio',
		'avanzado'   => 'Nivel Avanzado',
	);

	if ( function_exists( 'academy_schedule_defaults' ) ) {
		$defaults = academy_schedule_defaults();
		$levels   = array();
		foreach ( $defaults['levels'] as $slug => $level ) {
			$levels[ $slug ] = $level['name'];
		}
	}

	return $levels;
}

/**
 * Programación guardada. Si aún no se ha guardado nada, parte de las fechas
 * por defecto del tema para no cambiar lo que ya se ve en la web.
 *
 * @return array{levels:array<string,array{mode:string,dates:string[]}>,soon_label:string}
 */
function academy_programacion_get() {
	$saved = get_option( ACADEMY_PROGRAMACION_OPTION );
	if ( is_array( $saved ) && isset( $saved['levels'] ) ) {
		return $saved;
	}

	$data = array(
		'levels'     => array(),
		'soon_label' => 'Próximamente',
	);

	$defaults = function_exists( 'academy_schedule_defaults' ) ? academy_schedule_defaults() : array( 'levels' => array() );
	foreach ( academy_programacion_levels() as $slug => $name ) {
		$dates                   = isset( $defaults['levels'][ $slug ]['dates'] ) ? $defaults['levels'][ $slug ]['dates'] : array();
		$data['levels'][ $slug ] = array(
			'mode'  => $dates ? 'fechas' : 'proximamente',
			'dates' => $dates,
		);
	}
	if ( ! empty( $defaults['soon_label'] ) ) {
		$data['soon_label'] = $defaults['soon_label'];
	}

	return $data;
}

/**
 * ¿Es una fecha AAAA-MM-DD válida?
 *
 * @param mixed $date Valor.
 * @return bool
 */
function academy_programacion_is_date( $date ) {
	if ( ! is_string( $date ) || ! preg_match( '/^(\d{4})-(\d{2})-(\d{2})$/', $date, $m ) ) {
		return false;
	}
	return checkdate( (int) $m[2], (int) $m[3], (int) $m[1] );
}

/* -------------------------------------------------------------------------
 * Conexión con el tema
 * ---------------------------------------------------------------------- */

/**
 * Inyecta la programación guardada en el tema.
 *
 * @param array $schedule Programación por defecto del tema.
 * @return array
 */
function academy_programacion_filter_schedule( $schedule ) {
	$data = academy_programacion_get();

	foreach ( $data['levels'] as $slug => $level ) {
		if ( ! isset( $schedule['levels'][ $slug ] ) ) {
			continue;
		}
		$schedule['levels'][ $slug ]['dates'] = 'fechas' === $level['mode'] ? (array) $level['dates'] : array();
	}

	if ( '' !== trim( (string) $data['soon_label'] ) ) {
		$schedule['soon_label'] = $data['soon_label'];
	}

	return $schedule;
}
add_filter( 'academy_schedule', 'academy_programacion_filter_schedule' );

/* -------------------------------------------------------------------------
 * Ajustes
 * ---------------------------------------------------------------------- */

/**
 * Registra la opción y su saneado.
 */
function academy_programacion_register_setting() {
	register_setting(
		'academy_programacion',
		ACADEMY_PROGRAMACION_OPTION,
		array(
			'type'              => 'array',
			'sanitize_callback' => 'academy_programacion_sanitize',
			'show_in_rest'      => false,
		)
	);
}
add_action( 'admin_init', 'academy_programacion_register_setting' );

/**
 * Permite guardar a quien tenga la capacidad del plugin (no solo administradores).
 *
 * @return string
 */
function academy_programacion_option_page_capability() {
	return academy_programacion_capability();
}
add_filter( 'option_page_capability_academy_programacion', 'academy_programacion_option_page_capability' );

/**
 * Sanea lo enviado desde el formulario.
 *
 * @param mixed $input Datos del formulario.
 * @return array
 */
function academy_programacion_sanitize( $input ) {
	$input = is_array( $input ) ? $input : array();

	$clean = array(
		'levels'     => array(),
		'soon_label' => isset( $input['soon_label'] ) ? sanitize_text_field( $input['soon_label'] ) : '',
	);

	if ( '' === $clean['soon_label'] ) {
		$clean['soon_label'] = 'Próximamente';
	}

	foreach ( array_keys( academy_programacion_levels() ) as $slug ) {
		$level = isset( $input['levels'][ $slug ] ) && is_array( $input['levels'][ $slug ] ) ? $input['levels'][ $slug ] : array();
		$mode  = isset( $level['mode'] ) && 'fechas' === $level['mode'] ? 'fechas' : 'proximamente';
		$dates = isset( $level['dates'] ) ? array_map( 'sanitize_text_field', (array) $level['dates'] ) : array();
		$dates = array_values( array_unique( array_filter( $dates, 'academy_programacion_is_date' ) ) );
		sort( $dates );

		$clean['levels'][ $slug ] = array(
			'mode'  => $mode,
			'dates' => array_slice( $dates, 0, ACADEMY_PROGRAMACION_MAX_DATES ),
		);
	}

	return $clean;
}

/**
 * Vacía las cachés de página más comunes al guardar, para que los cambios se
 * vean al momento.
 */
function academy_programacion_purge_caches() {
	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain(); // WP Rocket.
	}
	if ( function_exists( 'w3tc_flush_all' ) ) {
		w3tc_flush_all(); // W3 Total Cache.
	}
	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache(); // WP Super Cache.
	}
	if ( class_exists( 'autoptimizeCache' ) ) {
		autoptimizeCache::clearall(); // Autoptimize.
	}
	do_action( 'litespeed_purge_all' ); // LiteSpeed Cache.
	do_action( 'sg_cachepress_purge_cache' ); // SiteGround Optimizer.

	/**
	 * Se dispara tras guardar la programación.
	 */
	do_action( 'academy_programacion_updated' );
}
add_action( 'update_option_' . ACADEMY_PROGRAMACION_OPTION, 'academy_programacion_purge_caches' );
add_action( 'add_option_' . ACADEMY_PROGRAMACION_OPTION, 'academy_programacion_purge_caches' );

/* -------------------------------------------------------------------------
 * Escritorio
 * ---------------------------------------------------------------------- */

/**
 * Menú «Programación».
 */
function academy_programacion_menu() {
	$hook = add_menu_page(
		__( 'Programación de la formación', 'academy-programacion' ),
		__( 'Programación', 'academy-programacion' ),
		academy_programacion_capability(),
		'academy-programacion',
		'academy_programacion_render_page',
		'dashicons-calendar-alt',
		25
	);

	add_action( 'admin_print_styles-' . $hook, 'academy_programacion_assets' );
}
add_action( 'admin_menu', 'academy_programacion_menu' );

/**
 * CSS y JS de la pantalla del plugin.
 */
function academy_programacion_assets() {
	wp_enqueue_style( 'academy-programacion', ACADEMY_PROGRAMACION_URL . 'assets/admin.css', array(), ACADEMY_PROGRAMACION_VERSION );
	wp_enqueue_script( 'academy-programacion', ACADEMY_PROGRAMACION_URL . 'assets/admin.js', array(), ACADEMY_PROGRAMACION_VERSION, true );
}

/**
 * Enlace «Editar fechas» en la lista de plugins.
 *
 * @param string[] $links Enlaces.
 * @return string[]
 */
function academy_programacion_action_links( $links ) {
	array_unshift(
		$links,
		sprintf( '<a href="%s">%s</a>', esc_url( admin_url( 'admin.php?page=academy-programacion' ) ), esc_html__( 'Editar fechas', 'academy-programacion' ) )
	);
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'academy_programacion_action_links' );

/**
 * Texto que verá el visitante para un nivel, tal y como lo calcula el tema.
 *
 * @param string $slug Nivel.
 * @return array{text:string,soon:bool}
 */
function academy_programacion_preview( $slug ) {
	if ( function_exists( 'academy_level_schedule' ) ) {
		$level = academy_level_schedule( $slug );
		return array(
			'text' => $level['text'],
			'soon' => ! $level['has_dates'],
		);
	}

	$data  = academy_programacion_get();
	$level = $data['levels'][ $slug ];
	$soon  = 'fechas' !== $level['mode'] || ! $level['dates'];

	return array(
		'text' => $soon ? $data['soon_label'] : implode( ', ', $level['dates'] ),
		'soon' => $soon,
	);
}

/**
 * Fila de fecha del formulario.
 *
 * @param string $slug  Nivel.
 * @param string $value Fecha AAAA-MM-DD.
 * @return string
 */
function academy_programacion_date_row( $slug, $value = '' ) {
	return sprintf(
		'<li class="acp-date"><input type="date" name="%1$s[levels][%2$s][dates][]" value="%3$s" aria-label="%4$s" /><button type="button" class="button-link acp-date__remove" aria-label="%5$s">&times;</button></li>',
		esc_attr( ACADEMY_PROGRAMACION_OPTION ),
		esc_attr( $slug ),
		esc_attr( $value ),
		esc_attr__( 'Fecha de clase', 'academy-programacion' ),
		esc_attr__( 'Quitar fecha', 'academy-programacion' )
	);
}

/**
 * Pantalla de edición de la programación.
 */
function academy_programacion_render_page() {
	if ( ! current_user_can( academy_programacion_capability() ) ) {
		return;
	}

	$data  = academy_programacion_get();
	$today = current_time( 'Y-m-d' );
	$name  = ACADEMY_PROGRAMACION_OPTION;
	?>
	<div class="wrap acp">
		<h1><?php esc_html_e( 'Programación de la formación', 'academy-programacion' ); ?></h1>
		<p class="acp-intro"><?php esc_html_e( 'Indica las fechas de la próxima edición de cada nivel o deja «Próximamente». Los cambios se ven al momento en la portada (Ruta de formación), en «Así se vive la formación» y en la página de eventos.', 'academy-programacion' ); ?></p>

		<?php if ( ! function_exists( 'academy_schedule' ) ) : ?>
			<div class="notice notice-warning inline"><p><?php esc_html_e( 'El tema «Academy by Total Therapy» no está activo: las fechas se guardan, pero no se mostrarán hasta activarlo.', 'academy-programacion' ); ?></p></div>
		<?php endif; ?>

		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'academy_programacion' ); ?>

			<div class="acp-levels">
				<?php
				foreach ( academy_programacion_levels() as $slug => $label ) :
					$level   = isset( $data['levels'][ $slug ] ) ? $data['levels'][ $slug ] : array( 'mode' => 'proximamente', 'dates' => array() );
					$preview = academy_programacion_preview( $slug );
					$past    = 'fechas' === $level['mode'] && $level['dates'] && end( $level['dates'] ) < $today;
					$field   = $name . '[levels][' . $slug . ']';
					?>
					<fieldset class="acp-level" data-mode="<?php echo esc_attr( $level['mode'] ); ?>">
						<legend class="acp-level__title"><?php echo esc_html( $label ); ?></legend>

						<div class="acp-mode">
							<label><input type="radio" name="<?php echo esc_attr( $field ); ?>[mode]" value="fechas" <?php checked( $level['mode'], 'fechas' ); ?> /> <?php esc_html_e( 'Mostrar fechas', 'academy-programacion' ); ?></label>
							<label><input type="radio" name="<?php echo esc_attr( $field ); ?>[mode]" value="proximamente" <?php checked( $level['mode'], 'proximamente' ); ?> /> <?php esc_html_e( 'Mostrar «Próximamente»', 'academy-programacion' ); ?></label>
						</div>

						<div class="acp-dates">
							<p class="acp-label"><?php esc_html_e( 'Fechas de clase', 'academy-programacion' ); ?></p>
							<ul class="acp-dates__list" data-slug="<?php echo esc_attr( $slug ); ?>" data-max="<?php echo esc_attr( ACADEMY_PROGRAMACION_MAX_DATES ); ?>">
								<?php
								$dates = $level['dates'] ? $level['dates'] : array( '' );
								foreach ( $dates as $date ) {
									echo academy_programacion_date_row( $slug, $date ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								}
								?>
							</ul>
							<button type="button" class="button acp-dates__add"><?php esc_html_e( '+ Añadir fecha', 'academy-programacion' ); ?></button>
							<template class="acp-dates__template"><?php echo academy_programacion_date_row( $slug ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></template>
						</div>

						<p class="acp-preview<?php echo $preview['soon'] ? ' is-soon' : ''; ?>">
							<span><?php esc_html_e( 'Ahora en la web:', 'academy-programacion' ); ?></span>
							<strong><?php echo esc_html( $preview['text'] ); ?></strong>
						</p>

						<?php if ( $past ) : ?>
							<p class="acp-warning"><?php esc_html_e( 'Estas fechas ya pasaron, así que la web muestra «Próximamente». Añade las de la siguiente edición.', 'academy-programacion' ); ?></p>
						<?php endif; ?>
					</fieldset>
				<?php endforeach; ?>
			</div>

			<div class="acp-settings">
				<label for="acp-soon-label" class="acp-label"><?php esc_html_e( 'Texto cuando un nivel no tiene fechas', 'academy-programacion' ); ?></label>
				<input type="text" id="acp-soon-label" class="regular-text" name="<?php echo esc_attr( $name ); ?>[soon_label]" value="<?php echo esc_attr( $data['soon_label'] ); ?>" placeholder="Próximamente" />
				<p class="description"><?php esc_html_e( 'Por ejemplo: «Próximamente» o «Fechas por confirmar».', 'academy-programacion' ); ?></p>
			</div>

			<?php submit_button( __( 'Guardar programación', 'academy-programacion' ) ); ?>
		</form>

		<details class="acp-help">
			<summary><?php esc_html_e( 'Usar las fechas en otras páginas (shortcodes)', 'academy-programacion' ); ?></summary>
			<ul>
				<li><code>[academy_fechas nivel=basico]</code> — <?php esc_html_e( 'todas las fechas del nivel («30 y 31 de octubre») o «Próximamente».', 'academy-programacion' ); ?></li>
				<li><code>[academy_fechas nivel=intermedio mostrar=primera]</code> — <?php esc_html_e( 'solo la primera fecha.', 'academy-programacion' ); ?></li>
				<li><code>[academy_fechas_tarjeta nivel=avanzado]</code> — <?php esc_html_e( 'el recuadro «Fechas» de las tarjetas.', 'academy-programacion' ); ?></li>
				<li><code>[academy_fecha_insignia nivel=basico]</code> — <?php esc_html_e( 'la insignia con día y mes.', 'academy-programacion' ); ?></li>
			</ul>
			<p class="description"><?php esc_html_e( 'Niveles: basico, intermedio y avanzado. Los shortcodes los aporta el tema Academy.', 'academy-programacion' ); ?></p>
		</details>
	</div>
	<?php
}
