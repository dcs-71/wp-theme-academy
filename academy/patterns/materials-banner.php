<?php
/**
 * Title: Material académico · Banner
 * Slug: academy/materials-banner
 * Categories: academy, call-to-action
 * Description: Banner a ancho completo con gradiente que detalla el material de práctica incluido en la formación.
 * Keywords: material, agujas, manual, incluye, coffee break
 * Viewport Width: 1400
 *
 * @package Academy
 */

$foto = academy_image_uri( 'assets/images/material-aguja.jpg' );

$materiales = array(
	'Agujas en todas las medidas necesarias',
	'Guantes y algodón',
	'Contenedor rígido de objetos punzocortantes',
	'Bandeja metálica para instrumental',
	'Alcohol y clorhexidina',
	'Manual de estudio impreso a color por módulo',
	'Coffee break en todas las jornadas',
);
?>
<!-- wp:group {"tagName":"section","className":"section section--materials","anchor":"material","gradient":"app","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--materials has-app-gradient-background has-background" id="material"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:paragraph {"className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Todo incluido</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"textColor":"base","fontSize":"xx-large","style":{"typography":{"fontWeight":"700"}}} -->
<h2 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size" style="font-weight:700">Material académico y de práctica incluido</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#cfd6ff"}}} -->
<p class="has-text-color" style="color:#cfd6ff">Se facilitan todos los materiales necesarios en cada una de las sesiones de práctica, sin costos adicionales.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="materials-list">
<?php foreach ( $materiales as $m ) : ?>
	<li><?php echo esc_html( $m ); ?></li>
<?php endforeach; ?>
</ul>
<!-- /wp:html --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"materials-photo","style":{"border":{"radius":"18px"}}} -->
<figure class="wp-block-image aligncenter size-large has-custom-border materials-photo"><img src="<?php echo $foto; ?>" alt="Material de práctica de punción seca durante la formación" style="border-radius:18px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
