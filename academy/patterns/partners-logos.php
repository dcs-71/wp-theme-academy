<?php
/**
 * Title: Aliados · Logos
 * Slug: academy/partners-logos
 * Categories: academy
 * Description: Encabezado más los logos de las instituciones aliadas de la formación (CTMP y Seminarios Travell & Simons). Editable.
 * Keywords: partners, aliados, logos, marcas, travell simons, ctmp, colegio tecnologo medico
 * Viewport Width: 1400
 *
 * @package Academy
 */

$travell = academy_image_uri( 'assets/images/logo-travell-simons.webp' );
$ctmp    = academy_image_uri( 'assets/images/logo-ctmp.webp' );
?>
<!-- wp:group {"tagName":"section","className":"section section--partners","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--partners has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow","textColor":"orange","fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.14em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-center section__eyebrow has-orange-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--20);font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Respaldo institucional</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">En alianza con</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Una formación respaldada por instituciones de referencia en fisioterapia y en el abordaje del dolor miofascial.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"partners-row","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"stretch"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-group partners-row"><!-- wp:group {"className":"partner-card","layout":{"type":"default"}} -->
<div class="wp-block-group partner-card"><!-- wp:image {"height":"120px","sizeSlug":"large","className":"partner-logo"} -->
<figure class="wp-block-image size-large is-resized partner-logo"><img src="<?php echo $ctmp; ?>" alt="Colegio de Tecnólogos Médicos del Perú, Consejo Regional I" style="height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"partner-card__name"} -->
<p class="partner-card__name">Colegio de Tecnólogos Médicos del Perú</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"partner-card__text","fontSize":"small"} -->
<p class="partner-card__text has-small-font-size">Consejo Regional I</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"partner-card","layout":{"type":"default"}} -->
<div class="wp-block-group partner-card"><!-- wp:image {"height":"120px","sizeSlug":"large","className":"partner-logo"} -->
<figure class="wp-block-image size-large is-resized partner-logo"><img src="<?php echo $travell; ?>" alt="Seminarios Travell &amp; Simons" style="height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"partner-card__name"} -->
<p class="partner-card__name">Seminarios Travell &amp; Simons</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"partner-card__text","fontSize":"small"} -->
<p class="partner-card__text has-small-font-size">Referentes en dolor miofascial y puntos gatillo</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","className":"partners-note","textColor":"muted","fontSize":"small","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center partners-note has-muted-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--50)"><strong>Academy by Total Therapy</strong> es la unidad de formación en fisioterapia invasiva de los centros Total Therapy, en Lima, Perú.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
