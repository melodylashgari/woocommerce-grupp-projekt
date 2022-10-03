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
define( 'DB_NAME', 'woo_grupp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         '+Lm1)Hu1+3?ABtUT#rm U)O-wTL-N$9/dIW $>+z!U n4zDUOd(8~*E<FMNhE0n?' );
define( 'SECURE_AUTH_KEY',  '],TmP%7?4WWX{svw_ W~`[YZyiHGe#OZ_!33aB}5%eJ,cYl^W3^xC!lq_jOD>^F,' );
define( 'LOGGED_IN_KEY',    'ZkhcWgARF`jgp ;?)X40EH):W0&MW#]sz0kP1H@ nQEKA|%GGN>~vcB{&+kQ+*nu' );
define( 'NONCE_KEY',        'Jjo1rzK%1XevT1aLRTkNV)iwMlsAfHeV}Y(ZCTN}%Vn~vfie_.`$M_#G5h:EzD[`' );
define( 'AUTH_SALT',        '2]0KJ@dF4aV#_>9.itsBY,`o11gYuGa&IHUwwF1d{$;aZ&5&M+Z,>mAna`FuE}{F' );
define( 'SECURE_AUTH_SALT', 'BST9+FQ3mGU1D/12sRpLnO50$DTTZdT=hz@>oZmHe_?oS7F.aK47nc$3>3.R%)f,' );
define( 'LOGGED_IN_SALT',   '>5/Yjkka9=!Qn|kb_*oL}BGuwc#I^f-|0Z3d-C!X}>KPwUz#Fw/~:$!g.6]<|&Ic' );
define( 'NONCE_SALT',       'd<v8:2%<QF]5A&Fra(]vls2q>}/BvZ.&vQXbS+Wn#~3)(;/R`NZInF=-xQ4K)D$F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vmg_';

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
