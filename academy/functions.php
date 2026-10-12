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
	define( 'ACADEMY_VERSION', '1.5.1' );
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

	// Deja que WordPress gestione la etiqueta <title> (clave para SEO).
	add_theme_support( 'title-tag' );

	// Hoja de estilos del editor para consistencia frontend/editor.
	add_editor_style( array( 'assets/css/editor.css', 'assets/css/components.css' ) );
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

/* -------------------------------------------------------------------------
 * SEO
 *
 * El tema cubre lo esencial sin plugins: <title> de la portada, meta
 * description, canonical, Open Graph, Twitter Cards, iconos y datos
 * estructurados (organización, sitio web, curso y docente).
 *
 * Si se instala Yoast, Rank Math, AIOSEO o SEOPress, el tema se aparta solo
 * y deja que el plugin gestione estas etiquetas (ver academy_seo_plugin_active).
 * ---------------------------------------------------------------------- */

/**
 * Textos SEO de la portada. Es el único sitio donde se editan.
 *
 * El título y la descripción incluyen las dos búsquedas objetivo:
 * «Academy by Total Therapy» y «Formación Internacional en Punción Seca».
 *
 * @return array<string,string>
 */
function academy_seo_texts() {
	return array(
		'brand'       => 'Academy by Total Therapy',
		'course'      => 'Formación Internacional en Punción Seca',
		'title'       => 'Formación Internacional en Punción Seca | Academy by Total Therapy',
		'description' => 'Academy by Total Therapy: Formación Internacional en Punción Seca en Lima con la Mg. Chantal Páucar. 3 niveles, 80 horas y práctica supervisada.',
	);
}

/**
 * ¿Hay un plugin de SEO que ya imprime estas etiquetas?
 *
 * @return bool
 */
function academy_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' )
		|| class_exists( 'RankMath' )
		|| defined( 'AIOSEO_VERSION' )
		|| defined( 'SEOPRESS_VERSION' );
}

/**
 * Separador del <title>: «Página | Academy by Total Therapy».
 */
function academy_title_separator() {
	return '|';
}
add_filter( 'document_title_separator', 'academy_title_separator' );

/**
 * <title> de la portada con las palabras clave principales.
 *
 * @param string $title Título calculado por WordPress (vacío si no se fuerza).
 * @return string
 */
function academy_front_page_title( $title ) {
	if ( is_front_page() && ! academy_seo_plugin_active() ) {
		$texts = academy_seo_texts();
		return $texts['title'];
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'academy_front_page_title' );

/**
 * Lema del sitio, ignorando el texto por defecto de WordPress.
 *
 * @return string
 */
function academy_site_tagline() {
	$tagline  = trim( wp_strip_all_tags( get_bloginfo( 'description', 'display' ) ) );
	$defaults = array( 'Just another WordPress site', 'Otro sitio realizado con WordPress' );

	return in_array( $tagline, $defaults, true ) ? '' : $tagline;
}

/**
 * Descripción breve y limpia para la vista actual (≤160 caracteres).
 *
 * Portada → texto SEO fijo. Entradas/páginas → extracto o contenido.
 * Resto → lema del sitio o, en su defecto, el texto de la portada.
 *
 * @return string
 */
function academy_meta_description() {
	$texts = academy_seo_texts();
	$desc  = '';

	if ( is_front_page() ) {
		return $texts['description'];
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post ) {
			$desc = has_excerpt( $post ) ? get_the_excerpt( $post ) : strip_shortcodes( $post->post_content );
		}
	}

	if ( '' === trim( wp_strip_all_tags( $desc ) ) ) {
		$desc = academy_site_tagline();
	}

	if ( '' === $desc ) {
		$desc = $texts['description'];
	}

	$desc = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( $desc ) ) );

	if ( function_exists( 'mb_strlen' ) && mb_strlen( $desc ) > 160 ) {
		$desc = rtrim( mb_substr( $desc, 0, 157 ) ) . '…';
	}

	return $desc;
}

/**
 * Imagen para redes sociales (Open Graph / Twitter / WhatsApp).
 *
 * Imagen destacada si existe; si no, la tarjeta social del tema (1200×630).
 *
 * @return array{url:string,width:int,height:int,alt:string}
 */
