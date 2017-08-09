<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dashboard_ebpc1');

/** MySQL database username */
define('DB_USER', 'dashboard_ebpc1');

/** MySQL database password */
define('DB_PASSWORD', 'D[qW^w*QhmNyPB))8A,83.#8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '31bm5socHg5nMeZk64avUOKQjVRphYp0Z0rlbaMmAEquv13gLdKnITKes8XGXSvT');
define('SECURE_AUTH_KEY',  'oItzOL8BUu3ItWaReh67wOBlKdZhwk56sfPJx11PJ3yFByoBb3ZQGgWBPruueykm');
define('LOGGED_IN_KEY',    's153CvCIj8yH3ribyRkExAuQY3dOuVmnLWGZYEGucctjM8cyhd1xBVFZ0yOps8tr');
define('NONCE_KEY',        'zyqgolUwj9lbFHVLuWrYTOOMDk9lwx1K3qgTqaxGjCErkp2f8jnjzwJbAgSpqd7I');
define('AUTH_SALT',        'ILIQgdoXeyEproMLquQWspdg4mA5Hs2kxBTe4Q2zGnWBgwHkYqtvOSdAlF8ddvpr');
define('SECURE_AUTH_SALT', 'UWWWRXjQUiOSBlB8XGqzuBfYSVMpvsydZfEOWDkhkWRiZMymYHtL14a1DCIKNsDH');
define('LOGGED_IN_SALT',   'AFPNFl502lBGMwgtO1O4TRPRRXDFtoMGCDlBp5Ku2YEkDYpca25NZmwSLbYAPXBf');
define('NONCE_SALT',       'BQzIr3OHFzXkDwzXGt6fvg0pTJuycTV83EquegfraroRMVrNlNJXbnu3VTjV9YPG');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0777);define('FS_CHMOD_FILE',0666);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ebpc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');