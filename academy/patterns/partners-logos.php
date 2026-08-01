<?php
/**
 * Title: Aliados · Logos
 * Slug: academy/partners-logos
 * Categories: academy
 * Description: Encabezado más los logos de las instituciones aliadas de la formación. Editable.
 * Keywords: partners, aliados, logos, marcas, travell simons
 * Viewport Width: 1400
 *
 * @package Academy
 */

$travell = esc_url( get_theme_file_uri( 'assets/images/logo-travell-simons.jpg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--partners","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--partners has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">En alianza con</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Una formación respaldada por instituciones de referencia en el abordaje del dolor miofascial.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"partners-row","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|60"}}} -->
<div class="wp-block-group partners-row"><!-- wp:image {"width":"260px","sizeSlug":"large","className":"partner-logo partner-logo--full"} -->
<figure class="wp-block-image size-large is-resized partner-logo partner-logo--full"><img src="<?php echo $travell; ?>" alt="Seminarios Travell &amp; Simons" style="width:260px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"partner-note","layout":{"type":"default"}} -->
<div class="wp-block-group partner-note"><!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-navy-color has-text-color" style="font-weight:600">Academy by Total Therapy</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size">Unidad de formación en fisioterapia invasiva de los centros Total Therapy, en Lima, Perú.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
