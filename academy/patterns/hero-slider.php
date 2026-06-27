<?php
/**
 * Title: Hero · Slider principal
 * Slug: academy/hero-slider
 * Categories: academy, featured
 * Description: Slider de portada con foto de fondo, título, subtítulo y botón. Editable desde el bloque Academy Hero Slider.
 * Keywords: hero, slider, portada, carrusel
 * Block Types: core/post-content
 * Viewport Width: 1400
 *
 * @package Academy
 */

$bg = esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.svg' ) );

$slides = array(
	array( 'title' => 'Lorem Ipsum has been standard dummy text', 'text' => 'Lorem ipsum is simply dummy text' ),
	array( 'title' => 'Formación en fisioterapia de alto nivel', 'text' => 'Cursos presenciales y online para profesionales' ),
);
?>
<!-- wp:academy/hero-slider {"autoplay":true,"loop":true,"delay":6000,"align":"full"} -->
<?php foreach ( $slides as $s ) : ?>
<!-- wp:cover {"url":"<?php echo $bg; ?>","dimRatio":0,"minHeight":600,"className":"academy-slide","align":"full"} -->
<div class="wp-block-cover alignfull academy-slide" style="min-height:600px"><img class="wp-block-cover__image-background" alt="" src="<?php echo $bg; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"hero__content","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group hero__content"><!-- wp:heading {"textAlign":"center","level":1,"textColor":"navy","fontSize":"huge","style":{"typography":{"fontWeight":"700"}}} -->
<h1 class="wp-block-heading has-text-align-center has-navy-color has-text-color has-huge-font-size" style="font-weight:700"><?php echo esc_html( $s['title'] ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"navy","fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<p class="has-text-align-center has-navy-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html( $s['text'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"backgroundColor":"orange","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-orange-background-color has-text-color has-background wp-element-button" href="/cursos">Lorem ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<?php endforeach; ?>
<!-- /wp:academy/hero-slider -->
