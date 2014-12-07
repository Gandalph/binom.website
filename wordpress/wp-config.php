<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Y9mj~;g+-d[adJ@5@CccVn6XB+w-.l%ck%iF7J!jJK~-*_w7ntG,=bsn~wmHM64Q');
define('SECURE_AUTH_KEY',  ')f&$TV~5jpNpA`]{cszpsIr 03F|+JN%rpI=x:U8VE nhZQ44Bum?HAJYFu2c/x2');
define('LOGGED_IN_KEY',    '+{.KE~H)W:~%?<uP,)-q4aofnI%CbXf^xJBz:!=:[z-_XbE2uv_9)b8)fz-5Z6pi');
define('NONCE_KEY',        'UIm.p2Jv:JiK^Iig-gN$o_bIS%Kvdzs*+u{wI{W$k!MDV-qVNRs/<abCSfH*m`SP');
define('AUTH_SALT',        '066dBLL)+-!*S7GNR-<0HtPOVCcNBRdL+--QuzI%+u4e|geMVvL/NL|H @C J5Z-');
define('SECURE_AUTH_SALT', 'aS(3EuIAA3n|D7+z_`q,kXi=g4US@.OD-@%,4dAO6[P9!^-K_Ov74[9]KS:835wm');
define('LOGGED_IN_SALT',   '^_-do; `1t9h{;|<50]Rt?Y(b[An$Yx2@?a.#CM~QTX=Vv|gCjq [3C*iDNXx3dg');
define('NONCE_SALT',       'q ^=yVsp!1uy{o_ap+[bI8(;jO(^U,5!{]wJ{-<W6y[Cfnf+wvG-0#)FRkT9p]g}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
