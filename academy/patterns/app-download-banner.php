<?php
/**
 * Title: App · Banner de descarga
 * Slug: academy/app-download-banner
 * Categories: academy, call-to-action
 * Description: Banner a ancho completo con gradiente, texto, badges de tiendas y mockup de la app.
 * Keywords: app, descarga, banner, movil
 * Viewport Width: 1400
 *
 * @package Academy
 */

$phone = esc_url( get_theme_file_uri( 'assets/images/placeholder-app.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--app","gradient":"app","align":"full","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group alignfull section section--app has-app-gradient-background has-background"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":2,"textColor":"base","fontSize":"xx-large","style":{"typography":{"fontWeight":"700"}}} -->
<h2 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size" style="font-weight:700">Lorem ipsum is simply dummy text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","style":{"elements":{"link":{"color":{"text":"#cfd6ff"}}},"color":{"text":"#cfd6ff"}}} -->
<p class="has-text-color" style="color:#cfd6ff">is simply dummy text of the printing and typesetting industry. Lorem ipsum</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="app-badges">
	<a class="store-badge store-badge--light" href="#"><span class="store-badge__icon"></span><span class="store-badge__text"><small>Available now on the</small><strong>App Store</strong></span></a>
	<a class="store-badge store-badge--light" href="#"><span class="store-badge__icon store-badge__icon--play"></span><span class="store-badge__text"><small>Available now on the</small><strong>Google Play</strong></span></a>
</div>
<!-- /wp:html --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%"><!-- wp:image {"sizeSlug":"large","align":"center","className":"app-mockup"} -->
<figure class="wp-block-image aligncenter size-large app-mockup"><img src="<?php echo $phone; ?>" alt="App de Academy"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
