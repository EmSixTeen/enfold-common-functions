<?php
/**
 * Plugin Name: Enfold - Common Functions
 * Description: A collection of common functions for Enfold.
 * Version: 1.2020.09.18
 * Author: Aaron Gregg
 * Author URI: https://aarongregg.com
 */
/**
 * Functions
 * Require all PHP files in the /functions/ directory
 */
foreach ( glob( plugin_dir_path( __FILE__ ) . "functions/*.php" ) as $file ) {
  include_once $file;
}

