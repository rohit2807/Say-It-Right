<?php
/*
 Plugin Name: Custom Header Footer
 Description: This Plugin will add HTML code like css , js
 Version: 1.1
 Author: Kumbh Design Inc
 Author URI: http://kumbhdesign.com
 License:     GPL2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
/*
* Init the pluginn
*/

add_action('init','ecpt_top_header');
function ecpt_top_header(){
	
		add_action('wp_head', 'header_start',0);
		add_action('wp_head','header_bottom',1000);  //wp_head used to set your html in header part
		add_action('wp_footer','footer_top',0);  //wp_footer used to set your html in footer part
		add_action('wp_footer','footer_bottom',1000);  //wp_footer used to set your html in footer part

		//create custom menu plugin setting
		add_action('admin_menu','ecpt_register_options_page'); //admin_menu function is used to create menu on dashboard
		add_action('admin_init', 'my_plugin'); //admin_init is used to register different settings
}

/*
* functions for echoing the HTML
*/

function header_start(){
	echo get_option('injection_head_start');
}

function header_bottom() { 

	echo   get_option('injection_head_bottom');
}

function footer_top(){
	echo   get_option('injection_footer_top');	
}

function footer_bottom() { 

	 echo get_option('injection_footer_bottom');
}


function ecpt_register_options_page(){
		add_menu_page('Custom Header Footer Plugin', //required 
				  					'HEADER FOOTER HTML', //required
									'administrator',//required
									'insert-header', //required
									'header_plugin',	//header_plugin() is viewed content when admin click on plugin setting page 
									'dashicons-admin-customizer'
									);		//add_options_page is used  to add menu
}

function my_plugin(){
		register_setting('header_group', 'injection_head_start');
		register_setting('header_group', 'injection_head_bottom');
		register_setting('header_group', 'injection_footer_top');
		register_setting('header_group', 'injection_footer_bottom');
}

function header_plugin(){
?>	
	
	<?php settings_errors(); ?>
	<?php echo "<h2>Header Footer HTML Settings</h2>";?>	
	<?php echo "<p>Here you can inject custom HTML directly into various useful spots within your theme. This is useful for custom meta tags in the header or for loading custom scripts into your page</p>";?>
		
	<form action="options.php" method="post">
    	    <?php settings_fields( 'header_group' ); ?>
		    <?php do_settings_sections( 'header_group' ); ?>
			
                  <h2>Start of Header Tag</h2>
       				<textarea name="injection_head_start" cols="100" rows="7" placeholder="<!--Start of Head tag--!>"><?php echo get_option('injection_head_start'); ?></textarea>

                 <h2>End of Head Tag</h2>
       			 <textarea name="injection_head_bottom" cols="100"  rows="7" placeholder="<!--End of Head tag--!>"><?php echo get_option('injection_head_bottom'); ?></textarea>
                 
                 <h2>Start of Footer Tag</h2>
       			 <textarea name="injection_footer_top" cols="100"  rows="7"  placeholder="<!--Start of Footer tag--!>"><?php echo get_option('injection_footer_top'); ?></textarea>
                 
	               <h2>End of Footer Tag</h2>
       				<textarea name="injection_footer_bottom" cols="100" rows="7" placeholder="<!--End of Footer tag--!>"><?php echo get_option('injection_footer_bottom'); ?></textarea>
      			  </tr>
                </table>
              <?php submit_button(); ?>
    </form>
<p><small>Header Footer HTML is made by <a href="http://www.kumbhdesign.com/">Kumbh Design Inc</a>.</small>
</p>
<p>&copy; <?php echo date('Y');?> Kumbh Design Inc. All Rights Reserved.</p>
<?php }?>
