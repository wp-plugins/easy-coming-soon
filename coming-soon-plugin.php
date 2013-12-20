<?php
					/*
					Plugin Name:Easy Coming Soon
					Description: Easy coming Soon plugin allows you to quickly create a launch / under construction page for your website. Collect E-mails and connect with users on Social Networks. 
					Version: 0.92
					Author:Deepesh paiwal
					Author URI: http://webriti.com
					Plugin URI: http://webriti.com
					*/
		add_action('admin_menu','coming_soon_menu');


        /*
        * Coming Soon menu
        *
        * Create the Plugin Menu
        *
        */
		function coming_soon_menu()
		{
        
		 	$menu = add_menu_page('Easy coming soon', 'Easy coming soon','administrator', 'coming_soon',	'construction');
	
			add_action( 'admin_print_styles-' . $menu, 'coming_soon_plugin_js_css' );
		}

        /*
        * Coming Soon plugin js and css
        *
        * attach file css and js from plugin directory
        *
        */
		

		function coming_soon_plugin_js_css()
		{
            // enqueue script for coming soon plugin
			
			wp_enqueue_script( 'theme-preview' );
		    wp_enqueue_script('tab',plugins_url('/js/spa-tab.js',__FILE__));
		    wp_enqueue_script('tab-content',plugins_url('/js/jquery.option.tree.js',__FILE__));
		    wp_enqueue_script('media-uploads',plugins_url('/js/media-upload-script.js',__FILE__),array('media-upload','thickbox','jquery'));
			
  
		   
		   
  
			wp_enqueue_style('dashboard');
			
		
            //enqueue css for coming soon plugin
			wp_enqueue_style('spa_flexslider', plugins_url('/css/theme-admin.css',__FILE__));
            wp_enqueue_style('classic',plugins_url('/css/style-classic.css',__FILE__));
            wp_enqueue_style('option',plugins_url('/css/style-option.css',__FILE__));
            wp_enqueue_style('thickbox');
            wp_enqueue_style('farbtasticss',plugins_url('/css/farbtasticss.css',__FILE__));
            
			
        }
		
		
		function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', plugins_url('/css/ecs-admin-style.css',__FILE__), false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
		
		
		add_action('admin_bar_menu', 'my_custom_menu', 1000);
