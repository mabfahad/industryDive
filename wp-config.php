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
define( 'DB_NAME', 'industrydive' );

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
define( 'AUTH_KEY',         'J*vSIKJt(sQhC.[z;<9s>,F<M-n7-n:|EdkC,8W`UnG0c!+T+8Bsixk8g_v?,fD+' );
define( 'SECURE_AUTH_KEY',  't=sa&$-vUU`^9K/IGA;47;B[|}=ESL1;iIecdB{WrN<sHOiX[xw3)3u&@2uetPsg' );
define( 'LOGGED_IN_KEY',    '^^/*VtH@=vKzJ&DQ>HDP)/K Kdpy1jY TbR#UdAtLEYT)WHCOPTZ8Q|+4isvgaSd' );
define( 'NONCE_KEY',        '_Dm[3GBn5Bjf*$VX(Zb*?e:Ld{YqEj|I!vTU@ Lrfy$uAR|.9+X$+=aCePSU]odd' );
define( 'AUTH_SALT',        'DC_0WEpHTpFPH{%SXm|nr8c*cB]0u7?a3tJZy&^shP=eNL)kbfwU}*-u{cP<vOgu' );
define( 'SECURE_AUTH_SALT', '>NH?`!G1#JZA$B=Xw,iBpkS%X*8AW7.4Sb,Hq]&`fO!mA.e|%laCOW+3B5vxkP!/' );
define( 'LOGGED_IN_SALT',   'm(&As_BJvhp!l_WRFNZ+5$Ixfz8rXcxZLC}AK5N,E/3.ZTWuk#3{<V{#o]~PCKe1' );
define( 'NONCE_SALT',       '-<UX(),qAQjA3!vfVa091(C-|F*`dD#2c#gk)t~~d]:eVks&T-y>ep1K0;@CEJAy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ind_';

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
define( 'FS_METHOD', 'direct' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
