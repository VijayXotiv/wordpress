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
define( 'DB_NAME', 'local_wp_env' );

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
define( 'AUTH_KEY',         '!m3=W:o{@lfCvkeh8qB<<8dcW iMoO;3|%K4nGkKh /5OYr-,M#$SOJlU! CCnwI' );
define( 'SECURE_AUTH_KEY',  '~Dm4Yn 6USTGK)YLEyMj~b=D,p6hs+R7&^p0|=X|P1r)?{0ck6RpC0iC+aKDq3ER' );
define( 'LOGGED_IN_KEY',    '&&C#E4wLpyMB~`SSb3r%Z.].^itS%k.%3+v&;T1H%`h:1?!asi/_]|D7HwyvX1o{' );
define( 'NONCE_KEY',        '$ (Q@S,7e-TK|`7%?|OvHAZ7r39e?=S6/X9lTv<v7gA4l8^Zg~k,6pN,~*{uOU.+' );
define( 'AUTH_SALT',        'dO6AC1[sqiG@&E41erqDT_r(#8r&Gsks^KPl{Sf1H*.NMPD*.px_8(t@=v>0l,ji' );
define( 'SECURE_AUTH_SALT', '=fOdIdS}pl=;tt0%0hih8, R1UBlqVkuYT8OV?>C)4-#Wty5]n|H8*g:^6)*J3lo' );
define( 'LOGGED_IN_SALT',   '8)6KhEpu,K>V:F-drrmbrwvr1efih=EZr$@!l #,n$VUFA<g%c!VG-K3<--C;]uU' );
define( 'NONCE_SALT',       ';qxArK7Rx6Zw82^;Kb!QhZYajp7AnVgY;W77;<-Kd7O#z>Z9#1k:QoJ/LWHlHyG ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xotiv_';

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
