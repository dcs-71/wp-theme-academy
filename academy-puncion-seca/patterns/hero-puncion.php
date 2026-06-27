<?php
/**
 * Title: Hero · Punción Seca
 * Slug: academy-puncion/hero
 * Categories: academy, featured
 * Description: Portada oscura de la Formación Internacional en Punción Seca con título, docente, CTA y alianzas.
 * Keywords: hero, portada, puncion seca
 * Viewport Width: 1400
 *
 * @package Academy
 */

$anatomy = esc_url( get_theme_file_uri( 'assets/images/hero-anatomy.jpg' ) );
$ctmp    = esc_url( get_theme_file_uri( 'assets/images/logo-ctmp.png' ) );
$travell = esc_url( get_theme_file_uri( 'assets/images/logo-travell.png' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--hero-ps","backgroundColor":"midnight","textColor":"base","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--hero-ps has-base-color has-midnight-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:heading {"level":1,"textColor":"base","fontSize":"huge","style":{"typography":{"fontWeight":"700","lineHeight":"1.05"}}} -->
<h1 class="wp-block-heading has-base-color has-text-color has-huge-font-size" style="font-weight:700;line-height:1.05">Formación <span class="has-orange-color has-text-color">Internacional</span> en Punción Seca</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<p class="has-base-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--40)">Dirigido por: <strong>Mg. Chantal Páucar</strong> 🇵🇪</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"color":{"text":"#cfd6ff"}}} -->
<p class="has-text-color" style="color:#cfd6ff">Tres niveles presenciales —Básico, Intermedio y Avanzado— para dominar la fisioterapia invasiva del síndrome de dolor miofascial.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="#programacion">Inscríbete ahora</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="#ruta">Ver ruta de formación</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}},"typography":{"letterSpacing":"0.12em","textTransform":"uppercase","fontSize":"0.75rem"},"color":{"text":"#8a8fa8"}}} -->
<p class="has-text-color" style="color:#8a8fa8;margin-top:var(--wp--preset--spacing--50);font-size:0.75rem;letter-spacing:0.12em;text-transform:uppercase">En alianza con</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"hero-ps__allies","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-group hero-ps__allies"><!-- wp:image {"width":"70px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo $ctmp; ?>" alt="Colegio de Tecnólogos Médicos del Perú" style="width:70px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"width":"150px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo $travell; ?>" alt="Seminarios Travell &amp; Simons" style="width:150px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"hero-ps__img"} -->
<figure class="wp-block-image aligncenter size-large hero-ps__img"><img src="<?php echo $anatomy; ?>" alt="Anatomía de la columna y musculatura"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
