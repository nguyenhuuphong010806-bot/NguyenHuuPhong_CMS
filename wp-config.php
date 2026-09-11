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
define( 'DB_NAME', 'wordpress_nguyenhuuphong' );

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
define( 'AUTH_KEY',         'C<i1Ef+kCBQ9%DdJmATn}3@/M1z4A,Kmoz@yL>^]WYR$FEnnQYoGC*,iGJ=]k8By' );
define( 'SECURE_AUTH_KEY',  '^*}qC~Hk[e&;^+oYr?IyOu%Db{{f&U;sAAk94B~g..Es ?bE1.K_JS}#!|:w<+5A' );
define( 'LOGGED_IN_KEY',    '[0n*Cmsus@#7^73,T[Q3]?My~nfviaA]}Y(fw2t{=X[p99OY=Hwm-]ph`qkHVz=u' );
define( 'NONCE_KEY',        'L|~C|jYe`vdyT>RXl^Zd,YJhyV].Xa!=-(t>7/x7rR8CxM7]YPr2gTh@r): .}XF' );
define( 'AUTH_SALT',        '^86OX_~:nSX%5,B5AH[:T 0)k!E P$t{ W NZ>Z9q3nJ/|A 9HUD#>B*oP+02~$Q' );
define( 'SECURE_AUTH_SALT', 's<JgRYc!*$+fuc!n7?qn%`s4[57cr?C]:XR<h)#QO!L|OjdwW0fg*)$8gPX?p1g#' );
define( 'LOGGED_IN_SALT',   'iG$7CCn/WI&WoOgFzw^Z_GM-_-AuE)~Ya2X:kepH,d8|37KbV^kY`Z(hQ0I2DOZk' );
define( 'NONCE_SALT',       'o}dG%ZEgl`MfFF/ uwVZ];OA_LJ&fU7ZTBG&bWr?`Ahq%T @V|#]pylF|y]n^TE^' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

