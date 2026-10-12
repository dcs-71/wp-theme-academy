<?php
/**
 * Alumnos formados: tipo de contenido «Alumnos» y conexión con el tema.
 *
 * Cada alumno es una entrada con:
 *   - Título: nombre con su grado (p. ej. «Lic. Ana Pérez»).
 *   - Imagen destacada: foto (cuadrada, fondo blanco).
 *   - Campos: colegiatura CTMP, formación alcanzada y grupo (opcional).
 *   - Atributos → Orden: posición en la página.
 *
 * El tema los recibe por el filtro `academy_alumni`.
 *
 * @package AcademyProgramacion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const ACADEMY_ALUMNOS_CPT    = 'academy_alumno';
const ACADEMY_ALUMNOS_SEEDED = 'academy_alumnos_seeded';

/**
 * Formaciones posibles (las define el tema; aquí hay una copia por si no está activo).
 *
 * @return array<string,string> clave => etiqueta.
 */
function academy_alumnos_formations() {
	if ( function_exists( 'academy_alumni_formations' ) ) {
		return wp_list_pluck( academy_alumni_formations(), 'label' );
	}
	return array(
		'completa'   => 'Formación completa',
		'intermedio' => 'Nivel Intermedio completado',
		'basico'     => 'Nivel Básico completado',
	);
}

/**
 * Registra el tipo de contenido «Alumnos».
 */