function my_custom_menu()
{
    global $wp_admin_bar;
	$value=get_option('soon_page_settings');
    if($value['status']=='0') return;
    // Add Parent Menu
    $argsParent=array(
        'id' => 'myCustomMenu',
        'title' => 'Coming Soon Mode Enable',
		 //'parent' => 'top-secondary',
        'href' => '?page=coming_soon',
		'meta'   => array( 'class' => 'ecs-mode-enable' ),
    );
    $wp_admin_bar->add_menu($argsParent);

   
}


        /*
        * Construction
        *
        * This function is render all setting page on coming soon plugin page
        *
        */
        function construction()
		{   ?>
      
		    <!-- div "wrap" is start to get all setting page in warpper  -->
            <div class="wrap" id="framework_wrap">

                <!-- div class icon32 is start to attach coming soon icon on top page heading -->
                
                <!-- div class icon32 is close  -->
<div class="plugin-title">
<div class="icon32" id="icon-options-general" style="background-position:-369px -7px;">
                </div>
                <!-- coming soon plugin headline -->
                <h3 style="font-size:18px"><?php _e('Coming Soon Plugin');?></h3>
		
				<div style="float:right;margin-top: -8%;line-height: 1.5;margin-right: 3%;"><span style="margin-bottom:-10px;text-shadow: 1px 1px 0 #fff;font-size:16px;">&nbsp;&nbsp;Design By</span><br><a href="http://www.webriti.com/" target="_new"><img src="<?php echo plugins_url('/images/png.png',__FILE__); ?>"/></a></div>

               </div>
                <div class="one-third">
                
                    <!--div content_wrap is start -->
                    <div id="content_wrap">
                        <!-- div content is start to add content in tabs-->
                        <div id="content">
                            <!-- div options_tabs is start to add tab list in left side of warpper -->
                            <div id="options_tabs" class="ui-tabs ">
                                <ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
                                    <li class="active" role="tab" tabindex="0" aria-controls="option_general_default" aria-labelledby="ui-id-1" aria-selected="true"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1"><img src="<?php echo plugins_url('images/general.png',__FILE__)?>" />&nbsp;&nbsp;<?php _e('General');?></a>
                                    </li>

                                    <li  role="tab" tabindex="-1" aria-controls="option_demo_header" aria-labelledby="ui-id-2" aria-selected="true">
                                    <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2"><img src="<?php echo plugins_url('images/design.png',__FILE__)?>" />&nbsp;&nbsp;<?php _e('Design');?></a>
                                    </li>
                                     <li role="tab" tabindex="-1" aria-controls="option_color_header" aria-labelledby="ui-id-5" aria-selected="false"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5"><img src="<?php echo plugins_url('images/message.png',__FILE__)?>" />&nbsp;&nbsp;<?php _e('Notification');?></a>
                                     </li>

                                   <li><a href="<?php echo home_url(); ?>?my_preview=true&TB_iframe=true&width=500&height=532" title="<?php _e('Live Preview Window') ?>"  class="ui-tabs-anchor thickbox-preview"  ><img src="<?php echo plugins_url('images/icon_on.png',__FILE__)?>" />&nbsp;&nbsp;<?php _e('Live Preview');?> </a>
                                    </li>
									 <li role="tab" tabindex="-1" aria-controls="option_color_header" aria-labelledby="ui-id-6" aria-selected="false"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-6"><strong><?php _e('Get Premium Version');?></strong></a>
                                     </li>
									 <div id="nav-shadow"></div>
                                </ul>

                                <!-- Apply script for call open window on live preview button for preview coming soon page-->
                                <!-- tab-1 to add general settings on right side of coming soon plugin wrapper -->
                                <?php require_once('general-settings.php');?>
                                <!-- tab-2 to add design settings on right side of coming soon plugin wrappers-->
                                <?php include('design-settings.php');?>
                                <!-- tab-3 to add notification settings on right side of coming soon plugin wrappers-->
                                <?php include('notification-settings.php');?>
									 <!-- tab-5 pro Feature-->
                                <?php include('pro.php');?>
                                <br class="clear">
                            </div><!-- end div of option_tabs -->
                        </div><!-- end div of content -->
                    </div><!-- end div of content_wrap -->
		        </div> <!-- end of div one third-->
                
                 <div class="one-fourth" style="margin-top:-50px;">
				 
                   <div id="dashboard_recent_drafts" class="postbox" style="float:right;width:20%;margin-right:1.7%;margin-top:0%;position:fixed;right:0px;">
<div class="handlediv" title="Click to toggle">
<br>
</div>  
<h3 class="hndle" style="font-size:16px;padding-top:5px;padding-left:5px;padding-bottom:10px;">
<span><img src="<?php echo plugins_url('images/star.png',__FILE__)?>" />&nbsp; Show us some Love</span>
</h3>
<div class="inside" style="font-size:14px;" > 
* Like This Plugin? Give your rating and review<br /><br />
<img src="<?php echo plugins_url('images/arrow1.png',__FILE__)?>" />&nbsp;&nbsp;&nbsp;<a href="http://wordpress.org/plugins/easy-coming-soon/" target="_new">Rate us on Wordpress</a><br />
<br />
</div>

</div>
<br><br><br>
 <div id="dashboard_recent_drafts" class="postbox " style="float:right;width:20%;margin-right:1.7%;margin-top:11%;position:fixed;right:0px;">
<div class="handlediv" title="Click to toggle">
<br>
</div>
<h3 class="hndle" style="font-size:16px;padding-top:5px;padding-left:5px;padding-bottom:10px;">
<span><img src="<?php echo plugins_url('images/support.png',__FILE__)?>" />&nbsp;Support & Feedback</span>
</h3>
<div class="inside" style="font-size:14px;" > 

In case you face any problem, contact us via the <a href="http://wordpress.org/support/plugin/easy-coming-soon" target="_new">Forums</a>.<br />
<br />
</div>

</div>
			
                 </div>
                
            </div> <!-- end of div wrap -->
                <!--One Forth Part Right End-->
            <?php
		}

        /*
        * add_action to call coming_soon_general_page_save_settings
        */

		add_action('wp_ajax_coming_soon_page_settings', 'coming_soon_general_page_save_settings');

        /*
        * Function coming_soon_general_page_save_settings function
        *
        * To get data from general setting page after  "save settings" by ajax post
        *
        */

		function coming_soon_general_page_save_settings()
		{
            //when ajax action call to post data from general settings page
		    if(isset($_POST['action']) == "coming_soon_page_settings")
		    {
		        $status = mysql_real_escape_string($_POST['status']);
		        $background = mysql_real_escape_string($_POST['background']);
		        $title = mysql_real_escape_string($_POST['title']);
		        $descrip = mysql_real_escape_string($_POST['descrip']);
				$google_code = stripslashes($_POST['google_code']);
		        
				
		        $fb = mysql_real_escape_string($_POST['fb']);
		        $twit = mysql_real_escape_string($_POST['twit']);
		        $gp = mysql_real_escape_string($_POST['gp']);

                //all data is sotre in array form
		        $general_page_save_setting = array( 'status' => $status,
		        'background' => $background,
		        'title' => $title,
		        'descrip' => $descrip,
				'google_code' => $google_code,
		        
				
		        'fb' => $fb,
		        'twit' => $twit,
		        'gp' => $gp
		        );
		        // data is insert into option table
		        update_option("soon_page_settings", $general_page_save_setting);
		    }
		}

        /*
        * add_action to call coming_soon_general_page_reset_settings
        */

        add_action('wp_ajax_coming_soon_page_reset_settings', 'coming_soon_general_page_reset_settings');

        /*
        * Function coming_soon_general_page_reset_settings 
        *
        * To get data from general setting page after  "reset data" by ajax post
        *
        */
		function coming_soon_general_page_reset_settings()
		{
		    if(isset($_POST['action']) == "coming_soon_page_reset_settings")
		    {
		        $status = "1";
		        $background = "";
		        $title = "";
		        $descrip = "";
				$google_code = "";
		        
		        $fb = "";
		        $twit ="";
		        $gp = "";
		
                $general_page_reset_setting = array( 'status' => $status,
		        'background' => $background,
		        'title' => $title,
		        'descrip' => $descrip,
				'google_code' => $google_code,
		        
		        'fb' => $fb,
		        'twit' => $twit,
		        'gp' => $gp
		        );
                //send data into option table by update option
		        update_option("soon_page_settings", $general_page_reset_setting);
		    }
		}

        /*
        *  add_action to call coming_soon_design_page_save_settings function
        */
		add_action('wp_ajax_coming_soon_page_design_settings', 'coming_soon_page_design_save_settings');

        /*
        * Function coming_soon_design_page_save_settings
        *
        * To get data from design setting page after  "save settings" by ajax post
        *
        */
		function coming_soon_page_design_save_settings()
		{
		    if(isset($_POST['action']) == "coming_soon_page_design_settings")
		    {
		        $background_color = mysql_real_escape_string($_POST['background_color']);
		        $title_color = mysql_real_escape_string($_POST['title_color']);
		        $title_font_size = mysql_real_escape_string($_POST['pxselect_post_title']);
		        $title_font_format = mysql_real_escape_string($_POST['font_family_post_title']);
                $descrip_color = mysql_real_escape_string($_POST['descrip_color']);
		        $description_font_size = mysql_real_escape_string($_POST['pxselect_post_entry']);
		        $description_font_format = mysql_real_escape_string($_POST['font_family_post_description']);
		
                $design_settings_save_setting = array( 'background_color' => $background_color,
		        'title_color' => $title_color,
		        'title_font_size' => $title_font_size,
		        'title_font_format' => $title_font_format,
                'descrip_color' => $descrip_color,
		        'description_font_size' => $description_font_size,
		        'description_font_format' => $description_font_format,
                );

		        update_option("soon_page_desgin_settings", $design_settings_save_setting);
		    }
		}

        /*
        * add_action to call coming_soon_design_page_reset_settings function
        */
        add_action('wp_ajax_coming_soon_page_design_reset_settings', 'coming_soon_page_design_reset_settings');

        /*
        * Function coming_soon_design_page_reset_settings
        *
        * To get data from design setting page after  "reset settings" by ajax post
        *
        */
		function coming_soon_page_design_reset_settings()
		{
	        if(isset($_POST['action']) == "coming_soon_page_design_reset_settings")
		    {
		        $background_color ="#21759B";
		        $title_color = "#ffffff";
		        $descrip_color ="#ffffff";
		        $title_font_size = "30";
		        $title_font_format = "Arial Black, sans-serif";
		        $description_font_size ="20";
		        $description_font_format = "Verdana, Geneva, sans-serif";

                $design_page_reset_setting = array( 'background_color' => $background_color,
		        'title_color' => $title_color,
		        'descrip_color' => $descrip_color,
		        'title_font_size' => $title_font_size,
		        'title_font_format' => $title_font_format,
		        'description_font_size' => $description_font_size,
		        'description_font_format' => $description_font_format,
		    	);
		
		        update_option("soon_page_desgin_settings", $design_page_reset_setting);
		    }
		}
