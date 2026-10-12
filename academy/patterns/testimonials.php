<?php
/**
 * Title: Testimonios
 * Slug: academy/testimonials
 * Categories: academy, testimonials
 * Description: Cita de respaldo científico de la punción seca con fotos de participantes de la formación.
 * Keywords: testimonios, opiniones, alumnos, evidencia
 * Viewport Width: 1400
 *
 * @package Academy
 */

$avatares = array(
	array( 'img' => 'assets/images/alumno-1.webp', 'alt' => 'Participantes tomando apuntes durante la clase teórica de punción seca' ),
	array( 'img' => 'assets/images/alumno-2.webp', 'alt' => 'Participante revisando el manual de estudio impreso de la formación' ),
	array( 'img' => 'assets/images/alumno-3.webp', 'alt' => 'Participante realizando el marcaje anatómico antes de la punción' ),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--testimonials","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"gray","align":"full","layout":{"type":"constrained","contentSize":"880px"}} -->
<section class="wp-block-group alignfull section section--testimonials has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Respaldo científico</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Una técnica respaldada por la evidencia</h2>
<!-- /wp:heading -->

<!-- wp:quote {"className":"testimonial-quote","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<blockquote class="wp-block-quote testimonial-quote" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">La punción seca es una técnica respaldada científicamente para el tratamiento del dolor miofascial y los puntos gatillo, ayudando a disminuir el dolor, mejorar la movilidad y recuperar la función muscular.</p>
<!-- /wp:paragraph --><cite>Basado en las investigaciones de Janet Travell y estudios actuales en fisioterapia musculoesquelética</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:html -->
<div class="testimonials-people">
	<div class="testimonials-avatars">
	<?php foreach ( $avatares as $a ) : ?>
		<img src="<?php echo academy_image_uri( $a['img'] ); ?>" alt="<?php echo esc_attr( $a['alt'] ); ?>" width="240" height="240" loading="lazy" decoding="async" />
	<?php endforeach; ?>
	</div>
	<p class="testimonials-people__text"><strong>Grupo II</strong> · Participantes de la formación en Lima</p>
</div>
<!-- /wp:html --></section>
<!-- /wp:group -->
