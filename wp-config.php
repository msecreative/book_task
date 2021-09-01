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
define( 'DB_NAME', 'task' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'An,6`HUMkMKTs7znYO_:]b|Zg(tu!3G0G8W}6m/!9ZS?V[VS&iRB89Z3Ug 4z`Xe' );
define( 'SECURE_AUTH_KEY',  '-KN;KcZa%Z,gMxT`1*P[HotcNSL#+egFRKv~#E,BDR_pt3DxpFici,{)cAMFRX$@' );
define( 'LOGGED_IN_KEY',    '4WBDr]v%* q% <Jqn+UV`?Ls} i06enjA[C6R_mFJa*?nP.IeDu;+-X@]a-,OG/0' );
define( 'NONCE_KEY',        'rzyYQlqS@B@zeM0(Lvwr_|+&1~~#MsL#U(XjDjhlM7$j9qIlBKgV10gNto,QkR0b' );
define( 'AUTH_SALT',        'yfgA}.z0k5hr2`!R#}t*;g% >F0=v6Hvn56Jh/Ws[lLHGl}7PxL;KY$;QnZg&ma`' );
define( 'SECURE_AUTH_SALT', 'tHg6l]<4T1nG@s3A3l2*v0@&}B#}|ni JaywX<ZMJ!Wfm&JDEK-y:8<[QgmIEVDH' );
define( 'LOGGED_IN_SALT',   'YrhO+V=r(,pr@e(aCqjflFmQ<t!!IxD^9$}vo%T;6!paF9|JT|FFb1z?GYH*_2Lg' );
define( 'NONCE_SALT',       'm,_Vosxvkzu9litE`{de);!yhhE^8@[:voZWAIA#b~g[qz*UT?4E[8reYtcqGQ&c' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
