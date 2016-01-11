<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
// Added by ER to test GIT
/** The name of the database for WordPress */
define('DB_NAME', '1988669_orient');

/** MySQL database username */
define('DB_USER', '1988669_orient');

/** MySQL database password */
define('DB_PASSWORD', 'orientreizen1');

/** MySQL hostname */
define('DB_HOST', 'fdb7.freehostingeu.com');

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
define('AUTH_KEY',         'T3s~meJ/65kK7;eg5DoT~8`J(A7@93,ZJ=`6NF0A.7Fj,R@M~1{.mfQ!9f[v]!5$');
define('SECURE_AUTH_KEY',  'am:(r7?<(:|Bo7C?$y4%PLrGs%{I-6h+4zu2knt+ALW,9F>*WG)[}+5jcW1+&DHL');
define('LOGGED_IN_KEY',    'Tf<fr:-^TD|7E#Z~;+g+|#DL8(X UsasWW]3cr]7M%>/S<)hSM!]nP#L#=iZUI?.');
define('NONCE_KEY',        'q_+{]~!Rp$QJKj&3be~3xFCN]5#uIQ&lzTk(-v v2-K61*9^<vv=xX_j|Y/ eXCT');
define('AUTH_SALT',        '!j]nBzE-lu!mZ)5cxcF]|+%u;{Q7tV:;Rs6,IPV XNqq5?mB=:Z>yuUq!|>pHO!F');
define('SECURE_AUTH_SALT', ',8J6] J@~PP0rP 858Dpl<Q4-KKUB~XU%~]jf^[Hp.bb/QXk7acQTr{IQ</+|u6>');
define('LOGGED_IN_SALT',   '9o---[g%`;IsEDCaYKeM4w(d^/UY`Vz<NlJX]f:r[C)#-iHJ#hT%w4.|<~nF74(a');
define('NONCE_SALT',       '21J]rv@!?m66Y}0b6IwTRu6MYi=S{#|.k^V+NQ5 _X#Q^TMNLZRv8?r?=$Ag,kQ9');

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
