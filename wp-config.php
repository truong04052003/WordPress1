<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'IP6iiirOaszC9WyQeHfZB3LBRSUacLtzeaMY60d4Jksg3St2qZZjWNsh6X3kSk56' );
define( 'SECURE_AUTH_KEY',  'N9zbnI5roM51Cor1ozseXGrudfqVDDSDHKKyQd9TYlvfSPlLjdySikW19kKL0bVF' );
define( 'LOGGED_IN_KEY',    'PCH14tQQAraNkD6w7297arxwou96BiCYKQvBckRBc12Fi2knfCsXJvJnWhQpJjpB' );
define( 'NONCE_KEY',        'UVaU8SttOLEbP5ZGgSlkw5epKSDP3a23eptbWnMrr15E9Yc99R1v63d7ZEyR10hb' );
define( 'AUTH_SALT',        '6IE1oeDJd4kmCbzHMYeGjkGRBFujPEqhVr4iSghDH7GledHeQEvuaFLSLj9FkajD' );
define( 'SECURE_AUTH_SALT', 'zOzOE4d60UVu8tvXN8DIAk2S9O9A00wMLkFAMwH3XLuLu8WxUVudnUcd1jTnwqcn' );
define( 'LOGGED_IN_SALT',   'ZfNu8A82YrJq6kXYVsW2yzcajHeHyfgOMfRQSUJdeIh2UusA8wb1LrgPLrqvlejR' );
define( 'NONCE_SALT',       'pG20A71XNZym3cqZ3NfkwOmtvAjOYl1RNa56YiMnuE4ikQXEj7SM0XjsvzXDa2rl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
