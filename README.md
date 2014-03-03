WordPress Subdirectory Bootstrap
================================

A collection of files needed when running WordPress from a subdirectory

		.htaccess
		index.php (points to subdirectory)
		wp-config.php

Used with composer, for bootstrapping local WordPress development environments that are compatible with deployment to managed hosts like WP Engine:

##### [WordPress-WPEngine-Deploy](https://github.com/creativecoder/WordPress-WPEngine-Deploy)

Installed as a library to the vendor/ directory. Use a post-install script to copy the files to the root directory.
