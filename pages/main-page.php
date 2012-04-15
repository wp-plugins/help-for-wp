<h2>Getting Started</h2>
<p>If you're new to WordPress this is the place to be, <a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/category/getting-started/basic/","" ); ?>>click here</a> to get started in the Basics of WordPress.

Then move into more detail on the WordPress editor, manage your workflow and even scheduling content for release.</p>

<h2>Intermediate</h2>
<p>
Once you have mastered the first section, the intermediate section will really extend your WordPress skills. Here you'll learn more about content, working with 
images and managing multiple users in your WordPress site.
</p>

<h2>WordPress Ninja</h2>
<p>
Become a truely skilled WordPress user and learn how to push it to the limits! We cover ways to extend WordPress with plugins, look at SEO skills and a dedicated section full of Pro Tips.
</p>

<h2>Access the entire training library</h2>
<p>
The Getting Started section of the library is completely free to access and contains 8 full length videos to help you get the basics learnt 
as quickly as possible. The Internmediate and WordPress Ninja sections are available for a small annual subscription fee, 
<a <?php h4wp_url_to_thickbox( "http://helpforwordpress.com/h4wp-Content/membership-options/","" ); ?>>view our membership options here</a>.
</p>

<?PHP
	// here we login to the video training external site

	// We should store something in the transient database so we know when a login was 
	// done recently and then we can skip this so we don't run it over and over again

	$h4wp_login_url = "http://helpforwordpress.com/h4wp-Content/wp-login.php";
	$h4wp_options = get_option( 'h4wp_myplugin_options' );
	$h4wp_username = $h4wp_options['username'];
	$h4wp_password = $h4wp_options['password'];

	// user_login and user_pass
	// redirect_to = http://helpforwordpress.com/h4wp-Content/wp-admin/
	// testcookie = 1

	$h4wp_login_data = array(
		'user_login' => $h4wp_username,
		'user_pass' => $h4wp_password,
		'testcookie' => '1',
		'redirect_to' => 'http://helpforwordpress.com/h4wp-Content/wp-admin/',
		'wp-submit' => 'Log In'
	);

	$h4wp_defaults = array(
		'method' => 'POST',
		'body' => $h4wp_login_data,
		'timeout' => '60',
		'blocking' => 'false'
	);

	////$h4wp_login_result = wp_remote_request( $h4wp_login_url , $h4wp_defaults);
	//print_r($h4wp_login_result);



?>
