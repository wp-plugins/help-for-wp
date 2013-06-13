<?php
/*
Plugin Name: Help For WP
Plugin URI: http://helpforwp.com
Description: The missing (video) training manual for WordPress, this plugin provides a range of video help right inside the Wordpress Dashboard
Version: 1.2
Author: Peter Shilling
Author URI: http://helpforwp.com

------------------------------------------------------------------------
Copyright 2011 TheDMA

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, 
or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

*/

if (is_admin()){
	// Define paths
	define('H4WP_PATH', dirname(__FILE__));
	define('H4WP_URL', WP_PLUGIN_URL . '/help-for-wp');
	
	add_thickbox();
	require_once(plugin_dir_path(__FILE__) . 'includes/admin.php');
}

?>