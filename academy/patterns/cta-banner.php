<?php
/**
 * Title: Promo · Banner azul
 * Slug: academy/cta-banner
 * Categories: academy, call-to-action
 * Description: Banner a ancho completo con foto, overlay azul, título y botón de llamada a la acción.
 * Keywords: cta, banner, promo, llamada a la accion
 * Viewport Width: 1400
 *
 * @package Academy
 */

$bg = esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) );
?>
<!-- wp:cover {"url":"<?php echo $bg; ?>","dimRatio":80,"overlayColor":"blue","minHeight":420,"contentPosition":"center center","className":"section section--promo","align":"full","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-cover alignfull section section--promo" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-blue-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $bg; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"medium"} -->
<p class="has-text-align-center has-base-color has-text-color has-medium-font-size">Lorem ipsum is simply dummy text</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"base","fontSize":"huge","style":{"typography":{"fontWeight":"700"}}} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-huge-font-size" style="font-weight:700">Lorem Ipsum has been standard dummy text</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="/cursos">Lorem ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
