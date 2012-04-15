<?php
// this file contains the menu items for the right side of the pages

function h4wp_post_menu_1()
{

?>

	<h3>Getting Started</h3>
	<ul>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/getting-started/basic/","" ); ?>>Basics</a></li>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/getting-started/wordpress-editor/","" ); ?>>The WordPress Editor</a></li>
   
		
		
		<? //h4wpRSS(2,'false','true','http://helpforwordpress.com/feed/');?>
	</ul>



<?PHP

}

function h4wp_post_menu_2()
{

?>

	<h3>Intermediate</h3>
	<ul>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/intermediate/managing-content/","" ); ?>>Managing Content</a></li>
    	<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/intermediate/managing-images/","" ); ?>>Managing Images</a></li>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/intermediate/managing-users/","" ); ?>>Managing Users</a></li>
		
		<? //h4wpRSS(2,'false','true','http://helpforwordpress.com/feed/');?>
	</ul>



<?PHP

}

function h4wp_post_menu_3()
{
$admin = get_admin_url();
?>

	<h3>WordPress Ninja</h3>
	<ul>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/wordpress-ninja/pro-tips/","" ); ?>>Pro Tips</a></li>
		    	
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/general-wordpress/plugins/","" ); ?>>Plugins</a></li>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/general-wordpress/search-engine-optimisation-seo/","" ); ?>>Search Engine Optimisation</a></li>
		
	
	</ul>
	




<?PHP

}


?>