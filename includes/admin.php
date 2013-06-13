<?php

function h4wp_url_to_thickbox($url,$additional_css)
{
	
		if($additional_css){
			$css="thickbox " . $additional_css;
		}else{
			$css="thickbox";
		}
	$thickbox_url = "href=\"" . $url . "?TB_iframe=true&width=900&height=600&utm_source=H4WP&utm_medium=VideoLibrary&utm_term=H4WP&utm_content=Video&utm_campaign=H4WPVideo\" class=\"" . $css . "\"";
	return $thickbox_url ;
}
// functions that manage the menus
require_once('menus.php');

function h4wpRSS($show,$full,$showTitleLink,$feedURL)
{

	// show = how many posts to show
	// full = will shows the full content 
	// showTitleLink will show the title with a perma link, alternatively it is just going to print the title
	// feedurl is the url of the feed to talk to 
	
	
	// reference http://codex.wordpress.org/Function_Reference/fetch_feed
	// simple pie http://simplepie.org/wiki/reference/start#simplepie_item

	include_once(ABSPATH . WPINC . '/feed.php'); // path to include script

	
	// Get a SimplePie feed object from the specified feed source.
	$rss = fetch_feed($feedURL);
	if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
	    // Figure out how many total items there are, but limit it to 5. 
	    $maxitems = $rss->get_item_quantity($show); 

	    // Build an array of all the items, starting with element 0 (first element).
	    $rss_items = $rss->get_items(0, $maxitems); 
	endif;
	
	
	if ($maxitems == 0) echo 'No items...';
	    else
	    // Loop through each feed item and display each item as a hyperlink.
	    foreach ( $rss_items as $item ):
	    	if($showTitleLink != "false")
			{
				//$url = esc_url( $item->get_permalink());
				$url = $item->get_permalink();
				$url = parse_url( $url );
				$url = $url['scheme'] . '://' . $url['host'] . $url['path'];
				print "<h3>";
				print "<a " . h4wp_url_to_thickbox( $url,'' ) .">";
				print  esc_html( $item->get_title() ) ;
				print "</a></h3>";
			}
			else
			{
				print "<h4> " .esc_html( $item->get_title() ) . "</h4>";
			}
		
			if($full != "false")
			{
				echo $item->get_content();
			}
	
		endforeach;
	
	
}

// functions to setup default options when the plugin is activated 
register_activation_hook(__FILE__,'h4wp_myplugin_install');

function h4wp_myplugin_install(){
	
	$options = get_option('h4wp_myplugin_options_content');
	if($options['url'] == "" && $options['title'] == ""){
		$default_options = array('url' => '', 'title' => 'No content');
		update_option('h4wp_myplugin_options_content', $default_options);
	}	
}

// **** these functions setup the menu options page for the plugin *****
function h4wp_create_menu()
{
	
	//create top level menu 
	add_menu_page( 'Help For WP' , 'Help for WP' , 'read','h4wp', 'h4wp_dashboard_help',H4WP_URL . '/images/help-for-wordpress-menu.png',0);

	//create sub menus
	//add_submenu_page('h4wp', 'Options', 'Options', 'manage_options', 'h4wp_options', 'h4wp_options_page' );
	
	//create sub menus for dev content
	add_submenu_page('h4wp', 'Unique Content', 'Unique Content', 'manage_options', 'h4wp_unique_content', 'h4wp_unique_content_page' ); 
}

add_action( 'admin_menu', 'h4wp_create_menu' );

function h4wp_unique_content_page(){
	h4wp_page_top();
	
	?>
				<form action="options.php" method="post">
				<?php settings_fields('h4wp_myplugin_options_content'); ?>
				<?php do_settings_sections('h4wp_unique_content'); ?>
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</form>
	
	<?PHP
	h4wp_page_bottom();
}

function h4wp_options_page()
{
	
	h4wp_page_top();

	?>
				<form action="options.php" method="post">
				<?php settings_fields('h4wp_myplugin_options'); ?>
				<?php do_settings_sections('h4wp_options'); ?>
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</form>
	
	<?PHP
	h4wp_page_bottom();
}

// here is the code to register the settings that we need to store

// Register and define the settings
add_action('admin_init', 'h4wp_myplugin_admin_init');

function h4wp_myplugin_admin_init(){
	register_setting(
		'h4wp_myplugin_options',
		'h4wp_myplugin_options',
		'h4wp_myplugin_validate_options'
	);

	add_settings_section(
		'h4wp_myplugin_main',
		'Help For WordPress Settings',
		'h4wp_myplugin_section_text',
		'h4wp_options'
	);

	add_settings_field(
		'h4wp_myplugin_username',
		'Help For WP Username: ',
		'h4wp_myplugin_setting_username',
		'h4wp_options',
		'h4wp_myplugin_main'
	);
	add_settings_field(
		'h4wp_myplugin_password',
		'Help For WP Password: ',
		'h4wp_myplugin_setting_password',
		'h4wp_options',
		'h4wp_myplugin_main'
);

// these settings are for the unique content setup

register_setting(
	'h4wp_myplugin_options_content',
	'h4wp_myplugin_options_content',
	''
);
// h4wp_myplugin_validate_options_content validation for above - not operational


add_settings_section(
	'h4wp_myplugin_main_content',
	'Unique content settings',
	'h4wp_myplugin_content_section_text',
	'h4wp_unique_content'
);
	
add_settings_field(
	'h4wp_myplugin_content',
	'Content Title: ',
	'h4wp_myplugin_content_title',
	'h4wp_unique_content',
	'h4wp_myplugin_main_content'
);
add_settings_field(
	'h4wp_myplugin_content_url',
	'URL: ',
	'h4wp_myplugin_content_url',
	'h4wp_unique_content',
	'h4wp_myplugin_main_content'
);	
}


