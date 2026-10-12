<?php
/**
 * Title: Programa · Temario por nivel
 * Slug: academy/program-content
 * Categories: academy
 * Description: Temario completo de la formación en acordeones nativos (contenidos y músculos de cada nivel).
 * Keywords: programa, temario, contenido, musculos, niveles
 * Viewport Width: 1400
 *
 * @package Academy
 */

$program = array(
	array(
		'nivel'    => 'Nivel Básico',
		'meta'     => '20 horas académicas',
		'open'     => true,
		'bloques'  => array(
			array(
				'titulo' => 'Contenido',
				'items'  => array(
					'Introducción al síndrome de dolor miofascial (SDM).',
					'Características del dolor miofascial.',
					'Criterios de diagnóstico.',
					'Factores de perpetuación.',
					'Tratamiento fisioterapéutico conservador del SDM: terapias manuales.',
					'Naturaleza de los puntos gatillo miofasciales (PGM).',
					'Principios de la fisioterapia invasiva: clasificación, indicaciones, contraindicaciones, peligros y complicaciones.',
					'Mecanismos de acción de las técnicas invasivas.',
					'Tratamiento conservador del SDM: técnicas instrumentales.',
					'Consentimiento informado.',
					'Toma de aguja en pinza y plana.',
				),
			),
			array(
				'titulo' => 'Peligros, complicaciones y contraindicaciones',
				'items'  => array(
					'Dolor.',
					'Neumotórax.',
					'Lesiones nerviosas.',
					'Lesiones viscerales.',
					'Infecciones.',
					'Reacciones vegetativas.',
					'Punción seca en el embarazo.',
					'Situaciones especiales, entre otros.',
				),
			),
			array(
				'titulo' => 'Músculos de este nivel (1 al 17)',
				'items'  => array(
					'Infraespinoso · Esternocleidomastoideo · Trapecio superior · Elevador de la escápula.',
					'Glúteo medio · Glúteo menor · Glúteo mayor · Tensor de la fascia lata · Piriforme.',
					'Recto femoral · Vasto medial · Vasto lateral · Vasto intermedio · Sartorio.',
					'Pectíneo · Aductor largo · Aductor corto.',
				),
			),
		),
	),
	array(
		'nivel'    => 'Nivel Intermedio',
		'meta'     => '30 horas académicas',
		'open'     => false,
		'bloques'  => array(
			array(
				'titulo' => 'Enfoque',
				'items'  => array(
					'Abordaje completo del miembro inferior: muslo, pierna, tobillo y pie.',
					'Abordaje completo del miembro superior: hombro, brazo, antebrazo y carpo.',
					'Progresión de la técnica de punción sobre musculatura profunda.',
					'Práctica supervisada en camilla durante todas las sesiones.',
				),
			),
			array(
				'titulo' => 'Músculos de este nivel (18 al 59)',
				'items'  => array(
					'Aductor mayor · Grácil · Bíceps femoral · Semimembranoso · Semitendinoso.',
					'Gastrocnemio · Sóleo · Poplíteo · Peroneos largo y corto · Tercer peroneo.',
					'Supraespinoso · Deltoides anterior, medio y posterior · Dorsal ancho · Redondo mayor y menor.',
					'Tibial anterior y posterior · Extensores y flexores largos de los dedos y del dedo gordo.',
					'Extensor corto de los dedos · Abductor del dedo gordo · Abductor del 5.º dedo · Flexor corto de los dedos.',
					'Cuadrado plantar · Flexor corto del dedo gordo · Aductor del dedo gordo · Interóseos dorsales y plantares.',
					'Braquial · Bíceps braquial · Coracobraquial · Tríceps (cabezas larga, corta y medial).',
					'Extensor cubital del carpo · Extensor radial corto y largo · Extensor de los dedos · Braquiorradial.',
				),
			),
		),
	),
	array(
		'nivel'    => 'Nivel Avanzado',
		'meta'     => '30 horas académicas',
		'open'     => false,
		'bloques'  => array(
			array(
				'titulo' => 'Contenido',
				'items'  => array(
					'Clarificación de conceptos y debate.',
					'Dolor referido de puntos gatillo ligamentosos.',
					'Punción seca torácica: particularidades y medidas de seguridad adicionales.',
					'Musculatura paravertebral profunda.',
					'Tratamientos conservador e invasivo.',
				),
			),
			array(
				'titulo' => 'Músculos de este nivel (60 al 101)',
				'items'  => array(
					'Supinador · Flexor radial y cubital del carpo · Palmar largo · Pronador redondo.',
					'Flexor superficial y profundo de los dedos · Flexor largo del pulgar · Aductor del pulgar.',
					'Oponente y flexor corto del pulgar · Interóseos dorsales y palmares.',
					'Masetero · Temporal · Pterigoideo medial y lateral · Digástrico.',
					'Frontooccipital · Cigomático mayor · Orbicular de los ojos · Platisma.',
					'Escalenos · Suboccipitales · Esplenio de la cabeza y del cuello · Semiespinoso de la cabeza.',
					'Multífidos cervicales, torácicos y lumbares · Subescapular.',
					'Pectoral mayor y menor · Trapecio medio e inferior · Romboides mayor y menor · Serrato anterior.',
					'Longísimo · Iliocostal · Serrato posteroinferior y posterosuperior.',
					'Recto abdominal · Oblicuo externo · Cuadrado lumbar · Iliopsoas.',
				),
			),
		),
	),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--program","anchor":"programa","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"}}},"backgroundColor":"cream","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--program has-cream-background-color has-background" id="programa" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Programa académico</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Temario completo de la formación</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">101 músculos abordados a lo largo de los tres niveles. Despliega cada nivel para ver el detalle.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="program-accordion">
<?php foreach ( $program as $p ) : ?>
	<details class="program-item"<?php echo $p['open'] ? ' open' : ''; ?>>
		<summary class="program-item__summary">
			<span class="program-item__title"><?php echo esc_html( $p['nivel'] ); ?></span>
			<span class="program-item__meta"><?php echo esc_html( $p['meta'] ); ?></span>
		</summary>
		<div class="program-item__body">
		<?php foreach ( $p['bloques'] as $b ) : ?>
			<h3 class="program-item__subtitle"><?php echo esc_html( $b['titulo'] ); ?></h3>
			<ul class="program-item__list">
			<?php foreach ( $b['items'] as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endforeach; ?>
		</div>
	</details>
<?php endforeach; ?>
</div>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center","className":"program-note","textColor":"muted","fontSize":"small","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<p class="has-text-align-center program-note has-muted-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">Horario de clases: 9:00 a. m. a 8:00 p. m. · Almuerzo: 1:00 p. m. a 2:00 p. m.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
