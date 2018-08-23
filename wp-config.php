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
define('DB_NAME', 'nfi_wp1');

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
define('AUTH_KEY',         'km6VsCh7V9BJoWxf1kgt28CVkanttt7vfYXy3dQXseArQPgdf_fo4Ag_7nmEm6sc');
define('SECURE_AUTH_KEY',  '1a9bTDIqJAzxV7qeQE91aA88Ld9dKRKwnhYVr27X9YGxpf_DiyYMmSwUlpwzb1HO');
define('LOGGED_IN_KEY',    'vV5tHeWeIPz0zmWsFjGTaYp7ANjvnVuTLK86edeL0NqeI1WxRCAGtNDPa_HUr2Mt');
define('NONCE_KEY',        'T5VDyjShxaM2bQYM1lkNUYmUZ0ZGKDQIdn7Z3U8o4BTyyM1A0d6C5XzwNYpRnfZU');
define('AUTH_SALT',        'XBNwuvzNDL8Y2eHbIyiM8c0TtcrVXGL5zvhRoG7Q46reiliS9Fh3yZCy_1M6JQqT');
define('SECURE_AUTH_SALT', 'Uh6Jyx6W__sUIhHP__Z54ju43pccqxV4t8EWghVDL0O6muJ2aejeqae4aKCyiJLW');
define('LOGGED_IN_SALT',   'OAxfvS4p6cdberY5hP5Sr4AcVaQoCE8a9LRAOQbZc8d5_px2SKKjJ5FhlWdBoeGi');
define('NONCE_SALT',       '8imDHnCqE6_Gxg1xDkeHB7zUAFvIKDIlf3Dog0LTpwlZGoAgfI_ooz1kEw4Css4m');

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


/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'portal-nutrifood.local');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('WP_MEMORY_LIMIT', '64M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');