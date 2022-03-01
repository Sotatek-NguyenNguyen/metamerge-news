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
define( 'DB_NAME', 'metamerge' );

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
define( 'AUTH_KEY',         'H/HY>W%VK)[7Ul#4y>SGkl&Plmd/1x#G5@qk#>u48~0hb}C6E&-b2s0U/oK-eGta' );
define( 'SECURE_AUTH_KEY',  '>lwfSDEcdm D}EvJ5F3(gc93S1dQI)&tZXb>ZOj]79if<~8GgZP ccRe(d_K|ux_' );
define( 'LOGGED_IN_KEY',    'x%.W7go={NL$g;:A6tS:J7;.ydLh6vs+XgKW;z%T,6f<gzHh3l[:_?rY?[<UC[4t' );
define( 'NONCE_KEY',        'q8)55RNkx{Q9E>4>tIhpD=H1!7ocYF.2g{#(j0_- 2FF4[ba5,P1,Vx[O-jL`7]c' );
define( 'AUTH_SALT',        'olU_kKH/a.=Dn^py<.EdG$v_)QF2iMgsL*8}acLKq#b&vyiM#TTiyWUF5?1>mzAN' );
define( 'SECURE_AUTH_SALT', '/544-p ;YO_rI4,lK<o_0=&[|&]{5ex@:*K!G#{s9k{)cz6Zyg{A`yx!i1cHz?IH' );
define( 'LOGGED_IN_SALT',   'VjDnsQC>U4(KY%N10DC3rZoxnf;K,TD`dsNd8QNL~=7]@<7gjEVJ[7#5LbUI&G4X' );
define( 'NONCE_SALT',       'klHk*d C|!c:JWV#E.f TrZXfUE=yz%*`]HFX>Z(x@GW%mX~L/{CR86,Q3Fa(*13' );

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
