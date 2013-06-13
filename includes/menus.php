<?php
// this file contains the menu items for the right side of the pages

function h4wp_post_menu_1()
{

?>

	<h3>Getting Started</h3>
	<ul>
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/basic/","" ); ?>>Basics</a></li>
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/the-wordpress-editor/","" ); ?>>The WordPress Editor</a></li>
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/managing-content/","" ); ?>>Managing Content</a></li>
		
		
		<? //h4wpRSS(2,'false','true','http://helpforwordpress.com/feed/');?>
	</ul>



<?PHP

}

function h4wp_post_menu_2()
{

?>

	<h3>Intermediate</h3>
	<ul>
		
    	<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/managing-images-2/","" ); ?>>Managing Images</a></li>
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/managing-users/","" ); ?>>Managing Users</a></li>
		
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
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/plugins/","" ); ?>>Pro Tips</a></li>
		    	
		<li><a <?php echo h4wp_url_to_thickbox( "http://helpforwp.com/wordpress-training/pro-tips/","" ); ?>>Plugins</a></li>
		
		
	
	</ul>
	




<?PHP

}


?>