<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'codenest' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'O?CTg[`b%m&?HjAduX7m:St$Lx[&-lH?+:[^7sNqubtV4yu>S}>70W_:d_xdXZl]' );
define( 'SECURE_AUTH_KEY',  'M|`}:0IR!W5D193E/lCKK5.(|4f0<v<CW){aZJih =Ohs,5zJ>(5t6(st sD5D)X' );
define( 'LOGGED_IN_KEY',    'tC`XM85ui6>.jhjb&^>ZhD?zIxk|?%*%Php2rr==/o>kTg;IYnCQy=Xzj,aeSqwa' );
define( 'NONCE_KEY',        '3kR5V>+BQ+p98HG+k[s/^,7>6ZRJaR9`#+%Nyf!@@{9*0eLVaK_jDf^iQnB`M7jA' );
define( 'AUTH_SALT',        '1Xh%hb|6TPh?ST}D,L9 } T^&gng9#2~3.mJ.KMU;7()9p]Dw@b}NTqL&F6k!=Cq' );
define( 'SECURE_AUTH_SALT', '+CMg0xv``Yz:kLh85`-;QcX00yFLAw#).YbAUeLS2PzH,g3%EGR=Z1Y.eWv8zmrx' );
define( 'LOGGED_IN_SALT',   'Zy|:8Z%;]I-Pf6 ]c9.Ft{FQnboZ3bX3I%4yA9IqE;3&&}}z*6T+)J+&KpcI=jM1' );
define( 'NONCE_SALT',       '2Wwv :g#cs1#/v5fwQw&6R<ASm0?]H:kHhd&S/AZYP3oPeq6/3qiP;u~d*%<=u`z' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
