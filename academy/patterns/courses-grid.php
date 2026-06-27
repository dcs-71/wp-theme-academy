<?php
/**
 * Title: Cursos · Grid con tabs
 * Slug: academy/courses-grid
 * Categories: academy
 * Description: Sección de cursos con pestañas de filtro y tarjetas (profesor, valoración, alumnos, duración y precio).
 * Keywords: cursos, grid, cards, catalogo
 * Viewport Width: 1400
 *
 * @package Academy
 */

$img = esc_url( get_theme_file_uri( 'assets/images/placeholder-course.svg' ) );

$badge = '<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14h3l2 2 3-6 2 4h6"/><path d="M12 21s-6-4.35-6-8a3 3 0 0 1 6-1 3 3 0 0 1 6 1c0 .5-.1 1-.3 1.5"/></svg>';
$ic_user = '<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.2"/><path d="M5 20c0-3.3 3.1-5 7-5s7 1.7 7 5"/></svg>';
$ic_clock = '<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg>';

$courses = array(
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
	array( 'prof' => 'Nombre profesor', 'title' => 'Lorem Ipsum has been the industry\'s standard dummy text', 'alumnos' => '150 alumnos', 'dur' => '1h 15 min', 'price' => 'S/ 69' ),
);

$tabs = array( 'Lorem', 'Lorem', 'Lorem', 'Lorem' );
?>
<!-- wp:group {"tagName":"section","className":"section section--courses","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group section section--courses has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Lorem ipsum is simply dummy text</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
<p class="has-text-align-center has-muted-color has-text-color">Lorem ipsum is simply</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="course-tabs" role="tablist" aria-label="Filtrar cursos">
<?php foreach ( $tabs as $idx => $tab ) : ?>
	<button type="button" class="course-tabs__tab<?php echo 0 === $idx ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $idx ? 'true' : 'false'; ?>"><?php echo esc_html( $tab ); ?></button>
<?php endforeach; ?>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"courses-grid","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group courses-grid" style="margin-top:var(--wp--preset--spacing--50)">
<?php foreach ( $courses as $c ) : ?>
<!-- wp:group {"className":"card card--course","style":{"border":{"radius":"16px"},"spacing":{"blockGap":"0"},"shadow":"var:preset|shadow|card"},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group card card--course has-base-background-color has-background" style="border-radius:16px;box-shadow:var(--wp--preset--shadow--card)"><!-- wp:html -->
<div class="card__media">
	<img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $c['title'] ); ?>" loading="lazy" />
	<span class="card__badge" aria-hidden="true"><?php echo $badge; ?></span>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"card__body","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group card__body" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"textColor":"blue","fontSize":"small","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<p class="has-blue-color has-text-color has-small-font-size" style="margin-bottom:0"><?php echo esc_html( $c['prof'] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large","style":{"typography":{"fontWeight":"600"}}} -->
<h3 class="wp-block-heading has-large-font-size" style="font-weight:600"><?php echo esc_html( $c['title'] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"rating-stars","fontSize":"small","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<p class="rating-stars has-small-font-size" style="margin-bottom:0">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="card__meta">
	<span class="card__meta-item"><?php echo $ic_user; ?> <?php echo esc_html( $c['alumnos'] ); ?></span>
	<span class="card__meta-item"><?php echo $ic_clock; ?> <?php echo esc_html( $c['dur'] ); ?></span>
	<span class="card__price"><?php echo esc_html( $c['price'] ); ?></span>
</div>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></section>
<!-- /wp:group -->
