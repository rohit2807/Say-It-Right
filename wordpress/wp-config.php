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
define( 'DB_NAME', 'rohituta_wp1' );

/** MySQL database username */
define( 'DB_USER', 'rohituta_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'U.cvZRCGagHsr0GuBzy48' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'M5BtSnynmTvxHlMpjgjJu7FoyHif7sulfeM71VcTLt2NcugCRZrAa9HKHf3JqEGd');
define('SECURE_AUTH_KEY',  'TLfBKjRg277R2jxdoQONeHfWKwG4Tdy0pBZT2dqFNTqtbakYQTS6OP15V6PxI0j0');
define('LOGGED_IN_KEY',    'j7M3gUXnfPaq01ERxBpbi6RDvs3e5PfkIWJCWU0wrQJ6hxaOR9LEbKSCap1t7zTT');
define('NONCE_KEY',        't1h8KMLn4TvBXdKVI5uamegymm0kJ01l024roAL1aEIWINGt83mw7fj44nK56f2o');
define('AUTH_SALT',        '4oHjoCFzB6PArkez9SHOI4CgtCSn5UDqBgTkcr5XEcduYkhJBXQRrQj3NtQ134QS');
define('SECURE_AUTH_SALT', 'xjALuX5u1lNvGiEsLDj7ZItkhUWU7TGEb7EGOZAT3P8GsIenzTRKAdkGsAtN12pE');
define('LOGGED_IN_SALT',   'TClxpixgLXAclOtwPJjOa6tJufVOiDL1u0TfVwdU50tox020uYvSpzf8gyu8WQ2K');
define('NONCE_SALT',       'ub08pSi086ZjS8rAvRpudyoaMAbOfAdPP025uUq5c6cpng3ApNooHmCmYhymKHBf');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
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
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );