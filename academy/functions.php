<?php
/**
 * Academy by Total Therapy — functions.php
 *
 * Configuración mínima del Block Theme. La mayor parte de la presentación
 * vive en theme.json, templates, parts y patterns. Aquí solo:
 *   1. Soportes del tema.
 *   2. Encolado de estilos (frontend y editor).
 *   3. Encolado condicional de JS de interacción.
 *   4. Registro del bloque personalizado Hero Slider.
 *   5. Categoría de patrones del tema.
 *
 * @package Academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Salida directa bloqueada.
}

if ( ! defined( 'ACADEMY_VERSION' ) ) {
	define( 'ACADEMY_VERSION', '1.2.0' );
}

/**
 * Número de WhatsApp de Academy, en formato internacional y solo dígitos
 * (código de país + número, sin «+», espacios ni guiones).
 *
 * Es el único punto donde se declara el número para los patrones. Si cambia,
 * actualízalo aquí y también en `parts/header.html` y `parts/footer.html`,
 * que son HTML estático y no pueden llamar a PHP.
 */
if ( ! defined( 'ACADEMY_WHATSAPP' ) ) {
	define( 'ACADEMY_WHATSAPP', '51993582936' );
}

/**
 * Enlace de WhatsApp con un mensaje inicial ya escrito.
 *
 * Se usa en los CTA en lugar de páginas internas: así los botones funcionan
 * desde el primer momento, sin depender de que existan `/contacto` o similares.
 *
 * @param string $mensaje Texto con el que se abre la conversación.
 * @return string URL escapada lista para un atributo `href`.
 */
function academy_whatsapp_url( $mensaje = '' ) {
	$url = 'https://wa.me/' . ACADEMY_WHATSAPP;

	if ( '' !== $mensaje ) {
		$url = add_query_arg( 'text', rawurlencode( $mensaje ), $url );
	}

	return esc_url( $url );
}

/**
 * URL de una imagen del tema con la versión como query string.
 *
 * Las imágenes de los patrones conservan el mismo nombre entre versiones
 * (p. ej. `alumno-1.jpg`), así que al actualizar el tema el navegador seguiría
 * sirviendo la copia cacheada. Añadir `?ver=` fuerza la recarga.
 *
 * @param string $path Ruta relativa dentro del tema.
 * @return string URL escapada lista para usar en un atributo `src`/`url`.
 */
function academy_image_uri( $path ) {
	return esc_url( add_query_arg( 'ver', ACADEMY_VERSION, get_theme_file_uri( $path ) ) );
}

/**
 * Soportes del tema.
 */
function academy_theme_supports() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	// Hoja de estilos del editor para consistencia frontend/editor.
	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'academy_theme_supports' );

/**
 * Estilos del frontend.
 */
function academy_enqueue_styles() {
	wp_enqueue_style(
		'academy-global',
		get_theme_file_uri( 'assets/css/global.css' ),
		array(),
		ACADEMY_VERSION
	);

	wp_enqueue_style(
		'academy-components',
		get_theme_file_uri( 'assets/css/components.css' ),
		array( 'academy-global' ),
		ACADEMY_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'academy_enqueue_styles' );

/**
 * JS de navegación (menú móvil). Ligero, sin dependencias.
 */
function academy_enqueue_scripts() {
	wp_enqueue_script(
		'academy-navigation',
		get_theme_file_uri( 'assets/js/navigation.js' ),
		array(),
		ACADEMY_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'academy_enqueue_scripts' );

/**
 * Registro del bloque Hero Slider.
 *
 * Usa block.json (API v3). El script de frontend (view.js) se declara como
 * viewScript en block.json, por lo que WordPress solo lo carga cuando el
 * bloque está presente en la página. No depende de librerías externas.
 */
function academy_register_blocks() {
	register_block_type( get_theme_file_path( 'blocks/hero-slider' ) );
}
add_action( 'init', 'academy_register_blocks' );

/**
 * Categoría propia para los patrones del tema.
 */
function academy_register_pattern_category() {
	register_block_pattern_category(
		'academy',
		array( 'label' => __( 'Academy', 'academy' ) )
	);
}
add_action( 'init', 'academy_register_pattern_category' );