// Draw the section header
function h4wp_myplugin_content_section_text() {
	echo "<p>If you're a WordPress developer and you would like to install site specific training material, enter the title and URL to the content below.</p>";
	echo "<P>Content could be a PDF file, a video or a link to a web page, it's up to you!</P>";
	echo '<p>This content will then be added to the right hand menu for users.</p>';
	}

function h4wp_myplugin_content_url() {
	// get option 'text_string' value from the database
	$options = get_option( 'h4wp_myplugin_options_content' );
	$url = $options['url'];

	// echo the field
	echo "<input size='40' id='url' name='h4wp_myplugin_options_content[url]' type='text' value='$url' />";
}

function h4wp_myplugin_content_title() {
	// get option 'text_string' value from the database
	$options = get_option( 'h4wp_myplugin_options_content' );
	$title = $options['title'];

	// echo the field
	echo "<input id='title' name='h4wp_myplugin_options_content[title]' type='text' value='$title' />";
}

// Draw the section header
function h4wp_myplugin_section_text() {
	echo '<p>Use this form to configure your help plugin.</p>';
	echo '<p>Choose to have the video</p>';
	echo '<p><a ';
	h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/membership-options/","" );
	echo '>';
	echo 'Read more</a> on accessing the full WordPress video training library.';
	}

// Display and fill the form field
function h4wp_myplugin_setting_username() {
	// get option 'text_string' value from the database
	$options = get_option( 'h4wp_myplugin_options' );
	$username = $options['username'];
	// echo the field
	echo "<input id='username' name='h4wp_myplugin_options[username]' type='text' value='$username' />";
}

function h4wp_myplugin_setting_password() {
	// get option 'text_string' value from the database
	$options = get_option( 'h4wp_myplugin_options' );
	$password = $options['password'];
	// echo the field
	echo "<input id='password' name='h4wp_myplugin_options[password]' type='text' value='$password' />";
}

// Validate user input (we want text only)
function h4wp_myplugin_validate_options( $input ) {
	
	// with this usernames and passwords can be a-z 09 and _ that is all [^a-zA-Z0-9_]
	// added /[^a-zA-Z0-9_@.]/ to username to allow full email addresses
	
	$valid['username'] = preg_replace( '/[^a-zA-Z0-9_@.]/', '', $input['username'] );
	$valid['password'] = preg_replace( '/[^a-zA-Z0-9_]/', '', $input['password'] );
	
	if( ($valid['username'] != $input['username']) || ($valid['password'] != $input['password'])  ) {
		add_settings_error(
			'h4wp_myplugin_username',
			'h4wp_myplugin_error',
			'Incorrect value entered!',
			'error'
		);		
	}
	
	return $valid;
}



function h4wp_myplugin_validate_options_content( $input ) {
		// currently we're not validating the urls
		return $valid;
}



// end of settings registration

function h4wp_page_top()
{
	?>	
		<link href="<?PHP print H4WP_URL; ?>/style.css" rel="stylesheet" type="text/css" />
		
			<div class="wrap h4wp">
			<h2></h2>
		       <div class="h4wp-heading">
		            <img src="<?PHP print H4WP_URL; ?>/images/help-for-wordpress-icon.png" alt="Help For WordPress Logo" />
					<?PHP
					// here we see if there is site specific content to be added to the menu
					$options = get_option( 'h4wp_myplugin_options_content' );
					$url = $options['url'];
					$title = $options['title'];

					if($title == "No content" || $title == "" || $url == ""){
						// no site specific content
						$url = "http://helpforwordpress.com/h4wp-Content/site-specific-training/";
						echo "<a ";
						echo "href='#' class='target-content' ";
						echo ">";
						echo "No site specific training installed";
						echo "</a>";
						echo "</li>";
					}else{
						echo "<a ";
						echo h4wp_url_to_thickbox($url,"target-content");
						echo ">";
						echo $title;
						echo "</a>";
						echo "</li>";
					}
					
					?>
					
					
		        </div>
	
		    <div id="dashboard-widgets-wrap">

		    <div class="plg-wrap">
		    	<div class="plg-left">
	
	<?php	
}


function h4wp_page_bottom()
{

	?>
	
		 </div><!--END PLG-LEFT-->
	        <div class="plg-right">
	        	<div class="plg-right-module">
	            	<?PHP 
					h4wp_post_menu_1();
					?>
	            </div><!--END PLG-RIGHT-MODULE-->
				<div class="plg-right-module">
					<?PHP 
					h4wp_post_menu_2();
					?> 	
	            </div><!--END PLG-RIGHT-MODULE-->

	            <div class="plg-right-module">
	            	<?PHP 
					h4wp_post_menu_3();
					?>
	            </div><!--END PLG-RIGHT-MODULE-->
	        </div><!--END PLG-RIGHT-->
	    </div><!--END PLG-WRAP-->
	    <div class="clear"></div>

	    </div><!--END dashboard-widgets-wrap-->

	    <div class="clear"></div>


	</div><!--END WRAP-->
	<div class="clear"></div>
	
	<?PHP
}

function h4wp_dashboard_help()
{
	h4wp_page_top();
	require_once(H4WP_PATH . '/pages/main-page.php');	
	h4wp_page_bottom();
}


?>