function academy_social_image() {
	if ( is_singular() && has_post_thumbnail() ) {
		$id  = get_post_thumbnail_id( get_queried_object_id() );
		$src = wp_get_attachment_image_src( $id, 'large' );
		if ( $src ) {
			return array(
				'url'    => $src[0],
				'width'  => (int) $src[1],
				'height' => (int) $src[2],
				'alt'    => (string) get_post_meta( $id, '_wp_attachment_image_alt', true ),
			);
		}
	}

	return array(
		'url'    => get_theme_file_uri( 'assets/images/og-academy.jpg' ),
		'width'  => 1200,
		'height' => 630,
		'alt'    => 'Formación Internacional en Punción Seca de Academy by Total Therapy',
	);
}

/**
 * URL canónica de la vista actual.
 *
 * @return string
 */
function academy_current_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}

	if ( is_singular() ) {
		$url = wp_get_canonical_url();
		return $url ? $url : get_permalink();
	}

	return '';
}

/**
 * Datos estructurados (JSON-LD) en un único @graph.
 *
 * En la portada describe la organización, el sitio, la docente y el curso,
 * de modo que Google relacione «Academy by Total Therapy» con la
 * «Formación Internacional en Punción Seca».
 *
 * @return array
 */
function academy_schema_graph() {
	$texts = academy_seo_texts();
	$home  = home_url( '/' );
	$org   = $home . '#organization';

	$graph = array(
		array(
			'@type'              => 'EducationalOrganization',
			'@id'                => $org,
			'name'               => $texts['brand'],
			'alternateName'      => array( 'Academy Total Therapy', 'Academy TT' ),
			'url'                => $home,
			'logo'               => array(
				'@type'  => 'ImageObject',
				'url'    => get_theme_file_uri( 'assets/images/icon-512.png' ),
				'width'  => 512,
				'height' => 512,
			),
			'image'              => get_theme_file_uri( 'assets/images/og-academy.jpg' ),
			'description'        => 'Unidad de formación en fisioterapia invasiva de los centros Total Therapy en Lima, Perú.',
			'telephone'          => '+' . ACADEMY_WHATSAPP,
			'address'            => array(
				'@type'           => 'PostalAddress',
				'addressLocality' => 'Lima',
				'addressCountry'  => 'PE',
			),
			'parentOrganization' => array(
				'@type' => 'MedicalBusiness',
				'name'  => 'Total Therapy',
			),
		),
		array(
			'@type'         => 'WebSite',
			'@id'           => $home . '#website',
			'url'           => $home,
			'name'          => $texts['brand'],
			'alternateName' => 'Academy Total Therapy',
			'inLanguage'    => 'es-PE',
			'publisher'     => array( '@id' => $org ),
		),
	);

	if ( is_front_page() ) {
		$person = $home . '#chantal-paucar';

		$graph[] = array(
			'@type'            => 'Person',
			'@id'              => $person,
			'name'             => 'Chantal Páucar',
			'honorificPrefix'  => 'Mg.',
			'jobTitle'         => 'Directora académica',
			'image'            => get_theme_file_uri( 'assets/images/docente-chantal.webp' ),
			'worksFor'         => array( '@id' => $org ),
			'nationality'      => 'PE',
			'alumniOf'         => array(
				array( '@type' => 'CollegeOrUniversity', 'name' => 'Universidad Nacional Federico Villarreal' ),
				array( '@type' => 'CollegeOrUniversity', 'name' => 'Universidad ESAN' ),
				array( '@type' => 'CollegeOrUniversity', 'name' => 'Universidad de Castilla-La Mancha' ),
			),
			'knowsAbout'       => array( 'Punción seca', 'Síndrome de dolor miofascial', 'Fisioterapia invasiva', 'Puntos gatillo miofasciales' ),
		);

		$levels = array(
			array( 'Nivel Básico', 'Síndrome de dolor miofascial, diagnóstico, seguridad y primeras técnicas de punción seca (músculos 1 al 17). 20 horas académicas.' ),
			array( 'Nivel Intermedio', 'Punción seca de miembro inferior y superior con práctica supervisada (músculos 18 al 59). 30 horas académicas.' ),
			array( 'Nivel Avanzado', 'Punción seca torácica, paravertebral profunda, cráneo-cervical, mano y tronco (músculos 60 al 101). 30 horas académicas.' ),
		);

		$instances = array();
		foreach ( $levels as $level ) {
			$instances[] = array(
				'@type'       => 'CourseInstance',
				'name'        => $texts['course'] . ' · ' . $level[0],
				'description' => $level[1],
				'courseMode'  => 'Onsite',
				'inLanguage'  => 'es',
				'location'    => array(
					'@type'   => 'Place',
					'name'    => $texts['brand'],
					'address' => array(
						'@type'           => 'PostalAddress',
						'addressLocality' => 'Lima',
						'addressCountry'  => 'PE',
					),
				),
				'instructor'  => array( '@id' => $person ),
			);
		}

		$graph[] = array(
			'@type'             => 'Course',
			'@id'               => $home . '#formacion-puncion-seca',
			'name'              => $texts['course'],
			'description'       => 'Formación presencial en punción seca para fisioterapeutas en Lima, Perú: tres niveles progresivos, 80 horas académicas y 101 músculos abordados con práctica supervisada, en alianza con Seminarios Travell & Simons y el Colegio de Tecnólogos Médicos del Perú.',
			'url'               => $home,
			'image'             => get_theme_file_uri( 'assets/images/og-academy.jpg' ),
			'inLanguage'        => 'es',
			'provider'          => array( '@id' => $org ),
			'teaches'           => array( 'Punción seca', 'Tratamiento del síndrome de dolor miofascial', 'Puntos gatillo miofasciales', 'Fisioterapia invasiva' ),
			'educationalLevel'  => 'Básico, Intermedio y Avanzado',
			'audience'          => array(
				'@type'        => 'EducationalAudience',
				'audienceType' => 'Fisioterapeutas y tecnólogos médicos en terapia física',
			),
			'hasCourseInstance' => $instances,
		);
	}

	return array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);
}

