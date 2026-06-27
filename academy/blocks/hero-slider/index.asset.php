<?php
/**
 * Dependencias y versión del script del editor (index.js).
 *
 * Como el tema no usa un paso de build (webpack/@wordpress/scripts), declaramos
 * a mano los paquetes de WordPress que index.js necesita. Sin este archivo,
 * WordPress encolaría index.js sin dependencias y `wp.blockEditor`/`wp.components`
 * no estarían disponibles al ejecutarse, impidiendo el registro del bloque.
 *
 * @package Academy
 */

return array(
	'dependencies' => array(
		'wp-blocks',
		'wp-element',
		'wp-block-editor',
		'wp-components',
		'wp-i18n',
	),
	'version' => '1.0.0',
);
