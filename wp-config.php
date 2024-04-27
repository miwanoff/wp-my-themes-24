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
define( 'DB_NAME', 'wpmytheme24' );

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
define( 'AUTH_KEY',         'z++QE=L%,?]6bVKK>R{}dfN7^FuKBcaK1tz~!mL {0ZpjqP4jIJ@vl>eQ)~_yTiG' );
define( 'SECURE_AUTH_KEY',  '8$bq9OTlzQfAj9mMwtal%4vw8Ib|-Y-e]^T_9Gujh /LP5JOrl/RHfEoV[A4lt.A' );
define( 'LOGGED_IN_KEY',    'lE},QG9A`^Gd9%{4^-PnjR{d; AWN-?=?m{,;?p+qJH$Jd OdRy0C.iLDQ_3d@hq' );
define( 'NONCE_KEY',        'O=b}buoQB%Jd9I:Y%M/GP*lON[>g4mCeWGV-.:h%0@%5 Eh0>b4yz>=nUg=Jmwzq' );
define( 'AUTH_SALT',        'KOu:Cb,vT3:<NTI5,@Bm>NjE}07cDSVQ93<<5>7wQ o]f^?OI4+G*PpBDXN0sK<%' );
define( 'SECURE_AUTH_SALT', '+a)5%/.Opfrh4bc~9nD8`-vafgQ~QoTxGE+>QsoM=30L*JL6LFeQFmzgEVb2GYXT' );
define( 'LOGGED_IN_SALT',   '&o.CFy.79kU?1B&cvp,Bw222uQ=/#GqVc1X;;umd.# :>iG;aJD/UAm }[NLeILU' );
define( 'NONCE_SALT',       'F$:(OzUx0O6sdJKkV|G.xv`<j~nqDw2%G)6;d,|r)kw]nlM~my5_@OnDPhaD3Ie@' );

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
