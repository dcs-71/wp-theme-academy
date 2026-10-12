<?php
/**
 * Title: Preguntas frecuentes
 * Slug: academy/faq
 * Categories: academy
 * Description: Preguntas frecuentes sobre la Formación Internacional en Punción Seca en acordeones nativos, con datos estructurados FAQPage.
 * Keywords: faq, preguntas, dudas, inscripcion, puncion seca
 * Viewport Width: 1400
 *
 * @package Academy
 */

/*
 * Las preguntas alimentan a la vez el acordeón visible y el JSON-LD de
 * FAQPage, así que basta con editar este array para mantener ambos al día.
 */
$faqs = array(
	array(
		'q' => '¿Qué es la Formación Internacional en Punción Seca de Academy by Total Therapy?',
		'a' => 'Es un programa presencial en Lima dirigido por la Mg. Chantal Páucar, en alianza con Seminarios Travell & Simons y el Colegio de Tecnólogos Médicos del Perú. Enseña el diagnóstico y tratamiento del síndrome de dolor miofascial mediante punción seca, con teoría basada en la evidencia y práctica supervisada.',
	),
	array(
		'q' => '¿A quién está dirigida?',
		'a' => 'A fisioterapeutas y tecnólogos médicos en terapia física y rehabilitación que quieren incorporar la punción seca a su práctica clínica con criterios de seguridad.',
	),
	array(
		'q' => '¿Cuánto dura y cómo se organiza?',
		'a' => 'Son tres niveles progresivos: Básico (2 jornadas, 20 horas académicas), Intermedio (3 jornadas, 30 horas) y Avanzado (3 jornadas, 30 horas). En total, 80 horas académicas y 101 músculos abordados.',
	),
	array(
		'q' => '¿Las clases son presenciales?',
		'a' => 'Sí. Todas las clases son 100% presenciales en Lima, de 9:00 a. m. a 8:00 p. m. con almuerzo de 1:00 p. m. a 2:00 p. m., en grupos reducidos y con práctica supervisada en camilla en cada sesión.',
	),
	array(
		'q' => '¿Qué materiales están incluidos?',
		'a' => 'Agujas en todas las medidas necesarias, guantes, algodón, alcohol, clorhexidina, contenedor de punzocortantes, bandeja metálica, manual de estudio impreso a color por módulo y coffee break en todas las jornadas, sin costos adicionales.',
	),
	array(
		'q' => '¿Cómo me inscribo?',
		'a' => 'Escríbenos por WhatsApp al +51 993 582 936 y te enviamos fechas, inversión y el proceso de inscripción. Las vacantes por nivel son limitadas para garantizar la práctica supervisada.',
	),
);

$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);
foreach ( $faqs as $f ) {
	$schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $f['q'],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => $f['a'],
		),
	);
}

$wa = academy_whatsapp_url( 'Hola, tengo una consulta sobre la Formación Internacional en Punción Seca.' );
?>
<!-- wp:group {"tagName":"section","className":"section section--faq","anchor":"preguntas","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"cream","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--faq has-cream-background-color has-background" id="preguntas" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Resolvemos tus dudas</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Preguntas frecuentes sobre la formación en punción seca</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Lo que más nos preguntan antes de reservar una vacante.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="faq-list">
<?php foreach ( $faqs as $i => $f ) : ?>
	<details class="faq-item"<?php echo 0 === $i ? ' open' : ''; ?>>
		<summary class="faq-item__question"><h3><?php echo esc_html( $f['q'] ); ?></h3></summary>
		<div class="faq-item__answer"><p><?php echo esc_html( $f['a'] ); ?></p></div>
	</details>
<?php endforeach; ?>
</div>
<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center","className":"faq-more","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center faq-more" style="margin-top:var(--wp--preset--spacing--50)">¿Tienes otra pregunta? <a href="<?php echo $wa; ?>">Escríbenos por WhatsApp</a></p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
