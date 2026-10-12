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