/**
 * Idioma del contenido. Todo el tema está en español: si el sitio quedó con
 * WordPress en otro idioma, se declara igualmente español de Perú.
 *
 * @return string Código BCP 47 (p. ej. «es-PE»).
 */
function academy_content_language() {
	$lang = get_bloginfo( 'language' );
	return 0 === strpos( $lang, 'es' ) ? $lang : 'es-PE';
}

/**
 * Corrige el atributo lang de <html> para que Google sepa que la página está
 * en español aunque el escritorio de WordPress esté en otro idioma.
 *
 * @param string $output Atributos de idioma generados por WordPress.
 * @return string
 */
function academy_language_attributes( $output ) {
	if ( is_admin() ) {
		return $output;
	}
	return preg_replace( '/lang="[^"]*"/', 'lang="' . esc_attr( academy_content_language() ) . '"', $output );
}
add_filter( 'language_attributes', 'academy_language_attributes' );

/**
 * Inyecta las etiquetas SEO en el <head>.
 */
function academy_seo_head() {
	if ( is_admin() || is_feed() || is_robots() || academy_seo_plugin_active() ) {
		return;
	}

	$texts = academy_seo_texts();
	$desc  = academy_meta_description();
	$title = wp_get_document_title();
	$url   = academy_current_url();
	$img   = academy_social_image();
	$type  = is_singular() && ! is_front_page() ? 'article' : 'website';

	echo "\n<!-- Academy SEO -->\n";

	if ( $desc ) {
		printf( "<meta name=\"description\" content=\"%s\" />\n", esc_attr( $desc ) );
	}

	// WordPress ya imprime la canonical en entradas y páginas; aquí solo
	// cubrimos la portada cuando muestra el template en lugar de una página.
	if ( $url && is_front_page() && ! is_singular() ) {
		printf( "<link rel=\"canonical\" href=\"%s\" />\n", esc_url( $url ) );
	}

	// Open Graph.
	printf( "<meta property=\"og:type\" content=\"%s\" />\n", esc_attr( $type ) );
	printf( "<meta property=\"og:title\" content=\"%s\" />\n", esc_attr( $title ) );
	if ( $desc ) {
		printf( "<meta property=\"og:description\" content=\"%s\" />\n", esc_attr( $desc ) );
	}
	if ( $url ) {
		printf( "<meta property=\"og:url\" content=\"%s\" />\n", esc_url( $url ) );
	}
	printf( "<meta property=\"og:site_name\" content=\"%s\" />\n", esc_attr( $texts['brand'] ) );
	printf( "<meta property=\"og:locale\" content=\"%s\" />\n", esc_attr( str_replace( '-', '_', academy_content_language() ) ) );
	printf( "<meta property=\"og:image\" content=\"%s\" />\n", esc_url( $img['url'] ) );
	printf( "<meta property=\"og:image:width\" content=\"%d\" />\n", (int) $img['width'] );
	printf( "<meta property=\"og:image:height\" content=\"%d\" />\n", (int) $img['height'] );
	if ( $img['alt'] ) {
		printf( "<meta property=\"og:image:alt\" content=\"%s\" />\n", esc_attr( $img['alt'] ) );
	}

	// Twitter Card.
	echo "<meta name=\"twitter:card\" content=\"summary_large_image\" />\n";
	printf( "<meta name=\"twitter:title\" content=\"%s\" />\n", esc_attr( $title ) );
	if ( $desc ) {
		printf( "<meta name=\"twitter:description\" content=\"%s\" />\n", esc_attr( $desc ) );
	}
	printf( "<meta name=\"twitter:image\" content=\"%s\" />\n", esc_url( $img['url'] ) );

	printf(
		"<script type=\"application/ld+json\">%s</script>\n",
		wp_json_encode( academy_schema_graph(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);

	echo "<!-- /Academy SEO -->\n";
}
add_action( 'wp_head', 'academy_seo_head', 5 );

/**
 * Favicon e icono para móviles a partir del isotipo, solo si no se ha
 * configurado un «Icono del sitio» en Ajustes → Generales.
 */
function academy_site_icons() {
	if ( has_site_icon() ) {
		return;
	}

	printf( "<link rel=\"icon\" href=\"%s\" sizes=\"48x48\" type=\"image/png\" />\n", esc_url( get_theme_file_uri( 'assets/images/favicon-48.png' ) ) );
	printf( "<link rel=\"icon\" href=\"%s\" sizes=\"192x192\" type=\"image/png\" />\n", esc_url( get_theme_file_uri( 'assets/images/icon-192.png' ) ) );
	printf( "<link rel=\"apple-touch-icon\" href=\"%s\" />\n", esc_url( get_theme_file_uri( 'assets/images/apple-touch-icon.png' ) ) );
	echo "<meta name=\"theme-color\" content=\"#5667FF\" />\n";
}
add_action( 'wp_head', 'academy_site_icons', 4 );

/**
 * Aviso en el escritorio si el sitio está oculto a los buscadores.
 *
 * Es la causa más común de que una web nueva no aparezca en Google:
 * la casilla «Disuade a los motores de búsqueda…» queda marcada tras el
 * desarrollo.
 */
function academy_search_visibility_notice() {
	if ( '0' !== (string) get_option( 'blog_public' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-error"><p><strong>%1$s</strong> %2$s <a href="%3$s">%4$s</a></p></div>',
		esc_html__( 'Google no puede indexar este sitio.', 'academy' ),
		esc_html__( 'Está marcada la opción «Disuade a los motores de búsqueda de indexar este sitio».', 'academy' ),
		esc_url( admin_url( 'options-reading.php' ) ),
		esc_html__( 'Desmárcala en Ajustes → Lectura.', 'academy' )
	);
}
add_action( 'admin_notices', 'academy_search_visibility_notice' );

/**
 * Precarga recursos críticos para acelerar el primer render (Core Web Vitals).
 *
 * - Poppins 400 (texto) y 700 (titulares) visibles al cargar.
 * - La primera imagen del hero (candidata a LCP) en la portada, con el mismo
 *   srcset que usa el slider para que el navegador no la descargue dos veces.
 */
function academy_preload_assets() {
	if ( is_admin() ) {
		return;
	}

	$fonts = array( 'poppins-400.woff2', 'poppins-700.woff2' );
	foreach ( $fonts as $font ) {
		printf(
			"<link rel=\"preload\" href=\"%s\" as=\"font\" type=\"font/woff2\" crossorigin />\n",
			esc_url( get_theme_file_uri( 'assets/fonts/' . $font ) )
		);
	}

	if ( is_front_page() ) {
		printf(
			"<link rel=\"preload\" as=\"image\" href=\"%1\$s\" imagesrcset=\"%2\$s\" imagesizes=\"100vw\" fetchpriority=\"high\" />\n",
			academy_image_uri( 'assets/images/hero-1.webp' ),
			esc_attr( academy_image_srcset( 'assets/images/hero-1.webp' ) )
		);
	}
}
add_action( 'wp_head', 'academy_preload_assets', 2 );

/**
 * Anchos disponibles de cada imagen del tema que tiene variante móvil.
 *
 * La variante se llama igual con el sufijo `-900` (p. ej. `hero-1-900.webp`).
 *
 * @return array<string,int> Ruta relativa => ancho de la imagen original.
 */
function academy_responsive_images() {
	return array(
		'assets/images/hero-1.webp'        => 1800,
		'assets/images/hero-2.webp'        => 1800,
		'assets/images/hero-3.webp'        => 1800,
		'assets/images/cta-formacion.webp' => 1800,
	);
}

/**
 * srcset (variante móvil de 900 px + original) para una imagen del tema.
 *
 * @param string $path Ruta relativa dentro del tema.
 * @return string Cadena srcset sin escapar, o vacía si no hay variante.
 */
function academy_image_srcset( $path ) {
	$images = academy_responsive_images();
	if ( ! isset( $images[ $path ] ) ) {
		return '';
	}

	$small = preg_replace( '/\.webp$/', '-900.webp', $path );

	return sprintf(
		'%s 900w, %s %dw',
		academy_image_uri( $small ),
		academy_image_uri( $path ),
		$images[ $path ]
	);
}

/**
 * Añade srcset/sizes a las imágenes de fondo de los Cover del tema.
 *
 * Los Cover no admiten srcset en su marcado guardado sin invalidar el bloque
 * en el editor, así que se añade al renderizar. En móvil se sirve la versión
 * de 900 px (≈45 KB) en lugar de la de 1800 px (≈170 KB).
 *
 * @param string $html  HTML renderizado del bloque.
 * @return string
 */
function academy_cover_srcset( $html ) {
	if ( false === strpos( $html, 'wp-block-cover__image-background' ) || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $html;
	}

	// Los Cover que no abren la página se cargan en diferido. El hero interior
	// sí se ve al cargar; el slider gestiona sus propias prioridades.
	$lazy = false === strpos( $html, 'hero-internal' );

	$tags = new WP_HTML_Tag_Processor( $html );
	while ( $tags->next_tag( array( 'tag_name' => 'img', 'class_name' => 'wp-block-cover__image-background' ) ) ) {
		$tags->set_attribute( 'decoding', 'async' );
		if ( $lazy && null === $tags->get_attribute( 'loading' ) ) {
			$tags->set_attribute( 'loading', 'lazy' );
		}

		$src = (string) $tags->get_attribute( 'src' );
		foreach ( array_keys( academy_responsive_images() ) as $path ) {
			if ( false !== strpos( $src, '/' . $path ) ) {
				$tags->set_attribute( 'srcset', academy_image_srcset( $path ) );
				$tags->set_attribute( 'sizes', '100vw' );
				break;
			}
		}
	}

	return $tags->get_updated_html();
}
add_filter( 'render_block_core/cover', 'academy_cover_srcset' );

/**
 * Dimensiones reales de una imagen del tema (para width/height).
 *
 * @param string $src URL de la imagen.
 * @return array{0:int,1:int}|null
 */
function academy_theme_image_size( $src ) {
	static $cache = array();

	$base = get_theme_file_uri( 'assets/images/' );
	$path = strtok( (string) $src, '?' );

	// Las partes HTML usan rutas relativas (/wp-content/themes/academy/...).
	$rel = wp_make_link_relative( $base );
	if ( 0 === strpos( $path, $rel ) ) {
		$file = substr( $path, strlen( $rel ) );
	} elseif ( 0 === strpos( $path, $base ) ) {
		$file = substr( $path, strlen( $base ) );
	} else {
		return null;
	}

	if ( ! isset( $cache[ $file ] ) ) {
		$size           = wp_getimagesize( get_theme_file_path( 'assets/images/' . basename( $file ) ) );
		$cache[ $file ] = $size ? array( (int) $size[0], (int) $size[1] ) : null;
	}

	return $cache[ $file ];
}

/**
 * Completa las imágenes de los bloques Imagen del tema al renderizar:
 * width/height (evita saltos de diseño, CLS), lazy-load y decodificación
 * asíncrona. Se hace aquí y no en el marcado para no invalidar los bloques
 * en el editor. El logo del header se excluye del lazy-load por estar
 * siempre visible al cargar.
 *
 * @param string $html  HTML renderizado.
 * @param array  $block Bloque.
 * @return string
 */
function academy_image_block_attributes( $html, $block ) {
	if ( ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $html;
	}

	$above_fold = false !== strpos( $block['attrs']['className'] ?? '', 'site-header__brand' );

	$tags = new WP_HTML_Tag_Processor( $html );
	if ( ! $tags->next_tag( 'img' ) ) {
		return $html;
	}

	$size = academy_theme_image_size( $tags->get_attribute( 'src' ) );
	if ( ! $size ) {
		return $html;
	}

	if ( null === $tags->get_attribute( 'width' ) ) {
		$tags->set_attribute( 'width', (string) $size[0] );
		$tags->set_attribute( 'height', (string) $size[1] );
	}
	$tags->set_attribute( 'decoding', 'async' );
	if ( $above_fold ) {
		// La prioridad alta es para la foto del hero (LCP), no para el logo.
		$tags->set_attribute( 'fetchpriority', 'auto' );
	} elseif ( null === $tags->get_attribute( 'loading' ) ) {
		$tags->set_attribute( 'loading', 'lazy' );
	}

	return $tags->get_updated_html();
}
add_filter( 'render_block_core/image', 'academy_image_block_attributes', 10, 2 );
