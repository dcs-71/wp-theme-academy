<?php
/**
 * Title: Docente · Directora académica
 * Slug: academy/instructor
 * Categories: academy
 * Description: Presentación de la Mg. Chantal Páucar con retrato, trayectoria y credenciales destacadas.
 * Keywords: docente, profesora, chantal paucar, equipo, directora
 * Viewport Width: 1400
 *
 * @package Academy
 */

$foto = academy_image_uri( 'assets/images/docente-chantal.webp' );

$credenciales = array(
	array(
		'titulo' => 'Especialista internacional',
		'texto'  => 'Fisioterapia Conservadora e Invasiva del Síndrome de Dolor Miofascial y de la Fibromialgia — Universidad de Castilla-La Mancha (España).',
	),
	array(
		'titulo' => 'Formación internacional',
		'texto'  => 'Kinematic Taping, Maitland, Redcord Neurac, Pilates Rehabilitación y Punción Seca.',
	),
	array(
		'titulo' => 'Pasantías internacionales',
		'texto'  => 'Indianápolis (USA), Universidad de los Andes (Colombia) y Universidad de Chile.',
	),
	array(
		'titulo' => 'Conferencista internacional',
		'texto'  => 'Ponente y conductora en Bolivia, Colombia y Perú.',
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--instructor","anchor":"docente","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--instructor has-base-background-color has-background" id="docente" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":"center","className":"instructor-layout","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center instructor-layout"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:image {"sizeSlug":"large","className":"instructor-photo","style":{"border":{"radius":"18px"},"shadow":"var:preset|shadow|card"}} -->
<figure class="wp-block-image size-large has-custom-border instructor-photo"><img src="<?php echo $foto; ?>" alt="Mg. Chantal Páucar, directora académica de Academy by Total Therapy, dictando una clase de punción seca" style="border-radius:18px;box-shadow:var(--wp--preset--shadow--card)"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:paragraph {"className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Equipo docente</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Mg. Chantal Páucar</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"blue","fontSize":"large","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="has-blue-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:600">Directora académica · Perú</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">CEO fundadora de los centros de fisioterapia Total Therapy y directora de Academy by Total Therapy. Licenciada en Tecnología Médica en Terapia Física y Rehabilitación por la Universidad Nacional Federico Villarreal.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Magíster en Gerencia de Servicios de Salud por la Universidad ESAN y diplomada en Didáctica Universitaria por la Universidad Inca Garcilaso de la Vega.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="credentials">
<?php foreach ( $credenciales as $c ) : ?>
	<li class="credential">
		<strong class="credential__title"><?php echo esc_html( $c['titulo'] ); ?></strong>
		<span class="credential__text"><?php echo esc_html( $c['texto'] ); ?></span>
	</li>
<?php endforeach; ?>
</ul>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
