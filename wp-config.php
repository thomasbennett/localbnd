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
define('DB_NAME', 'localband');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'w )`CREJ(*=2Pn||[cJjZf^H`*U)a=HyZ?-/OJ(Rp>[e3zc.,dSd`&?LP*%8r9PE');
define('SECURE_AUTH_KEY',  'y+45WR+;&{4TW^&53tgd:1LPNDiratoPt)G_7IEkU<9x>rC|BQ6>kLfaLpta%@ W');
define('LOGGED_IN_KEY',    'AD3$:N{HD{XvJiYb|.9U.}KxHd(0q16V:Vg7zftXM?6M`k4Nwjnp!ea{-t$p1){^');
define('NONCE_KEY',        'eO=vh`m9m3Xk(BV}*!L(Irj2dU%`al%t1iH7av90m]sj/FA6Eo%^B#.tV92+l5cj');
define('AUTH_SALT',        'K@AZr[P)snW!2L^X,a!esU+=X2-$EMg{SPBBF+.M3W9Jgj!%J9($^9NXj5S0*EnR');
define('SECURE_AUTH_SALT', '*Mp1mU5-@v1/huEl%hee[NPt$P5) }{QIRkK.leQlRKPyAh>SOGUxup(eTNKq!b8');
define('LOGGED_IN_SALT',   'qF[w7&*-Zd5;}vcFr=Wk*~Npv[d`7=oKyAu7)f(|@{P+rz$z*k4Gi;S?O691v%|A');
define('NONCE_SALT',       'RGG~FXZpXJA]%G1wGrU&uEWP^-2n@w}&<Q965_UjbXzDTIf|Kydx [!71/%;&TBH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
