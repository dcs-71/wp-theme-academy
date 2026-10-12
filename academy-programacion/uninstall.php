<?php
/**
 * Borra la programación guardada al desinstalar el plugin.
 *
 * @package AcademyProgramacion
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'academy_programacion' );

// Los alumnos (entradas y fotos) se conservan a propósito: borrar el plugin no
// debe hacer perder ese contenido. Solo se olvida que ya se importaron.
delete_option( 'academy_alumnos_seeded' );
