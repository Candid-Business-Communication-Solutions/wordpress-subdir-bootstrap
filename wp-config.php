<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * You can view all defined constants with:
 * print_r(@get_defined_constants());
 *
 * @package WordPress
 */

define( 'WP_CONFIG_PATH', dirname(__FILE__) );


/**
 * Include packages installed by composer
 */
require_once( 'vendor/autoload.php' );

/**
 * Load environment variables from the .env file with Dotenv
 */
Dotenv::load( WP_CONFIG_PATH );
Dotenv::required( array('DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL') );

/**
 * Set up our global environment constant and load its config first
 * Default: local
 */
define( 'WP_ENV', getenv('WP_ENV') ? getenv('WP_ENV') : 'local' );

/**
 * Load DB credentials according to development environment
 */
define( 'DB_NAME', getenv('DB_NAME') );
define( 'DB_USER', getenv('DB_USER') );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );
define(' DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost' );

/**
 * WordPress Database Table settings
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv('table_prefix') ? getenv('table_prefix') : 'wp_';
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**
 * Define WordPress URLs if needed (all of these will override the settings in the wp_options table)
 */
 
/* URL where people can reach your website */
define( 'WP_HOME', getenv('WP_HOME') ? getenv('WP_HOME') : 'http://' . $_SERVER['SERVER_NAME'] );

/* URL where wordpress core files reside */
define( 'WP_SITEURL', getenv('WP_SITEURL') ? getenv('WP_SITEURL') : 'http://' . $_SERVER['SERVER_NAME'] . '/wp' );

/*
 * Define wp-content directory
 */
/* Full local path for content directory */
define( 'WP_CONTENT_DIR', WP_CONFIG_PATH . '/wp-content' );
/* URL of content directory */
define( 'WP_CONTENT_URL', WP_HOME . '/wp-content' );

/**
 * Set plugin directory, if needed
 */
/* Local path to plugin directory */
//define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
/* URL of plugin directory */
//define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );

/**
 * Set mu-plugins directory, if needed
 */
/* Local path to mu-plugin directory */
//define( 'WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins' );
/* URL of plugin -mudirectory */
//define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL . '/mu-plugins' );

/**
 * Set uploads folder
 */
//define( 'UPLOADS', WP_CONTENT_DIR . '/uploads' );

/**
 * Theme and stylesheet paths
 * (probably shouldn't use these)
 */
// define( 'TEMPLATEPATH', get_template_directory() );
// define( 'STYLESHEETPATH', get_stylesheet_directory() );

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define( 'WPLANG', '' );

/**
 * Authentication Unique Keys and Salts
 */
define( 'AUTH_KEY',         getenv('AUTH_KEY') );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') );
define( 'NONCE_KEY',        getenv('NONCE_KEY') );
define( 'AUTH_SALT',        getenv('AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') );
define( 'NONCE_SALT',       getenv('NONCE_SALT') );

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/

if ( 'local' === WP_DEV || 'development' === WP_DEV )
	define( 'WP_DEBUG', true );
else
	define( 'WP_DEBUG', false );

if ( WP_DEBUG ) {

	/* Set PHP error and error log settings to override server settings, if needed*/
	@ini_set( 'log_errors','On' );
	@ini_set( 'display_errors','On' );
	@ini_set( 'error_reporting', E_ALL );
	
	/*
	 * This will log all errors notices and warnings to a file called debug.log in
	 * wp-content only when WP_DEBUG is true. if Apache does not have write permission, 
	 * you may need to create the file first and set the appropriate permissions (i.e. use 644).
	 */
	@ini_set( 'error_log', WP_CONFIG_PATH . '/php_error.log' );
	define( 'WP_DEBUG_LOG', true );
	
	
	/* Display notices or not (set logging to true if this is false) */
	define( 'WP_DEBUG_DISPLAY', true );

	/*
	* Save database queries to an array that can be displayed
	* Note that this will have a performance impact on the site
	*
	* Access these through $wpdb->queries
	*/
	// define( 'SAVEQUERIES', true );
	
	/* Script Debugging */
	/*
	 * If true, changes made to the scriptname.dev.js and filename.dev.css files in the
	 * wp-includes/js, wp-includes/css, wp-admin/js, and wp-admin/css directories will be
	 * reflected on your site.
	 */
	// define( 'SCRIPT_DEBUG', true );
	
	/*
	 * Disable javascript concatenation in admin area
	 */
	// define( 'CONCATENATE_SCRIPTS', false );
}

/* Enable this constant temporarily to change the site url in the database
 * 1. Uncomment line below
 * 2. Navigate to http://mynewsitedomain.com/wp-login.php and login
 * 3. Be sure to recomment this line
 */
// define( 'RELOCATE',true ); 


/* Additional WordPress settings */

/* Change interval for AJAX saves when editing posts */
// define( 'AUTOSAVE_INTERVAL', 160 );  // seconds

/* Specify number of post revisions to save (or disable with 'false') */
// define( 'WP_POST_REVISIONS', 3 );

/* Specify number of days content is held in trash before being permanently deleted */
// define( 'EMPTY_TRASH_DAYS', 30 );  // default is 30 days; set to 0 to disable trash

