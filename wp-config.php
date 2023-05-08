<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u389210813_rugged2' );

/** MySQL database username */
define( 'DB_USER', 'u389210813_rugged2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ruGGed2-u389210813' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2iMvhkahZyIHJKMIc56egP12QhrTqibmO4itYFzoWkyPoPTk7HwVfjTDGzhtLcAiiiZcgFkZqw4y29s+4QMndA==');
define('SECURE_AUTH_KEY',  'lDjVtiJBnnaRI49SjGhsY9+jpcK5ejFGvnnVuVugoGxD1K81UhGwwJFPyCzIa148xVaiFnBCSbUSiC8iV3Cp7g==');
define('LOGGED_IN_KEY',    'MhCHCD6uOy2aI39lpQ2sOq+mNS9lG+d4eL+AOWXgm4qmsZW43yLQQYFE1tieB8eNhVcS4Bkji/G7RFun9GTXbQ==');
define('NONCE_KEY',        'EE/z7bAWZW3YFSukheCvlBs52viDnzQRqL1aVuwDMEA6FO3A0jKACNwNFO86YqjIIPNJ8WyHLyi8y1ZvsWG4XA==');
define('AUTH_SALT',        'LhYdEoUA+vFbaNnH9Z9Tq/27oF4rLhCcVJ9HqL8Oym25gYtuWyl0zh4f50dNrBAryGWRdtEDMrfG7gvSHWml/w==');
define('SECURE_AUTH_SALT', 'EaXyF1ng5MPvFlDe5/brAOSncVYdAD6sIfwtRKzWCDwENWa8s+pjm3PT4uYLZOLJ6kf9qpPb3YalWHQQ/oh/TA==');
define('LOGGED_IN_SALT',   '8udkwtP0ANs3mUMBDcxFxTGUuQAaCKJHparax9jdMVPGyCQJR/XWd+hOqEAD7nLx/+DlLGI2NqIM4OW/GtRbLw==');
define('NONCE_SALT',       'Tu4NSQwWpdEGUlU4/TT8qXkPLXr1bPT+1+//VefL/QzYn+QD9++Jq5eiZ88K3/9SyLJW3luPvyXDqDpU+vwK8w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
