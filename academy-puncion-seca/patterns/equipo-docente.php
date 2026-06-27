<?php
/**
 * Title: Equipo docente
 * Slug: academy-puncion/equipo-docente
 * Categories: academy
 * Description: Presentación de la directora académica Mg. Chantal Páucar con credenciales y áreas destacadas.
 * Keywords: docente, equipo, profesor, chantal paucar
 * Viewport Width: 1400
 *
 * @package Academy
 */

$foto = esc_url( get_theme_file_uri( 'assets/images/chantal.jpg' ) );

$highlights = array(
	array(
		'icon'  => '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.5C10.5 5.5 8 5 5 5.5V18c3-.5 5.5 0 7 1 1.5-1 4-1.5 7-1V5.5C16 5 13.5 5.5 12 6.5z"/><path d="M12 6.5V19"/></svg>',
		'title' => 'Especialista en Fisioterapia',
		'text'  => 'Conservadora e invasiva del Síndrome del Dolor Miofascial y de la Fibromialgia en la Universidad de Castilla – La Mancha (España).',
	),
	array(
		'icon'  => '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.5 2.5 15 0 18M12 3c-2.5 2.5-2.5 15 0 18"/></svg>',
		'title' => 'Formación internacional',
		'text'  => 'En Kinematic Taping, Maitland, Redcord Neurac, Pilates Rehabilitación y Punción Seca.',
	),
	array(
		'icon'  => '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>',
		'title' => 'Pasantías internacionales',
		'text'  => 'En Indianápolis (USA), Universidad de los Andes (Colombia) y Universidad de Chile.',
	),
	array(
		'icon'  => '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5 11a7 7 0 0 0 14 0M12 18v3"/></svg>',
		'title' => 'Conferencista internacional',
		'text'  => 'En Bolivia, Colombia y Perú, y conductora de programas de formación.',
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--docente","anchor":"docente","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section id="docente" class="wp-block-group section section--docente has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Equipo <span class="has-orange-color has-text-color">docente</span></h2>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"docente__photo is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-large docente__photo is-style-rounded"><img src="<?php echo $foto; ?>" alt="Mg. Chantal Páucar"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%"><!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Mg. Chantal Páucar <span class="has-muted-color has-text-color">(Perú)</span></h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"docente__creds"} -->
<ul class="wp-block-list docente__creds"><!-- wp:list-item -->
<li>CEO fundadora de los centros de fisioterapia Total Therapy y directora de Academy by Total Therapy.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Lic. Tecnólogo Médico en Terapia Física y Rehabilitación en la Universidad Nacional Federico Villareal.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Magíster por la Universidad ESAN en Gerencia en Servicio de Salud. Diplomado en Didáctica Universitaria en la Universidad Inca Garcilazo de la Vega.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"docente-highlights","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"grid","columnCount":4}} -->
<div class="wp-block-group docente-highlights" style="margin-top:var(--wp--preset--spacing--60)">
<?php foreach ( $highlights as $h ) : ?>
<!-- wp:group {"className":"highlight-card","layout":{"type":"default"}} -->
<div class="wp-block-group highlight-card"><!-- wp:html -->
<span class="highlight-card__icon"><?php echo $h['icon']; ?></span>
<!-- /wp:html -->

<!-- wp:heading {"level":4,"fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php echo esc_html( $h['title'] ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $h['text'] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></section>
<!-- /wp:group -->
