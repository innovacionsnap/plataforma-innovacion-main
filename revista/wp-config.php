<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'innovacionlab');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'innovacion');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '_K99JE5_~|:[Fd>j]><q6z{IV7|] N:O}O:zyt0SU8-QixlDI}TWO^_QA$>JV/|]');
define('SECURE_AUTH_KEY', 'lE?9-G8p~IYE)!hl?|)4gK(6,|-SQwvDzI- <0`w%gbb`-hZ(:T8p]Mch+ASB-sn');
define('LOGGED_IN_KEY', 'T4mT!lNj7+br2=vw)yZq-qr|T8o24SCxHwYfq=T,Z-SyEFc^^c:}hsR%{~M{9HAG');
define('NONCE_KEY', '0-<XA*4,8oIi!XjyL06sT5rd6ZO#F#Q?*-qXQjH&q[2 >Fu@6|A-Rp::qs9Y;9p6');
define('AUTH_SALT', 'k!}Z4~-F8B.),9>^GGo_Z5d4%M+t4M.3_Oi+:++fJR+-<6>0K$k>_rsKz)#ibnmy');
define('SECURE_AUTH_SALT', '|lN>p^/-l#8vo)GyQK< 1+u~ttaH1@Vm[Au5&,I!M4|tJ*GKgl+=-#O3@b(P%>AR');
define('LOGGED_IN_SALT', '^X3[`f-(risYuHyVZVU|9bIzj^N$cYsgDA$q5A+o|n;#/LY* i!R+c2S$Oft/(E%');
define('NONCE_SALT', 'cXc@gX%)UBMLCyEE9(Ce!7SHwEz%[H&%[uQCCsw9!}|n1>.U/RSq+9W84fQ6E)fn');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'ilab_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