/*
        * add_action to call coming_soon_page_notification_settings function
        */
        add_action('wp_ajax_coming_soon_page_notification_settings', 'coming_soon_page_notification_settings');
		/*
        * Function coming_soon_Notification_page_save_settings
        *
        * To get data from notification setting page after  "save settings" by ajax post
        *
        */
		function coming_soon_page_notification_settings()
		{
		     if(isset($_POST['action']) == "coming_soon_page_notification_settings")
		    {
		        		$mailto = ($_POST['mailto']);
				$email_address = ($_POST['email_address']);
				$message = ($_POST['message']);
				$sb_btn = ($_POST['sb_btn']);
				$placeholder_text = ($_POST['placeholder_text']); 
		        

                //all data is store in array form
		        $notification_page_save_setting = array( 
		        
				'mailto' => $mailto,
				'email_address' => $email_address,
				'message' => $message,
				'sb_btn' => $sb_btn,
				'placeholder_text' => $placeholder_text,
		       
		        );
		        // data is insert into option table
		        update_option("soon_page_notification_settings", $notification_page_save_setting);
		        
			
		    }
		}
		
		
		/*
        * add_action to call coming_soon_page_reset_notification_settings function
        */
        add_action('wp_ajax_coming_soon_page_reset_notification_settings', 'coming_soon_page_reset_notification_settings');
		/*
        * Function coming_soon_Notification_page_save_settings
        *
        * To get data from notification setting page after  "reset settings" by ajax post
        *
        */
		function coming_soon_page_reset_notification_settings()
		{
		     if(isset($_POST['action']) == "coming_soon_page_reset_notification_settings")
		    {
		        
		       $mailto = "no";
				$email_address ="";
				$message = "Thanks for subscribing this page";
				$sb_btn ="";
				$placeholder_text="";
				
		        

                //all data is sotre in array form
		        $notification_page_reset_setting = array( 
		        
				'mailto' => $mailto,
				'email_address' => $email_address,
				'message' => $message,
				'sb_btn' => $sb_btn,
				'placeholder_text' => $placeholder_text,
		       
		       
		        );
		        // data is insert into option table
		        update_option("soon_page_notification_settings", $notification_page_reset_setting);
			
		    }
		}
        /*
        * Function  my_page_template_redirect
        *
        * To redirect our site url by coming soon page,after redirecting only our coming soon page can display
        *
        */
        function my_page_template_redirect()
        {
            //get status value from option table for enable or disable coming soon page
	        $value=get_option('soon_page_settings');

            //condition matching if status is not disable for coming soon then page is redirect
			if($value['status']!=='0')
            {
				if(!is_feed())
				{
                	//if user not login page is redirect on coming soon template page
	            	if ( !is_user_logged_in()  )
                	{
                        //get path of our coming soon display page and redirecting
                    	$file = plugin_dir_path(__FILE__).'template/coming_soon_display.php';
	                	include($file);
			        	exit();
                	}
				}
                //if user is log-in then we check role.
	            if (is_user_logged_in() )
                {
                    //get logined in user role
		            global $current_user;
		            get_currentuserinfo();
		            $LoggedInUserID = $current_user->ID;
		            $UserData = get_userdata( $LoggedInUserID );
		            //if user role not 'administrator' redirect him to message page
		            if($UserData->roles[0] != "administrator")
		            {
                        if(!is_feed())
                        {
		                    $file = plugin_dir_path(__FILE__).'template/coming_soon_display.php';
	                       include($file);
			               exit();
		                }
                    }
		        }
            }
        }

        /*
        * add action to call function my_page_template_redirect
        */
        add_action( 'template_redirect', 'my_page_template_redirect' );
		
		        //get page for live preview when my_preview is true,that mean when this page is call on live preview
                if (  (isset($_GET['my_preview']) && $_GET['my_preview'] == 'true') )
                {
                    $file = plugin_dir_path(__FILE__).'template/coming_soon_display.php';
	                include($file);
			        exit();
                }
		 
		 
?>