/* Change the URLs temporarily before doing a search and replace in the database */
// ob_start( 'nacin_dev_urls' );
// 	function nacin_dev_urls( $buffer ) {
// 	$live = 'http://olddomain.com';
// 	$dev = 'http://newdomain.com'; return str_replace( $live, $dev, $buffer );
// 	}

/**
 * Set Cookie Domain
 * 
 * The domain set in the cookies for WordPress can be specified for those with unusual domain
 * setups. One reason is if subdomains are used to serve static content. To prevent WordPress
 * cookies from being sent with each request to static content on your subdomain you can set
 * the cookie domain to your non-static domain only.
 */
// define( 'COOKIE_DOMAIN', 'www.askapache.com' );

/* Additional Cookie Settings */
// define( 'COOKIEPATH', preg_replace( '|https?://[^/]+|i', '', get_option( 'home' ) . '/' ) );
// define( 'SITECOOKIEPATH', preg_replace( '|https?://[^/]+|i', '', get_option( 'siteurl' ) . '/' ) );
// define( 'ADMIN_COOKIE_PATH', SITECOOKIEPATH . 'wp-admin' );
// define( 'PLUGINS_COOKIE_PATH', preg_replace( '|https?://[^/]+|i', '', WP_PLUGIN_URL ) );


/**
 * Disable Plugin and Theme Editors
 *
 * Warning: may break plugins that rely on current_user_can('edit_plugins')
 */
// define( 'DISALLOW_FILE_EDIT',true );

/*
 * Disable Plugin and Theme Update Installation
 * 
 * Blocks users being able to use the plugin and theme installation/update functionality
 * from the WordPress admin area. Also disallows the theme and plugin editors
 */
// define( 'DISALLOW_FILE_MODS',true );

/* Enable WordPress Multisite */

// define( 'WP_ALLOW_MULTISITE', true );
// define( 'SUBDOMAIN_INSTALL', false );
// define( 'DOMAIN_CURRENT_SITE', $_SERVER['SERVER_NAME'] );
// define( 'PATH_CURRENT_SITE', '/' );
// define( 'SITE_ID_CURRENT_SITE', 1 );
// define( 'BLOG_ID_CURRENT_SITE', 1 );

/* Configure Multisite */
// define( 'SUNRISE', 'on' );

/**
 * WP_CRON Settings
 */
// If disabling WP_CRON, set a cron job like `*/5 * * * * curl http://example.com/wp/wp-cron.php` in your server's crontab file

/* Disable cron entirely */
// define( 'DISABLE_WP_CRON',true );

/* Make sure a cron process cannot run more than once every so many seconds */
// define( 'WP_CRON_LOCK_TIMEOUT',60 );

/* Alternative cron that uses redirection, but isn't as reliable */
// define( 'ALTERNATE_WP_CRON', true );

/**
 * Server Setting Overrides
 */

/* View all defined php constants */
// print_r( @get_defined_constants() );

/* Increase PHP memory limit settings, if possible/needed */
// define( 'WP_MEMORY_LIMIT', '64M' );

/* Change PHP memory limit in WordPress administration area */
// define( 'WP_MAX_MEMORY_LIMIT', '256M' );

/* Attempt to override default file permissions */
// define( 'FS_CHMOD_DIR', (0755 & ~ umask()) );
// define( 'FS_CHMOD_FILE', (0644 & ~ umask()) );

/**
 * Enable Automatic Database Repair
 * Note that this can be accessed at /wp-admin/maint/repair.php even when not logged in
 */
// define( 'WP_ALLOW_REPAIR', true );

/**
 * Do Not Upgrade Global Tables
 * 
 * Prevents upgrade functions from doing expensive database queries on global tables
 *
 * Particularly useful for sites with large user and usermeta tables, so the database upgrade
 * can be done manually
 *
 * Also useful for installations that share user tables between bbPress and WordPress installs
 * Where only one site should be the upgrade master
 */
// define( 'DO_NOT_UPGRADE_GLOBAL_TABLES', true );

/**
 * Custom User and Usermeta Tables
 *
 * Defined a custom user and usermeta table that can be used for multiple instances of WordPress
 */
// define( 'CUSTOM_USER_TABLE', $table_prefix.'my_users' );
// define( 'CUSTOM_USER_META_TABLE', $table_prefix.'my_usermeta' );

/**
 * SSL
 */
/* Force SSL Login */
// define( 'FORCE_SSL_LOGIN',true );

/* Force SSL for Logins and Admin */
// define( 'FORCE_SSL_ADMIN',true );

/**
 * Auto updating
 */
/* Disable all core updates: */
// define( 'WP_AUTO_UPDATE_CORE', false );

/* Enable all core updates, including minor and major: */
// define( 'WP_AUTO_UPDATE_CORE', true );

/* Enable core updates for minor releases (default) */
// define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/* Disable automatic updater completely */
// define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Block external URL requests
 *
 * WP_ACCESSIBLE_HOSTS allow additional hosts to bypass the block, and is a comma separated list of hostnames to allow, and can include wildcard subdomains
 */
// define( 'WP_HTTP_BLOCK_EXTERNAL', true );
// define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.github.com' );

/**
 * Caching
 *
 * Whether to include the wp-content/advanced-cache.php script
 */
define( 'WP_CACHE', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define( 'ABSPATH', WP_CONFIG_PATH . '/wp/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
