<?php
/**
 * Title: Promo · Banner de inscripción
 * Slug: academy/cta-banner
 * Categories: academy, call-to-action
 * Description: Banner a ancho completo con foto de clase, overlay azul, lema de marca y botones de inscripción.
 * Keywords: cta, banner, promo, inscripcion, llamada a la accion
 * Viewport Width: 1400
 *
 * @package Academy
 */

$bg = academy_image_uri( 'assets/images/cta-formacion.webp' );
$wa = academy_whatsapp_url( 'Hola, solicito más información sobre la Formación Internacional en Punción Seca.' );
?>
<!-- wp:cover {"url":"<?php echo $bg; ?>","dimRatio":80,"overlayColor":"blue","minHeight":420,"contentPosition":"center center","className":"section section--promo","anchor":"inscripcion","align":"full","layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-cover alignfull section section--promo" id="inscripcion" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-blue-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $bg; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","className":"promo__eyebrow","textColor":"base","fontSize":"small"} -->
<p class="has-text-align-center promo__eyebrow has-base-color has-text-color has-small-font-size">Excelencia clínica</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"base","fontSize":"huge","style":{"typography":{"fontWeight":"700"}}} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-huge-font-size" style="font-weight:700">Formación que transforma. Impacto que perdura.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<p class="has-text-align-center has-base-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)">Vacantes limitadas por nivel para garantizar la práctica supervisada de cada participante.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="<?php echo $wa; ?>">Escríbenos por WhatsApp</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="#programa">Ver el programa</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
