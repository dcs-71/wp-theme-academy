<?php
/**
 * Title: Cierre · Excelencia clínica
 * Slug: academy-puncion/cta-final
 * Categories: academy, call-to-action
 * Description: Cierre oscuro con lema, redes sociales y sitio web.
 * Keywords: cta, cierre, contacto, redes
 * Viewport Width: 1400
 *
 * @package Academy
 */

$map = esc_url( get_theme_file_uri( 'assets/images/worldmap.jpg' ) );
?>
<!-- wp:cover {"url":"<?php echo $map; ?>","dimRatio":70,"overlayColor":"midnight","minHeight":480,"className":"section section--cta-final","align":"full","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-cover alignfull section section--cta-final" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-midnight-background-color has-background-dim has-background-dim-70"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $map; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":2,"textColor":"base","fontSize":"xx-large","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}}} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-xx-large-font-size" style="font-weight:700;line-height:1.3">Excelencia clínica.<br>Formación que <span class="has-orange-color has-text-color">transforma</span>.<br>Impacto que <span class="has-orange-color has-text-color">perdura</span>.</h2>
<!-- /wp:heading -->

<!-- wp:social-links {"iconColor":"base","iconColorValue":"#FFFFFF","size":"has-large-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<ul class="wp-block-social-links has-icon-color has-large-icon-size is-style-logos-only" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:social-link {"url":"#","service":"youtube"} /-->
<!-- wp:social-link {"url":"#","service":"facebook"} /-->
<!-- wp:social-link {"url":"#","service":"instagram"} /-->
<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:paragraph {"align":"center","textColor":"base","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}},"typography":{"fontWeight":"600"}}} -->
<p class="has-text-align-center has-base-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);font-weight:600"><a href="https://academy.totaltherapysa.com">academy.totaltherapysa.com</a></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->
