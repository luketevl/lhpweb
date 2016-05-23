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
define('DB_NAME', 'wp_lhpweb');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'g4tt3c');

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
define('AUTH_KEY',         'H|) eAz)O~j d6sp;=i}]grZ=eq-2D+aC!0MDcy2)[/?!6~B{BY,PQP=nKG(A.uU');
define('SECURE_AUTH_KEY',  'Jj8fe5oBI|l</SS8(ttB?u>0<[.4(q+VtN]*H_Vc61B?/k!{KML%m)smc~BZrCdX');
define('LOGGED_IN_KEY',    '5sedpQ3G72h:{vCX7t66-ps5V$245X9>QP6{J5T6xy;2AKbtV`eJ6sc>[6PO|beV');
define('NONCE_KEY',        'jB-^e%3{GC7U+bR`I&^nY#W$%UnOLyBj>c&M7Z5nEHFeNy{6Q*<@Z2-k=}v[11gD');
define('AUTH_SALT',        '$=;P/jy%vJ&>5/}I3!0L<@tpmKcQPWWVA:)#(M4r@]5)>k]L)(AC5gXEY=n/H0vf');
define('SECURE_AUTH_SALT', '{qc5GiG?5obb;J0T>pGFU$Wi$T@B?A2%WACM^9<TsAm)SR-$y d8^6!m#KSAOY,*');
define('LOGGED_IN_SALT',   'o9@q-M[}TJ-.xPXbKlS c:cMl1F5&.  }eBakI6WVk*?]Z2B*qAy`g+M#Khq]cWh');
define('NONCE_SALT',       'w-JtoW5sf*tlRM=-/y(5+rr]0%<8+K[eA@YQ]W2tB@oF*3rVnJ6lU73kTgc4P,* ');

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
