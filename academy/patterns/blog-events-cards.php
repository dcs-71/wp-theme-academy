<?php
/**
 * Title: Blog y eventos · Destacado + cards
 * Slug: academy/blog-events-cards
 * Categories: academy, posts
 * Description: Una entrada destacada con badge de fecha y dos tarjetas secundarias. Editable.
 * Keywords: blog, eventos, noticias, cards
 * Viewport Width: 1400
 *
 * @package Academy
 */

$img = esc_url( get_theme_file_uri( 'assets/images/placeholder-course.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--blog","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--blog has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Lorem ipsum is simply dummy text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-text-align-center has-muted-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Lorem ipsum is simply</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"blog-layout"} -->
<div class="wp-block-columns blog-layout"><!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%"><!-- wp:html -->
<article class="blog-featured">
	<img class="blog-featured__img" src="<?php echo $img; ?>" alt="Entrada destacada" loading="lazy" />
	<span class="blog-featured__overlay"></span>
	<div class="date-badge"><span class="date-badge__day">28</span><span class="date-badge__month">Marzo</span></div>
	<div class="blog-featured__content">
		<p class="blog-featured__title">is simply dummy text of the printing and typesetting industry</p>
		<div class="blog-featured__meta">
			<span>8:00 am – 5:00 pm</span>
			<span>Texto locación: Lima, Perú</span>
		</div>
	</div>
</article>
<!-- /wp:html --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%"} -->
<div class="wp-block-column" style="flex-basis:42%"><!-- wp:html -->
<article class="blog-mini">
	<img class="blog-mini__img" src="<?php echo $img; ?>" alt="Entrada" loading="lazy" />
	<div class="blog-mini__body">
		<span class="blog-mini__date">28 Marzo, 2021</span>
		<p class="blog-mini__cat">Categoría</p>
		<p class="blog-mini__text">is simply dummy text of and typesetting</p>
	</div>
</article>
<article class="blog-mini">
	<img class="blog-mini__img" src="<?php echo $img; ?>" alt="Entrada" loading="lazy" />
	<div class="blog-mini__body">
		<span class="blog-mini__date">28 Marzo, 2021</span>
		<p class="blog-mini__cat">Categoría</p>
		<p class="blog-mini__text">is simply dummy text of and typesetting</p>
	</div>
</article>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center","className":"blog-more","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"typography":{"fontWeight":"500"}}} -->
<p class="has-text-align-center blog-more" style="margin-top:var(--wp--preset--spacing--40);font-weight:500"><a href="#">has been the industry's standard →</a></p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
