<?php
/**
 * Title: Alumnos formados
 * Slug: academy/alumni
 * Categories: academy
 * Description: Cabecera, cuadrícula de alumnos formados (con colegiatura CTMP) y llamada a la acción para la próxima promoción.
 * Keywords: alumnos, egresados, formados, fisioterapeutas, ctmp
 * Viewport Width: 1400
 *
 * @package Academy
 */

$wa = academy_whatsapp_url( academy_whatsapp_message( 'reserva' ) );
?>
<!-- wp:group {"tagName":"section","className":"section alumni-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"navy","textColor":"base","align":"full","layout":{"type":"constrained","contentSize":"760px"}} -->
<section class="wp-block-group alignfull section alumni-hero has-base-color has-navy-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"hero__eyebrow alumni-hero__eyebrow","fontSize":"small"} -->
<p class="has-text-align-center hero__eyebrow alumni-hero__eyebrow has-small-font-size">Egresados de Academy</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"huge"} -->
<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-huge-font-size">Alumnos formados</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"alumni-hero__text","fontSize":"large"} -->
<p class="has-text-align-center alumni-hero__text has-large-font-size">Fisioterapeutas formados en punción seca en las formaciones internacionales de Academy by Total Therapy.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--alumni","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--alumni has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:html -->
[academy_alumnos]
<!-- /wp:html --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section alumni-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"gradient":"app","align":"full","layout":{"type":"constrained","contentSize":"760px"}} -->
<section class="wp-block-group alignfull section alumni-cta has-app-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2,"textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">¿Quieres ser parte de la próxima promoción?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"alumni-cta__text"} -->
<p class="has-text-align-center alumni-cta__text">Próximo Nivel Básico: <strong>[academy_fechas nivel=basico]</strong>. Vacantes limitadas para garantizar la práctica supervisada.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="<?php echo $wa; ?>">Reserva tu vacante</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="/#ruta">Ver la ruta de formación</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
