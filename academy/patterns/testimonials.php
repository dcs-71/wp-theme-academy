<?php
/**
 * Title: Testimonios
 * Slug: academy/testimonials
 * Categories: academy, testimonials
 * Description: Sección de testimonios con avatares circulares y cita centrada.
 * Keywords: testimonios, opiniones, reseñas
 * Viewport Width: 1400
 *
 * @package Academy
 */

$av = esc_url( get_theme_file_uri( 'assets/images/placeholder-person.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--testimonials","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"gray","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--testimonials has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Lorem ipsum is simply dummy text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
<p class="has-text-align-center has-muted-color has-text-color">Lorem ipsum is simply</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="testimonials-avatars" aria-hidden="true">
	<img class="testimonials-avatars__side" src="<?php echo $av; ?>" alt="" loading="lazy" />
	<img class="testimonials-avatars__main" src="<?php echo $av; ?>" alt="" loading="lazy" />
	<img class="testimonials-avatars__side" src="<?php echo $av; ?>" alt="" loading="lazy" />
</div>
<!-- /wp:html -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<h3 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--40)">Lorem ipsum is</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
<p class="has-text-align-center has-muted-color has-text-color">Is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy text ever since.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
