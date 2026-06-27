<?php
/**
 * Title: Partners · Logos
 * Slug: academy/partners-logos
 * Categories: academy
 * Description: Encabezado más una fila de logos de instituciones aliadas (atenuados). Editable.
 * Keywords: partners, aliados, logos, marcas
 * Viewport Width: 1400
 *
 * @package Academy
 */

$logo = esc_url( get_theme_file_uri( 'assets/images/placeholder-logo.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--partners","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--partners has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Lorem ipsum is simply dummy text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Lorem ipsum is simply</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"partners-row","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-group partners-row">
<?php for ( $i = 0; $i < 5; $i++ ) : ?>
<!-- wp:image {"width":"130px","sizeSlug":"large","className":"partner-logo"} -->
<figure class="wp-block-image size-large is-resized partner-logo"><img src="<?php echo $logo; ?>" alt="Logo de institución aliada" style="width:130px"/></figure>
<!-- /wp:image -->
<?php endfor; ?>
</div>
<!-- /wp:group --></section>
<!-- /wp:group -->
