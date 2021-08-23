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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fogcc_web' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$.CDd&wC3|!c^Q~R<SYzoS>*HrOQ]kOLCm]px9^K0nYcb@jKK{nmRLViv5`9_(hl' );
define( 'SECURE_AUTH_KEY',  'jJx&ev+z1WxwiX+2I^c7HVYrVN7SeHN8C_^0l>$CdSbYKB@W<7-]pZujzZ17@r.f' );
define( 'LOGGED_IN_KEY',    'AZO |k+0;.RaJcybz.l%u,=m>GbS.72<*pr~U7>!huhd-c&@lvQ~w:8PzKgal12v' );
define( 'NONCE_KEY',        '_C!PGM;n06kF_En2I8^{qOwup]?zg;yI/i{Lj$z>1sC*?De2;5f?c8skOHKl3S7K' );
define( 'AUTH_SALT',        'YIx}r-w[k4x0r%PEL=l2X@*pWll`J22+{n<md[jb{,0XQi_c@oX?1=3l/=1{i4ke' );
define( 'SECURE_AUTH_SALT', 'Drk]ApRtOM:En`5JFhn7nB6}[wM@8JD:^$o<*)Ga8lQ@.dX(,95FROAPt*QETFTs' );
define( 'LOGGED_IN_SALT',   '_YEA&(%UAD}l:1yk@3_ |rXzw8[eye`R0|M&?ty1q!*G-)PEx]:[-6JOD*w~TLfY' );
define( 'NONCE_SALT',       '_,1=7<I,]lLO9be@d[2X3cciCH*@*?I/(xZYZeLGcE:Drg.daBOuJt(uvMdI|!L{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
