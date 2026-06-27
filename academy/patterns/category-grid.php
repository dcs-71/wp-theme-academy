<?php
/**
 * Title: Categorías · Grid 4×2
 * Slug: academy/category-grid
 * Categories: academy
 * Description: Ocho tarjetas de categoría con overlay e imagen, más un botón central. Editable.
 * Keywords: categorias, grid, cards
 * Viewport Width: 1400
 *
 * @package Academy
 */

$img = esc_url( get_theme_file_uri( 'assets/images/placeholder-category.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--categories","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--categories has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"className":"category-grid","layout":{"type":"grid","columnCount":4}} -->
<div class="wp-block-group category-grid">
<?php for ( $i = 0; $i < 8; $i++ ) : ?>
<!-- wp:cover {"url":"<?php echo $img; ?>","dimRatio":50,"overlayColor":"navy","minHeight":150,"className":"category-card","style":{"border":{"radius":"14px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover category-card" style="border-radius:14px;min-height:150px"><span aria-hidden="true" class="wp-block-cover__background has-navy-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $img; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","textColor":"base","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-text-align-center has-base-color has-text-color" style="font-weight:600">Lorem ipsum<br>15</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->
<?php endfor; ?>
</div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"navy","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-navy-background-color has-text-color has-background wp-element-button" href="/cursos">Lorem ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
