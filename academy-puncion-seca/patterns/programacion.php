<?php
/**
 * Title: Programación de la formación
 * Slug: academy-puncion/programacion
 * Categories: academy
 * Description: Tarjetas de programación por nivel (fechas, horario, almuerzo) y material académico incluido.
 * Keywords: programacion, fechas, horario, material
 * Viewport Width: 1400
 *
 * @package Academy
 */

$materials = esc_url( get_theme_file_uri( 'assets/images/chantal-materials.jpg' ) );

$cols = array(
	array( 'level' => 'Básico', 'mod' => 'head--navy', 'fechas' => array( '31 de Julio', '01 de Agosto' ) ),
	array( 'level' => 'Intermedio', 'mod' => 'head--orange', 'fechas' => array( '08 de Agosto', '15 de Agosto', '22 de Agosto' ) ),
	array( 'level' => 'Avanzado', 'mod' => 'head--navy', 'fechas' => array( '29 de Agosto', '03 de Octubre', '10 de Octubre' ) ),
);

$material = array(
	'Agujas en todas las medidas necesarias',
	'Guantes',
	'Algodón',
	'Contenedor rígido de objetos punzocortantes',
	'Bandeja metálica para instrumental',
	'Alcohol y clorhexidina',
);
?>
<!-- wp:group {"tagName":"section","className":"section section--programacion","anchor":"programacion","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section id="programacion" class="wp-block-group section section--programacion has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Programación de la <span class="has-orange-color has-text-color">formación</span></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted","style":{"typography":{"letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-muted-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--60);letter-spacing:0.18em;text-transform:uppercase">Clases presenciales</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="prog-grid">
<?php foreach ( $cols as $c ) : ?>
	<article class="prog-card">
		<header class="prog-card__head <?php echo esc_attr( $c['mod'] ); ?>"><?php echo esc_html( $c['level'] ); ?></header>
		<div class="prog-card__body">
			<p class="prog-card__label">Fechas</p>
			<ul class="prog-card__dates">
				<?php foreach ( $c['fechas'] as $f ) : ?><li><?php echo esc_html( $f ); ?></li><?php endforeach; ?>
			</ul>
			<p class="prog-card__label">Horario de clases</p>
			<p class="prog-card__pill">9:00 am a 8:00 pm</p>
			<p class="prog-card__label">Almuerzo</p>
			<p class="prog-card__pill">1:00 pm a 2:00 pm</p>
		</div>
	</article>
<?php endforeach; ?>
</div>
<!-- /wp:html -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Material académico</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Se facilitan todos los materiales de práctica en cada sesión:</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="check-list check-list--compact">
<?php foreach ( $material as $m ) : ?>
	<li><?php echo esc_html( $m ); ?></li>
<?php endforeach; ?>
</ul>
<!-- /wp:html -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">🎁 Manual de estudio actualizado impreso a color por cada módulo · Coffee break.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:image {"sizeSlug":"large","align":"center","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image aligncenter size-large" style="border-radius:16px"><img src="<?php echo $materials; ?>" alt="Material de práctica de punción seca" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"prog-address","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|50"}}},"backgroundColor":"gray","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group prog-address has-gray-background-color has-background" style="border-radius:12px;margin-top:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600">📍 Dirección:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Av. Juan Pablo Fernandini N.º 1550 – Pueblo Libre</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
