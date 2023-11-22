<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u956659655_2lRsx' );

/** Database username */
define( 'DB_USER', 'u956659655_4Thnv' );

/** Database password */
define( 'DB_PASSWORD', 's497BxVo5u' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          '&`w@<,LG7&5%XA3%)a?QM:r[#!%VRqQ7cQ2K~7^^DmZZM?SP?{?+XIUs>01a7jnH' );
define( 'SECURE_AUTH_KEY',   'b~)Zp_gqU!-XLfJJ8Ft]~BEQMQC>rUW,YS|gw.FFOgTk3OY>6esQ_-/ hO?4,q`H' );
define( 'LOGGED_IN_KEY',     'J1zDUWVl2qNzO[q}g|`j(BE%X)YjNVcE)^oL0mDK&F)IKqc(T57]-c]MsbthZ$ej' );
define( 'NONCE_KEY',         '8{qC7?;b^%[R}|dPn~faV=5d(MX#r97VJh{ZY`_yYp]Fz}zp-fcF8H7#b[~;iy.z' );
define( 'AUTH_SALT',         '5o}Vbus;^^mFY0()k9K>p><TooqA-Ewa2d8u9|:[X= j$LZl(yoPY;uMpfmra~`w' );
define( 'SECURE_AUTH_SALT',  'rsGa|om1L q(SiEBu&g7/lqcM^cF~L9u?3Z:W0]t0oQl3}$eNrK=Xo0[mTmYVe$1' );
define( 'LOGGED_IN_SALT',    'q5.{BrJ!]qZ*}2d@SiC^l/Q.t^U!y~tp34!RhPe <]uSY1@*/w)o6CS[c4G> 2xm' );
define( 'NONCE_SALT',        'eSu|S>(r;zGlp#Z0mW ^im,Gna ~$TZ[+^*+z&)C.=;JZK09DJ_#2s0_eUt Iwpx' );
define( 'WP_CACHE_KEY_SALT', 'LU *>LIh%kYqB8}bn?&jrgh!:mh%~4s{mKeS/p`Ma8; I Ew|uItH)Z82hv}NEyZ' );


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



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
