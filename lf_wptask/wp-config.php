<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lf_wptask_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RkMh,;uDIXn|Dp%VS@v7rcX5Up5Io{st|4Sy>([<XeUGeYPx/75:X2XGE=3Ma%vi');
define('SECURE_AUTH_KEY',  '$>+%$Ns`@L[APhfHQbJDqJ4FL#D!fb:, 5itUa7FOHh+mg8u-5CUF!C*=IF5S^^=');
define('LOGGED_IN_KEY',    'MuKr2g.%jVC.@%o9LemPhU:SCS{%-T!~UfYb}nSiJf6XM6j./A:>*CY}eSQ:dbPi');
define('NONCE_KEY',        '4Mhu+kgIQ`s.Y_kM14}quY3(Qs(g;=nrdiDOJn}+*.}>mxS]*tK)Y,v|CI*U}!!T');
define('AUTH_SALT',        '4Xk(;n).n;UR xeT_&-x(>n3Kk%PkeRg<8%;v 1=pS8%R$zdKW^,bRrBMY&M7g+V');
define('SECURE_AUTH_SALT', '6w1L!Nr49Uhp.TElUYLK7bi8m=^f:]:FNGHdh.]X&vL.|P7xkP&^6fdkJ,;EndB~');
define('LOGGED_IN_SALT',   'F`[MJu>w3uc)Ox?a,zdl<OB$ #m+ GFgQDKA|5Lg-K#<_ymIjg&Jn`74zxKy.VEK');
define('NONCE_SALT',       '5(lsb;|[]Cea]I1/_nk `/`7%fgG{%yMK/$@)WTPt;hsYZ%gC`cZQj]I4my`HrqW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
