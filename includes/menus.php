<?php
// this file contains the menu items for the right side of the pages

function h4wp_post_menu_1()
{

?>

	<h3>Help with posts & pages</h3>
	<ul>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/pages-and-posts/basic-help-topics/" ); ?>>Basic help topics</a></li>
    	<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/pages-and-posts/advanced/" ); ?>>More advanced</a></li>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/pages-and-posts/wordpress-ninja/" ); ?>>WordPress Ninja</a></li>
		
		<? //h4wpRSS(2,'false','true','http://helpforwordpress.com/feed/');?>
	</ul>



<?PHP

}

function h4wp_post_menu_2()
{

?>

	<h3>Doing more with WordPress</h3>
	<ul>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/general-wordpress/search-engine-optimisation-seo/" ); ?>>Seach engine optimisation for WP</a></li>
    	<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/general-wordpress/managing-images/" ); ?>>Images and media</a></li>
		<li><a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/general-wordpress/plugins/" ); ?>>Plugins</a></li>
		
		<? //h4wpRSS(2,'false','true','http://helpforwordpress.com/feed/');?>
	</ul>



<?PHP

}

function h4wp_post_menu_3()
{
$admin = get_admin_url();
?>

	<h3>Site specific training</h3>
	<ul>
	<?PHP
		// here we see if there is site specific content to be added to the menu
		$options = get_option( 'h4wp_myplugin_options_content' );
		$url = $options['url'];
		$title = $options['title'];
		
		if($title == "No content" || $title == "" || $url == ""){
			// no site specific content
			echo '<li><a href="#">No site specific content installed</a></li>';
			
		}else{
			
			echo "<li>";
			echo "<a ";
			h4wp_url_to_thickbox($url);
			echo ">";
			echo $title;
			echo "</a>";
			echo "</li>";
		}
		
	?>
	
	</ul>
	




<?PHP

}


?>