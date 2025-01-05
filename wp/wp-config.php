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
define( 'DB_NAME', 'wp_szczep_f3_7592' );

/** Database username */
define( 'DB_USER', 'fioletowy_adm_1931' );

/** Database password */
define( 'DB_PASSWORD', 'fZ74mFz3Qa7I1uu@' );

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
define( 'AUTH_KEY',         '3Nmq[=`/A/[:xe,&3:?},:I7W)K<gKY)w*P_hnYQg@{*t%S$0>X0R-5oZHQq2l<o' );
define( 'SECURE_AUTH_KEY',  '}I=F5t9]p+&^_*(gCE^,Ro=/!~t$5^$);=f j6_2b#t!{#h8N/IB^?;$MXdzD2[z' );
define( 'LOGGED_IN_KEY',    'NI^9JSiw!qg}u)x+bV*7#![*XQC5e$i)g;W0[-,0?|n;ELt3SW5HgJsUcuN=A|B2' );
define( 'NONCE_KEY',        '(uyQ}|5rvEyu% ]Ftw~[5GTq|I?^Bg%HsZZ~qDt{,h7SjhGWkn[DHXz[rLOURV~[' );
define( 'AUTH_SALT',        '}S^$qJ$kc-Rd36*F8HI9VQUy2Ct4!E~vd#?Li.%gjs0wi-Ano*]831]ljbWz50f(' );
define( 'SECURE_AUTH_SALT', 'Gsh2+z92u^<oDnlPhJPnqAiHZfK_(0,c!=A;k&iJd0qDVl9 ?S?[Me6*4BibAD9S' );
define( 'LOGGED_IN_SALT',   'H3EG++^4Jf9VT}kbm$1UXQPwSdxb0nIvFz)Yjt/u20mZ ymV8u+GKv< 8<k@2.n@' );
define( 'NONCE_SALT',       'X5NBblvqg0MmS/&T-A}F]U(%OXK=wMNpBCy~Q>)Liq[VjnS.&_=3F;M^ uDt&/Ip' );

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
$table_prefix = 'fiolet_';

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
