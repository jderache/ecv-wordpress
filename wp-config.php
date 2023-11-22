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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecv-wordpress-db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

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
define( 'AUTH_KEY',         '!S?(8;hO{d~Qm3,V5dT2P/C8x<Boiq_xp3p:9~uPr)w@FzSW8~1j._gM@@(Z~GVB' );
define( 'SECURE_AUTH_KEY',  '5gZzr619jO*zdm5mpIjGb/f$1YAB<,*VYOWZAO41]pRwUSFKcRPxnEQ*V:qhid}0' );
define( 'LOGGED_IN_KEY',    'ErJ^4h(`=e?&$K?zXqPDpx~q_>H_(+)ue`Kz@AQqw~USNmU]Hq+XE&eb{/0MG@`R' );
define( 'NONCE_KEY',        'Q<-aa~T$V/g8@i1_W1O[IvB|P74?k1UL@Np>(J`~QgStOVQ:<EPZG0WW$zb3%Tx[' );
define( 'AUTH_SALT',        'rVY9,tdSVOLVJrQ)zO;}{HQp_= 2)?l|}V_qd09!38i/0fmd3M?pi)q&#1]CLnZR' );
define( 'SECURE_AUTH_SALT', 'Sf)aWM4X_ibQl6Dnx>;i?zB[d`0AhI-Uvn8sn:Nqwlxe7p#-u?o6NM>S>Y c6PFM' );
define( 'LOGGED_IN_SALT',   't[}DVB}rgS,!Y-lVau7c;s|$EUK.rue5Dt3BtMZKS9Wg%w&4Ep^WB=r%5/3$^tL?' );
define( 'NONCE_SALT',       'd/epCAW:sCMVGX`ie46f4<-2rbcoTo-_yZ.3nWw>DHVvjp00 $|X,taxg<x^7J)Z' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