function academy_alumnos_register_cpt() {
	register_post_type(
		ACADEMY_ALUMNOS_CPT,
		array(
			'labels'              => array(
				'name'                  => __( 'Alumnos', 'academy-programacion' ),
				'singular_name'         => __( 'Alumno', 'academy-programacion' ),
				'menu_name'             => __( 'Alumnos', 'academy-programacion' ),
				'add_new'               => __( 'Añadir alumno', 'academy-programacion' ),
				'add_new_item'          => __( 'Añadir alumno', 'academy-programacion' ),
				'edit_item'             => __( 'Editar alumno', 'academy-programacion' ),
				'new_item'              => __( 'Nuevo alumno', 'academy-programacion' ),
				'search_items'          => __( 'Buscar alumnos', 'academy-programacion' ),
				'not_found'             => __( 'No hay alumnos.', 'academy-programacion' ),
				'not_found_in_trash'    => __( 'No hay alumnos en la papelera.', 'academy-programacion' ),
				'all_items'             => __( 'Todos los alumnos', 'academy-programacion' ),
				'featured_image'        => __( 'Foto del alumno', 'academy-programacion' ),
				'set_featured_image'    => __( 'Elegir foto', 'academy-programacion' ),
				'remove_featured_image' => __( 'Quitar foto', 'academy-programacion' ),
				'use_featured_image'    => __( 'Usar como foto', 'academy-programacion' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => false,
			'menu_position'       => 26,
			'menu_icon'           => 'dashicons-groups',
			'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
			'capability_type'     => 'page',
			'map_meta_cap'        => true,
			'exclude_from_search' => true,
			'rewrite'             => false,
			'query_var'           => false,
		)
	);
}
add_action( 'init', 'academy_alumnos_register_cpt' );

/**
 * Las fotos se suben sin necesidad de que el tema declare soporte.
 */
function academy_alumnos_thumbnail_support() {
	add_theme_support( 'post-thumbnails', array( ACADEMY_ALUMNOS_CPT, 'post', 'page' ) );
}
add_action( 'after_setup_theme', 'academy_alumnos_thumbnail_support', 20 );

/**
 * Texto de ayuda en el campo del nombre.
 *
 * @param string  $text Texto por defecto.
 * @param WP_Post $post Entrada.
 * @return string
 */
function academy_alumnos_title_placeholder( $text, $post ) {
	return ACADEMY_ALUMNOS_CPT === $post->post_type ? __( 'Nombre con su grado (p. ej. Lic. Ana Pérez)', 'academy-programacion' ) : $text;
}
add_filter( 'enter_title_here', 'academy_alumnos_title_placeholder', 10, 2 );

/**
 * Caja «Datos del alumno».
 */
function academy_alumnos_meta_box() {
	add_meta_box( 'academy-alumno', __( 'Datos del alumno', 'academy-programacion' ), 'academy_alumnos_render_meta_box', ACADEMY_ALUMNOS_CPT, 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'academy_alumnos_meta_box' );

/**
 * Pinta la caja «Datos del alumno».
 *
 * @param WP_Post $post Entrada.
 */
function academy_alumnos_render_meta_box( $post ) {
	wp_nonce_field( 'academy_alumno_save', 'academy_alumno_nonce' );
	$ctmp      = get_post_meta( $post->ID, '_academy_ctmp', true );
	$formation = get_post_meta( $post->ID, '_academy_formation', true );
	$group     = get_post_meta( $post->ID, '_academy_group', true );
	$formation = $formation ? $formation : 'completa';
	?>
	<table class="form-table" role="presentation">
		<tr>
			<th scope="row"><label for="academy-ctmp"><?php esc_html_e( 'Colegiatura CTMP', 'academy-programacion' ); ?></label></th>
			<td><input type="text" id="academy-ctmp" name="academy_ctmp" value="<?php echo esc_attr( $ctmp ); ?>" class="regular-text" inputmode="numeric" placeholder="13837" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="academy-formation"><?php esc_html_e( 'Formación alcanzada', 'academy-programacion' ); ?></label></th>
			<td>
				<select id="academy-formation" name="academy_formation">
					<?php foreach ( academy_alumnos_formations() as $key => $label ) : ?>
						<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $formation, $key ); ?>><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="academy-group"><?php esc_html_e( 'Grupo (opcional)', 'academy-programacion' ); ?></label></th>
			<td>
				<input type="text" id="academy-group" name="academy_group" value="<?php echo esc_attr( $group ); ?>" class="regular-text" placeholder="2026-II" />
				<p class="description"><?php esc_html_e( 'Se muestra como etiqueta sobre el nombre. La foto se elige en «Foto del alumno» (cuadrada y con fondo blanco) y el orden en «Atributos → Orden».', 'academy-programacion' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Guarda los datos del alumno.
 *
 * @param int $post_id Entrada.
 */
function academy_alumnos_save( $post_id ) {
	if ( ! isset( $_POST['academy_alumno_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['academy_alumno_nonce'] ) ), 'academy_alumno_save' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$ctmp      = isset( $_POST['academy_ctmp'] ) ? sanitize_text_field( wp_unslash( $_POST['academy_ctmp'] ) ) : '';
	$formation = isset( $_POST['academy_formation'] ) ? sanitize_key( wp_unslash( $_POST['academy_formation'] ) ) : 'completa';
	$group     = isset( $_POST['academy_group'] ) ? sanitize_text_field( wp_unslash( $_POST['academy_group'] ) ) : '';

	if ( ! array_key_exists( $formation, academy_alumnos_formations() ) ) {
		$formation = 'completa';
	}

	update_post_meta( $post_id, '_academy_ctmp', $ctmp );
	update_post_meta( $post_id, '_academy_formation', $formation );
	update_post_meta( $post_id, '_academy_group', $group );
}
add_action( 'save_post_' . ACADEMY_ALUMNOS_CPT, 'academy_alumnos_save' );

/**
 * Vacía cachés al crear, editar o borrar alumnos.
 *
 * @param int $post_id Entrada.
 */
function academy_alumnos_changed( $post_id ) {
	if ( ACADEMY_ALUMNOS_CPT === get_post_type( $post_id ) && ! wp_is_post_revision( $post_id ) && function_exists( 'academy_programacion_purge_caches' ) ) {
		academy_programacion_purge_caches();
	}
}
add_action( 'save_post', 'academy_alumnos_changed', 20 );
add_action( 'deleted_post', 'academy_alumnos_changed' );

/* -------------------------------------------------------------------------
 * Listado en el escritorio
 * ---------------------------------------------------------------------- */

/**
 * Columnas del listado.
 *
 * @param string[] $columns Columnas.
 * @return string[]
 */
function academy_alumnos_columns( $columns ) {
	return array(
		'cb'                => $columns['cb'],
		'academy_photo'     => __( 'Foto', 'academy-programacion' ),
		'title'             => __( 'Nombre', 'academy-programacion' ),
		'academy_ctmp'      => __( 'CTMP', 'academy-programacion' ),
		'academy_formation' => __( 'Formación', 'academy-programacion' ),
		'academy_group'     => __( 'Grupo', 'academy-programacion' ),
		'menu_order'        => __( 'Orden', 'academy-programacion' ),
	);
}
add_filter( 'manage_' . ACADEMY_ALUMNOS_CPT . '_posts_columns', 'academy_alumnos_columns' );

/**
 * Contenido de las columnas.
 *
 * @param string $column  Columna.
 * @param int    $post_id Entrada.
 */
function academy_alumnos_column_content( $column, $post_id ) {
	switch ( $column ) {
		case 'academy_photo':
			echo get_the_post_thumbnail( $post_id, array( 48, 48 ), array( 'style' => 'border-radius:50%;width:48px;height:48px;object-fit:cover' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			break;
		case 'academy_ctmp':
			echo esc_html( get_post_meta( $post_id, '_academy_ctmp', true ) );
			break;
		case 'academy_formation':
			$formations = academy_alumnos_formations();
			$key        = get_post_meta( $post_id, '_academy_formation', true );
			echo esc_html( isset( $formations[ $key ] ) ? $formations[ $key ] : reset( $formations ) );
			break;
		case 'academy_group':
			echo esc_html( get_post_meta( $post_id, '_academy_group', true ) );
			break;
		case 'menu_order':
			echo (int) get_post_field( 'menu_order', $post_id );
			break;
	}
}
add_action( 'manage_' . ACADEMY_ALUMNOS_CPT . '_posts_custom_column', 'academy_alumnos_column_content', 10, 2 );

/**
 * En el escritorio, ordena por «Orden» como en la web.
 *
 * @param WP_Query $query Consulta.
 */
function academy_alumnos_admin_order( $query ) {
	if ( is_admin() && $query->is_main_query() && ACADEMY_ALUMNOS_CPT === $query->get( 'post_type' ) && ! $query->get( 'orderby' ) ) {
		$query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
	}
}
add_action( 'pre_get_posts', 'academy_alumnos_admin_order' );

/* -------------------------------------------------------------------------
 * Conexión con el tema
 * ---------------------------------------------------------------------- */

/**
 * Entrega al tema los alumnos publicados.
 *
 * Hasta que se importan los alumnos iniciales se respeta la lista del tema,
 * para que la página nunca aparezca vacía.
 *
 * @param array $alumni Alumnos por defecto del tema.
 * @return array
 */
function academy_alumnos_filter_alumni( $alumni ) {
	if ( ! get_option( ACADEMY_ALUMNOS_SEEDED ) ) {
		return $alumni;
	}

	$posts = get_posts(
		array(
			'post_type'      => ACADEMY_ALUMNOS_CPT,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
		)
	);

	return array_map(
		function ( $post ) {
			return array(
				'name'      => get_the_title( $post ),
				'ctmp'      => (string) get_post_meta( $post->ID, '_academy_ctmp', true ),
				'formation' => (string) get_post_meta( $post->ID, '_academy_formation', true ),
				'group'     => (string) get_post_meta( $post->ID, '_academy_group', true ),
				'image_id'  => (int) get_post_thumbnail_id( $post ),
			);
		},
		$posts
	);
}
add_filter( 'academy_alumni', 'academy_alumnos_filter_alumni' );

/* -------------------------------------------------------------------------
 * Importación inicial
 * ---------------------------------------------------------------------- */

/**
 * La primera vez que alguien con permisos entra al escritorio:
 *   1. Importa los alumnos que trae el tema (con sus fotos) si aún no hay ninguno.
 *   2. Crea la página «Alumnos» (/alumnos/) si no existe.
 */
function academy_alumnos_seed() {
	if ( get_option( ACADEMY_ALUMNOS_SEEDED ) || ! current_user_can( academy_programacion_capability() ) || ! function_exists( 'academy_alumni_defaults' ) ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$imported = 0;
	$existing = get_posts(
		array(
			'post_type'      => ACADEMY_ALUMNOS_CPT,
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( ! $existing ) {
		foreach ( academy_alumni_defaults() as $i => $alumno ) {
			$post_id = wp_insert_post(
				array(
					'post_type'   => ACADEMY_ALUMNOS_CPT,
					'post_status' => 'publish',
					'post_title'  => $alumno['name'],
					'menu_order'  => $i + 1,
					'meta_input'  => array(
						'_academy_ctmp'      => $alumno['ctmp'],
						'_academy_formation' => $alumno['formation'],
						'_academy_group'     => $alumno['group'],
					),
				),
				true
			);

			if ( is_wp_error( $post_id ) ) {
				continue;
			}
			$imported++;

			// Copia la foto del tema a la biblioteca de medios.
			$source = get_theme_file_path( $alumno['image'] );
			if ( ! empty( $alumno['image'] ) && file_exists( $source ) ) {
				$tmp = wp_tempnam( basename( $source ) );
				if ( $tmp && copy( $source, $tmp ) ) {
					$attachment_id = media_handle_sideload(
						array(
							'name'     => basename( $source ),
							'tmp_name' => $tmp,
						),
						$post_id,
						$alumno['name']
					);
					if ( is_wp_error( $attachment_id ) ) {
						wp_delete_file( $tmp );
					} else {
						update_post_meta( $attachment_id, '_wp_attachment_image_alt', 'Retrato de ' . $alumno['name'] );
						set_post_thumbnail( $post_id, $attachment_id );
					}
				}
			}
		}
	}

	$page_created = false;
	if ( ! get_page_by_path( 'alumnos' ) ) {
		$page_id      = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => 'Alumnos',
				'post_name'    => 'alumnos',
				'post_excerpt' => 'Conoce a los fisioterapeutas formados en la Formación Internacional en Punción Seca de Academy by Total Therapy, con su colegiatura CTMP.',
				'post_content' => '',
			)
		);
		$page_created = $page_id && ! is_wp_error( $page_id );
	}

	update_option( ACADEMY_ALUMNOS_SEEDED, 1, false );
	set_transient( 'academy_alumnos_seed_notice', array( $imported, $page_created ), 60 );
}
add_action( 'admin_init', 'academy_alumnos_seed' );

/**
 * Aviso tras la importación inicial.
 */
function academy_alumnos_seed_notice() {
	$data = get_transient( 'academy_alumnos_seed_notice' );
	if ( ! $data ) {
		return;
	}
	delete_transient( 'academy_alumnos_seed_notice' );

	list( $imported, $page_created ) = $data;
	$parts = array();
	if ( $imported ) {
		/* translators: %d: número de alumnos. */
		$parts[] = sprintf( _n( 'Se importó %d alumno con su foto.', 'Se importaron %d alumnos con sus fotos.', $imported, 'academy-programacion' ), $imported );
	}
	if ( $page_created ) {
		$parts[] = __( 'Se creó la página «Alumnos» (/alumnos/).', 'academy-programacion' );
	}
	if ( ! $parts ) {
		return;
	}

	printf(
		'<div class="notice notice-success is-dismissible"><p><strong>Academy:</strong> %1$s <a href="%2$s">%3$s</a></p></div>',
		esc_html( implode( ' ', $parts ) ),
		esc_url( admin_url( 'edit.php?post_type=' . ACADEMY_ALUMNOS_CPT ) ),
		esc_html__( 'Ver alumnos', 'academy-programacion' )
	);
}
add_action( 'admin_notices', 'academy_alumnos_seed_notice' );
