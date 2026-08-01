<?php
/**
 * Title: Testimonios
 * Slug: academy/testimonials
 * Categories: academy, testimonials
 * Description: Sección con avatares de participantes y la cita de respaldo científico de la punción seca.
 * Keywords: testimonios, opiniones, alumnos, evidencia
 * Viewport Width: 1400
 *
 * @package Academy
 */

$avatares = array(
	array( 'img' => 'assets/images/alumno-1.jpg', 'alt' => 'Participantes tomando apuntes durante la clase teórica', 'class' => 'testimonials-avatars__side' ),
	array( 'img' => 'assets/images/alumno-2.jpg', 'alt' => 'Participante revisando el manual de estudio',           'class' => 'testimonials-avatars__main' ),
	array( 'img' => 'assets/images/alumno-3.jpg', 'alt' => 'Participante realizando el marcaje anatómico',          'class' => 'testimonials-avatars__side' ),
);
?>
<!-- wp:group {"tagName":"section","className":"section section--testimonials","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"gray","layout":{"type":"constrained","contentSize":"760px"}} -->
<section class="wp-block-group section section--testimonials has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Una técnica respaldada por la evidencia</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
<p class="has-text-align-center has-muted-color has-text-color">Grupo II · Academy by Total Therapy</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="testimonials-avatars">
<?php foreach ( $avatares as $a ) : ?>
	<img class="<?php echo esc_attr( $a['class'] ); ?>" src="<?php echo esc_url( get_theme_file_uri( $a['img'] ) ); ?>" alt="<?php echo esc_attr( $a['alt'] ); ?>" loading="lazy" />
<?php endforeach; ?>
</div>
<!-- /wp:html -->

<!-- wp:quote {"className":"testimonial-quote","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<blockquote class="wp-block-quote testimonial-quote" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"center","fontSize":"x-large"} -->
<p class="has-text-align-center has-x-large-font-size">La punción seca es una técnica respaldada científicamente para el tratamiento del dolor miofascial y los puntos gatillo, ayudando a disminuir el dolor, mejorar la movilidad y recuperar la función muscular.</p>
<!-- /wp:paragraph --><cite>Basado en las investigaciones de Janet Travell y estudios actuales en fisioterapia musculoesquelética</cite></blockquote>
<!-- /wp:quote --></section>
<!-- /wp:group -->
