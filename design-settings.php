<script>
        //data save function call on save button onclick and post by action to option table
        function datasave_design_settings()
        {
            var background_color = jQuery('#backgound_color').val();
		    var title_color = jQuery('#title_color').val();
		    var descrip_color = jQuery('#descrip_color').val();
		    var pxselect_post_title = jQuery('#pxselect_post_title').val();
			var font_family_post_title = jQuery('#font_family_post_title').val();
			var pxselect_post_entry = jQuery('#pxselect_post_entry').val();
		    var font_family_post_description = jQuery('#font_family_post_description').val();
			
	
            jQuery.ajax(
            {
		        type: "POST",
		        url: ajaxurl,
	
		        data : {
			    'action':'coming_soon_page_design_settings',
			    'background_color':background_color,
			    'title_color':title_color,
			    'descrip_color':descrip_color,
			    'pxselect_post_title':pxselect_post_title,
			    'font_family_post_title':font_family_post_title,
			    'pxselect_post_entry':pxselect_post_entry,
			    'font_family_post_description':font_family_post_description,
			        },
                success : function(data){
                                   jQuery('#success_message_save').show();
								   jQuery("#success_message_save").fadeOut(5000);
								   location.href='?page=coming_soon';
                                   }			
            });
        }
        //data reset function is call on reset button onclick and data post by ajax action in option table
        function reset_data_typography()
        {
            jQuery.ajax(
            {
		        type: "POST",
		        url: ajaxurl,
	
		        data : {
			    'action':'coming_soon_page_design_reset_settings',
		            },
                success : function(data){
                                   jQuery('#success_message').show();
								   jQuery("#success_message").fadeOut(5000);
								   location.href='?page=coming_soon';
                                   }
            });
        }
</script>

<style>
/* =Tooltips style
========================================================================*/

.icon {
	display: inline-block;
	width: 16px;
	height: 16px;
	position: relative;
	padding: 0 4px 0 0;
	
	background: url(<?php echo plugins_url('images/icons.png',__FILE__) ?>) no-repeat;
}

.tooltip {
	display: none;
	width: 200px;
	position: absolute;
	padding: 10px;
	margin: 4px 0 0 4px;
	top: 0;
	right: 16px;
	border: 1px solid #76B6D7;
	border-radius: 0 8px 8px 8px;
	background: #bedffe;
	font-size: 13px;
	box-shadow: 0 1px 2px -1px #21759B;
	z-index: 999;
}

/* Icons Sprite Position */

.help {
	background-position: 0 0;
}

.warning {
	background-position: -20px 0;
}

.error {
	background-position: -40px 0;
}

/* Tooltip Colors */

.help .tooltip {
	border-color: #76B6D7;
	background-color: #bedffe;
	box-shadow-color: #21759B;
}

.warning .tooltip {
	border-color: #cca863;
	background-color: #ffff70;
	box-shadow-color: #ac8c4e;
}

.error .tooltip {
	border-color: #b50d0d;
	background-color: #e44d4e;
	box-shadow-color: #810606;
}

.icon:hover .tooltip {
	display: block;
}
</style>


<?php  wp_enqueue_script('color-picker-jquery',plugins_url('/js/color-picker-jquery.js',__FILE__),array('farbtastic','jquery-ui-tabs','jquery-ui-sortable')); 
 ?>

        <!-- first div start for diplay design setting on second tab "design" -->
        <div class="block ui-tabs-panel ui-widget-content ui-corner-bottom" id="option_typography" aria-labelledby="ui-id-2" role="tabpanel" style="display: none;">
            <?php $value=get_option('soon_page_desgin_settings');?>
            <!--code for Menu Style-->
            <!-- div start to diplay page top head title -->
            <div class="option option-checbox">
                <span class="option_tab_title"><?php _e('Design Settings');?></span>
                <h3><?php _e('Background Color');?><span class="icon help" style="float:right">
                <span class="tooltip">Select background color.</span></h3>
            </div>
            <!-- div end to diplay page top head title -->
            <!-- div start to diplay "baackground color" field-->
            <div class="option option-background-upload">
                <div class="section">
                    <div class="element">
                        <div class="form-item" >
                            <input  type="text"  class="colorwell" id="backgound_color" name="color_navigation" value="<?php if($value['background_color']=='') { echo '#21759B' ;} else{ echo $value['background_color'];} ?>" />
                        </div>
                        <div id="picker_navigation" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none; margin-left:150px">
                        </div>
                    </div>
                </div>
	        </div>
            <!-- div end to diplay "baackground color" field -->

            <!--div start to display "title and fonts" -->
            <div class="option option-checbox">
                <h3><?php _e('"Title" Font & Color','sis_spa');?><span class="icon help" style="float:right">
                  <span class="tooltip">Customize the font , size and color of the title.</span></h3>
            </div>
            <!--div end to display "title and fonts" -->
            <!--div start to display "title and fonts colors and formats" -->
            <div class="option option-background-upload">
                <div class="section">
                    <div class="element">
             	        <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                            <select name="post_title_px" id="pxselect_post_title" class="select">
								<?php 
								for ($i = 10; $i <=100; $i++) { 
								?>
                                <option value="<?php echo $i; ?>" <?php $value=get_option('soon_page_desgin_settings'); if ( $value['title_font_size'] == $i ) echo selected($value['title_font_size'], $i ); ?> name=""><?php echo $i; ?></option>
							   <?php } ?>
							</select>
					    </div>
			            <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 10px; width: 180px;">
							<select id="main_post_title" onchange="return change_post_title()" class="select">
                                <option value="px"><?php _e('px');?></option>
                                <!-- <option value="em">em</option>-->
                            </select>	
				        </div>
              
                        <?php $value=get_option('soon_page_desgin_settings'); $font_family_post_title = $value['title_font_format']; ?>
					    <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                            <select  name="font_family_post_title" class="select" id="font_family_post_title">
                                <option value="roboto" <?php selected($font_family_post_title, 'roboto' ); ?>>roboto</option>
                                <option value="Arial, sans-serif" <?php selected($font_family_post_title, 'Arial, sans-serif' ); ?>>Arial</option>
                                <option  value="Verdana, Geneva, sans-serif" <?php selected($font_family_post_title, 'Verdana, Geneva, sans-serif' ); ?>>Verdana</option><option value="Trebuchet MS, Tahoma, sans-serif" <?php selected($font_family_post_title, 'Trebuchet MS, Tahoma, sans-serif' ); ?>>Trebuchet</option><option value="Georgia, serif" <?php selected($font_family_post_title, 'Georgia, serif' ); ?>>Georgia</option><option value="Times New Roman, serif" <?php selected($font_family_post_title, 'Times New Roman, serif' ); ?>>Times New Roman</option><option value="Tahoma, Geneva, Verdana, sans-serif" <?php selected($font_family_post_title, 'Tahoma, Geneva, Verdana, sans-serif' ); ?>>Tahoma</option><option value="Palatino, Palatino Linotype, serif" <?php selected($font_family_post_title, 'Palatino, Palatino Linotype, serif' ); ?>>Palatino</option><option value="Helvetica Neue, Helvetica, sans-serif" <?php selected($font_family_post_title, 'Helvetica Neue, Helvetica, sans-serif' ); ?>>Helvetica*</option><option value="Calibri, Candara, Segoe, Optima, sans-serif" <?php selected($font_family_post_title, 'Calibri, Candara, Segoe, Optima, sans-serif' ); ?>>Calibri*</option><option value="Myriad Pro, Myriad, sans-serif" <?php selected($font_family_post_title, 'Myriad Pro, Myriad, sans-serif' ); ?>>Myriad Pro*</option><option value="Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif" <?php selected($font_family_post_title, 'Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif' ); ?>>Lucida</option><option value="Arial Black, sans-serif" <?php selected($font_family_post_title, 'Arial Black, sans-serif' ); ?>>Arial Black</option><option value="Gill Sans, Gill Sans MT, Calibri, sans-serif" <?php selected($font_family_post_title, 'Gill Sans, Gill Sans MT, Calibri, sans-serif' ); ?>>Gill Sans*</option><option value="Geneva, Tahoma, Verdana, sans-serif" <?php selected($font_family_post_title, 'Geneva, Tahoma, Verdana, sans-serif' ); ?>>Geneva*</option><option value="Impact, Charcoal, sans-serif" <?php selected($font_family_post_title, 'Impact, Charcoal, sans-serif' ); ?>>Impact</option><option value="Courier, Courier New, monospace" <?php selected($font_family_post_title, 'Courier, Courier New, monospace' ); ?>>Courier</option><option value="Abel" <?php selected($font_family_post_title, 'Abel' ); ?>>Abel</option><option value="Abril Fatface" <?php selected($font_family_post_title, 'Abril Fatface' ); ?>>Abril Fatface</option><option value="Aclonica" <?php selected($font_family_post_title, 'Aclonica' ); ?>>Aclonica</option><option value="Actor" <?php selected($font_family_post_title, 'Actor' ); ?>>Actor</option><option value="Adamina" <?php selected($font_family_post_title, 'Adamina' ); ?>>Adamina</option><option value="Aldrich" <?php selected($font_family_post_title, 'Aldrich' ); ?>>Aldrich</option><option value="Alice" <?php selected($font_family_post_title, 'Alice' ); ?>>Alice</option><option value="Alike" <?php selected($font_family_post_title, 'Alike' ); ?>>Alike</option><option value="Alike Angular" <?php selected($font_family_post_title, 'Alike Angular' ); ?>>Alike Angular</option><option value="Allan" <?php selected($font_family_post_title, 'Allan' ); ?>>Allan</option><option value="Allerta" <?php selected($font_family_post_title, 'Allerta' ); ?>>Allerta</option><option value="Allerta Stencil" <?php selected($font_family_post_title, 'Allerta Stencil' ); ?>>Allerta Stencil</option><option value="Amaranth" <?php selected($font_family_post_title, 'Amaranth' ); ?>>Amaranth</option><option value="Amatic SC" <?php selected($font_family_post_title, 'Amatic SC' ); ?>>Amatic SC</option><option value="Andada" <?php selected($font_family_post_title, 'Andada' ); ?>>Andada</option><option value="Andika" <?php selected($font_family_post_title, 'Andika' ); ?>>Andika</option><option value="Annie Use Your Telescope" <?php selected($font_family_post_title, 'Annie Use Your Telescope' ); ?>>Annie Use Your Telescope</option><option value="Anonymous Pro" <?php selected($font_family_post_title, 'Anonymous Pro' ); ?>>Anonymous Pro</option><option value="Antic" <?php selected($font_family_post_title, 'Antic' ); ?>>Antic</option><option value="Anton" <?php selected($font_family_post_title, 'Anton' ); ?>>Anton</option><option value="Architects Daughter" <?php selected($font_family_post_title, 'Architects Daughter' ); ?>>Architects Daughter</option><option value="Arimo" <?php selected($font_family_post_title, 'Arimo' ); ?>>Arimo</option><option value="Artifika" <?php selected($font_family_post_title, 'Artifika' ); ?>>Artifika</option><option value="Arvo" <?php selected($font_family_post_title, 'Arvo' ); ?>>Arvo</option><option value="Asset" <?php selected($font_family_post_title, 'Asset' ); ?>>Asset</option><option value="Astloch" <?php selected($font_family_post_title, 'Astloch' ); ?>>Astloch</option><option value="Atomic Age" <?php selected($font_family_post_title, 'Atomic Age' ); ?>>Atomic Age</option><option value="Aubrey" <?php selected($font_family_post_title, 'Aubrey' ); ?>>Aubrey</option><option value="Bangers" <?php selected($font_family_post_title, 'Bangers' ); ?>>Bangers</option><option value="Bentham" <?php selected($font_family_post_title, 'Bentham' ); ?>>Bentham</option><option value="Bevan" <?php selected($font_family_post_title, 'Bevan' ); ?>>Bevan</option><option value="Bigshot One" <?php selected($font_family_post_title, 'Bigshot One' ); ?>>Bigshot One</option><option value="Black Ops One" <?php selected($font_family_post_title, 'Black Ops One' ); ?>>Black Ops One</option><option value="Bowlby One" <?php selected($font_family_post_title, 'Bowlby One' ); ?>>Bowlby One</option><option value="Bowlby One SC" <?php selected($font_family_post_title, 'Bowlby One SC' ); ?>>Bowlby One SC</option><option value="Brawler" <?php selected($font_family_post_title, 'Brawler' ); ?>>Brawler</option><option value="Butcherman Caps" <?php selected($font_family_post_title, 'Butcherman Caps' ); ?>>Butcherman Caps</option><option value="Cabin" <?php selected($font_family_post_title, 'Cabin' ); ?>>Cabin</option><option value="Cabin Sketch" <?php selected($font_family_post_title, 'Cabin Sketch' ); ?>>Cabin Sketch</option><option value="Cabin Sketch" <?php selected($font_family_post_title, 'Cabin Sketch' ); ?>>Cabin Sketch</option><option value="Calligraffitti" <?php selected($font_family_post_title, 'Calligraffitti' ); ?>>Calligraffitti</option><option value="Candal" <?php selected($font_family_post_title, 'Candal' ); ?>>Candal</option><option value="Cantarell" <?php selected($font_family_post_title, 'Cantarell' ); ?>>Cantarell</option><option value="Cardo" <?php selected($font_family_post_title, 'Cardo' ); ?>>Cardo</option><option value="Carme" <?php selected($font_family_post_title, 'Carme' ); ?>>Carme</option><option value="Carter One" <?php selected($font_family_post_title, 'Carter One' ); ?>>Carter One</option><option value="Caudex" <?php selected($font_family_post_title, 'Caudex' ); ?>>Caudex</option><option value="Cedarville Cursive" <?php selected($font_family_post_title, 'Cedarville Cursive' ); ?>>Cedarville Cursive</option><option value="Changa One" <?php selected($font_family_post_title, 'Changa One' ); ?>>Changa One</option><option value="Cherry Cream Soda" <?php selected($font_family_post_title, 'Cherry Cream Soda' ); ?>>Cherry Cream Soda</option><option value="Chewy" <?php selected($font_family_post_title, 'Chewy' ); ?>>Chewy</option><option value="Chivo" <?php selected($font_family_post_title, 'Chivo' ); ?>>Chivo</option><option value="Coda" <?php selected($font_family_post_title, 'Coda' ); ?>>Coda</option><option value="Comfortaa" <?php selected($font_family_post_title, 'Comfortaa' ); ?>>Comfortaa</option><option value="Coming Soon" <?php selected($font_family_post_title, 'Coming Soon' ); ?>>Coming Soon</option><option value="Contrail One" <?php selected($font_family_post_title, 'Contrail One' ); ?>>Contrail One</option><option value="Copse" <?php selected($font_family_post_title, 'Copse' ); ?>>Copse</option><option value="Corben" <?php selected($font_family_post_title, 'Corben' ); ?>>Corben</option><option value="Corben" <?php selected($font_family_post_title, 'Corben' ); ?>>Corben</option><option value="Cousine" <?php selected($font_family_post_title, 'Cousine' ); ?>>Cousine</option><option value="Coustard" <?php selected($font_family_post_title, 'Coustard' ); ?>>Coustard</option><option value="Covered By Your Grace" <?php selected($font_family_post_title, 'Covered By Your Grace' ); ?>>Covered By Your Grace</option><option value="Crafty Girls" <?php selected($font_family_post_title, 'Crafty Girls' ); ?>>Crafty Girls</option><option value="Creepster Caps" <?php selected($font_family_post_title, 'Creepster Caps' ); ?>>Creepster Caps</option><option value="Crimson Text" <?php selected($font_family_post_title, 'Crimson Text' ); ?>>Crimson Text</option><option value="Crushed" <?php selected($font_family_post_title, 'Crushed' ); ?>>Crushed</option><option value="Cuprum" <?php selected($font_family_post_title, 'Cuprum' ); ?>>Cuprum</option><option value="Damion" <?php selected($font_family_post_title, 'Damion' ); ?>>Damion</option><option value="Dancing Script" <?php selected($font_family_post_title, 'Dancing Script' ); ?>>Dancing Script</option><option value="Dawning of a New Day" <?php selected($font_family_post_title, 'Dawning of a New Day' ); ?>>Dawning of a New Day</option><option value="Days One" <?php selected($font_family_post_title, 'Days One' ); ?>>Days One</option><option value="Delius" <?php selected($font_family_post_title, 'Delius' ); ?>>Delius</option><option value="Delius Swash Caps" <?php selected($font_family_post_title, 'Delius Swash Caps' ); ?>>Delius Swash Caps</option><option value="Delius Unicase" <?php selected($font_family_post_title, 'Delius Unicase' ); ?>>Delius Unicase</option><option value="Didact Gothic" <?php selected($font_family_post_title, 'Didact Gothic' ); ?>>Didact Gothic</option><option value="Dorsa" <?php selected($font_family_post_title, 'Dorsa' ); ?>>Dorsa</option><option value="Droid Sans" <?php selected($font_family_post_title, 'Droid Sans' ); ?>>Droid Sans</option><option value="Droid Sans Mono" <?php selected($font_family_post_title, 'Droid Sans Mono' ); ?>>Droid Sans Mono</option><option value="Droid Serif" <?php selected($font_family_post_title, 'Droid Serif' ); ?>>Droid Serif</option><option value="EB Garamond" <?php selected($font_family_post_title, 'EB Garamond' ); ?>>EB Garamond</option><option value="Eater Caps" <?php selected($font_family_post_title, 'Eater Caps' ); ?>>Eater Caps</option><option value="Expletus Sans" <?php selected($font_family_post_title, 'Expletus Sans' ); ?>>Expletus Sans</option><option value="Fanwood Text" <?php selected($font_family_post_title, 'Fanwood Text' ); ?>>Fanwood Text</option><option value="Federant" <?php selected($font_family_post_title, 'Federant' ); ?>>Federant</option><option value="Federo" <?php selected($font_family_post_title, 'Federo' ); ?>>Federo</option><option value="Fontdiner Swanky" <?php selected($font_family_post_title, 'Fontdiner Swanky' ); ?>>Fontdiner Swanky</option><option value="Forum" <?php selected($font_family_post_title, 'Forum' ); ?>>Forum</option><option value="Francois One" <?php selected($font_family_post_title, 'Francois One' ); ?>>Francois One</option><option value="Gentium Book Basic" <?php selected($font_family_post_title, 'Gentium Book Basic' ); ?>>Gentium Book Basic</option><option value="Geo" <?php selected($font_family_post_title, 'Geo' ); ?>>Geo</option><option value="Geostar" <?php selected($font_family_post_title, 'Geostar' ); ?>>Geostar</option><option value="Geostar Fill" <?php selected($font_family_post_title, 'Geostar Fill' ); ?>>Geostar Fill</option><option value="Give You Glory" <?php selected($font_family_post_title, 'Give You Glory' ); ?>>Give You Glory</option><option value="Gloria Hallelujah" <?php selected($font_family_post_title, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah</option><option value="Goblin One" <?php selected($font_family_post_title, 'Goblin One' ); ?>>Goblin One</option><option value="Gochi Hand" <?php selected($font_family_post_title, 'Gochi Hand' ); ?>>Gochi Hand</option><option value="Goudy Bookletter 1911" <?php selected($font_family_post_title, 'Goudy Bookletter 1911' ); ?>>Goudy Bookletter 1911</option><option value="Gravitas One" <?php selected($font_family_post_title, 'Gravitas One' ); ?>>Gravitas One</option><option value="Gruppo" <?php selected($font_family_post_title, 'Gruppo' ); ?>>Gruppo</option><option value="Hammersmith One" <?php selected($font_family_post_title, 'Hammersmith One' ); ?>>Hammersmith One</option><option value="Holtwood One SC" <?php selected($font_family_post_title, 'Holtwood One SC' ); ?>>Holtwood One SC</option><option value="Homemade Apple" <?php selected($font_family_post_title, 'Homemade Apple' ); ?>>Homemade Apple</option><option value="IM Fell DW Pica" <?php selected($font_family_post_title, 'IM Fell DW Pica' ); ?>>IM Fell DW Pica</option><option value="IM Fell English" <?php selected($font_family_post_title, 'IM Fell English' ); ?>>IM Fell English</option><option value="IM Fell English SC" <?php selected($font_family_post_title, 'IM Fell English SC' ); ?>>IM Fell English SC</option><option value="Inconsolata" <?php selected($font_family_post_title, 'Inconsolata' ); ?>>Inconsolata</option><option value="Indie Flower" <?php selected($font_family_post_title, 'Indie Flower' ); ?>>Indie Flower</option><option value="Irish Grover" <?php selected($font_family_post_title, 'Irish Grover' ); ?>>Irish Grover</option><option value="Irish Growler" <?php selected($font_family_post_title, 'Irish Growler' ); ?>>Irish Growler</option><option value="Istok Web" <?php selected($font_family_post_title, 'Istok Web' ); ?>>Istok Web</option><option value="Jockey One" <?php selected($font_family_post_title, 'Jockey One' ); ?>>Jockey One</option><option value="Josefin Sans" <?php selected($font_family_post_title, 'Josefin Sans' ); ?>>Josefin Sans</option><option value="Josefin Slab" <?php selected($font_family_post_title, 'Josefin Slab' ); ?>>Josefin Slab</option><option value="Judson" <?php selected($font_family_post_title, 'Judson' ); ?>>Judson</option><option value="Julee" <?php selected($font_family_post_title, 'Julee' ); ?>>Julee</option><option value="Jura" <?php selected($font_family_post_title, 'Jura' ); ?>>Jura</option><option value="Just Another Hand" <?php selected($font_family_post_title, 'Just Another Hand' ); ?>>Just Another Hand</option><option value="Just Me Again Down Here" <?php selected($font_family_post_title, 'Just Me Again Down Here' ); ?>>Just Me Again Down Here</option><option value="Kameron" <?php selected($font_family_post_title, 'Kameron' ); ?>>Kameron</option><option value="Kelly Slab" <?php selected($font_family_post_title, 'Kelly Slab' ); ?>>Kelly Slab</option><option value="Kenia" <?php selected($font_family_post_title, 'Kenia' ); ?>>Kenia</option><option value="Kranky" <?php selected($font_family_post_title, 'Kranky' ); ?>>Kranky</option><option value="Kreon" <?php selected($font_family_post_title, 'Kreon' ); ?>>Kreon</option><option value="Kristi" <?php selected($font_family_post_title, 'Kristi' ); ?>>Kristi</option><option value="La Belle Aurore" <?php selected($font_family_post_title, 'La Belle Aurore' ); ?>>La Belle Aurore</option><option value="Lato" <?php selected($font_family_post_title, 'Lato' ); ?>>Lato</option><option value="League Script" <?php selected($font_family_post_title, 'League Script' ); ?>>League Script</option><option value="Leckerli One" <?php selected($font_family_post_title, 'Leckerli One' ); ?>>Leckerli One</option><option value="Lekton" <?php selected($font_family_post_title, 'Lekton' ); ?>>Lekton</option><option value="Limelight" <?php selected($font_family_post_title, 'Limelight' ); ?>>Limelight</option><option value="Linden Hill" <?php selected($font_family_post_title, 'Linden Hill' ); ?>>Linden Hill</option><option value="Lobster" <?php selected($font_family_post_title, 'Lobster' ); ?>>Lobster</option><option value="Lobster Two" <?php selected($font_family_post_title, 'Lobster Two' ); ?>>Lobster Two</option><option value="Lora" <?php selected($font_family_post_title, 'Lora' ); ?>>Lora</option><option value="Love Ya Like A Sister" <?php selected($font_family_post_title, 'Love Ya Like A Sister' ); ?>>Love Ya Like A Sister</option><option value="Loved by the King" <?php selected($font_family_post_title, 'Loved by the King' ); ?>>Loved by the King</option><option value="Luckiest Guy" <?php selected($font_family_post_title, 'Luckiest Guy' ); ?>>Luckiest Guy</option><option value="Maiden Orange" <?php selected($font_family_post_title, 'Maiden Orange' ); ?>>Maiden Orange</option>
                            </select>
                        </div>


                        <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 10px; width: 180px;">
                            <select id="" name="font_style_post_title" class="select"><option value="normal" <?php selected('normal'); ?>>Normal</option>
                            </select>
                        </div>
                        <div class="form-item">
		                    <input type="text"  class="colorwell" id="title_color" name="color_post_title" value="<?php  $value=get_option('soon_page_desgin_settings'); if($value['title_color']=='') { echo '#ffffff' ;} else{ echo $value['title_color'];} ?>"/>
		                </div>
		                <div id="picker_post_title" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;margin-left:150px">
		                </div>
                    </div>
                </div>
            </div>
            <!--div end to display "title and fonts colos and formats" -->
            <!--div start for display "Description" Font & Color" -->
            <div class="option option-checbox">
                  <h3><?php _e('"Description" Font & Color');?><span class="icon help" style="float:right">
                  <span class="tooltip">Customize font, size and color of description</span></h3>
            </div>
            <!--div end for display "Description" Font & Color" -->
            <!--div start for display "Description" Font & Color with formats and colors display" -->
            <div class="option option-background-upload">
                <div class="section">
                    <div class="element">
		                <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
				            <select name="post_entry_px" id="pxselect_post_entry" class="select">
								<?php 
								for ($i = 10; $i <= 100; $i++) { 
								?>
                                <option value="<?php echo $i; ?>" <?php $value=get_option('soon_page_desgin_settings'); if ( $value['description_font_size'] == $i ) echo selected($value['description_font_size'], $i ); ?> name=""><?php echo $i; ?></option>
							    <?php } ?>
					        </select>
				        </div>
					    <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 10px; width: 180px;">
                            <select  id="main_post_entry" onchange="return change_post_entry()" class="select">
                                  <option value="px"><?php _e('px');?></option>
                            </select>
				        </div>
                        <?php $value=get_option('soon_page_desgin_settings'); $font_family_post_entry = $value['description_font_format']; ?>
	                    <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                            <select  name="font_family_post_description" class="select" id="font_family_post_description">
                                <option value="roboto" <?php selected($font_family_post_entry, 'roboto' ); ?>>roboto</option>
                                <option value="Arial, sans-serif" <?php selected($font_family_post_entry, 'Arial, sans-serif' ); ?>>Arial</option>
                                <option  value="Verdana, Geneva, sans-serif" <?php selected($font_family_post_entry, 'Verdana, Geneva, sans-serif' ); ?>>Verdana</option><option value="Trebuchet MS, Tahoma, sans-serif" <?php selected($font_family_post_entry, 'Trebuchet MS, Tahoma, sans-serif' ); ?>>Trebuchet</option><option value="Georgia, serif" <?php selected($font_family_post_entry, 'Georgia, serif' ); ?>>Georgia</option><option value="Times New Roman, serif" <?php selected($font_family_post_entry, 'Times New Roman, serif' ); ?>>Times New Roman</option><option value="Tahoma, Geneva, Verdana, sans-serif" <?php selected($font_family_post_entry, 'Tahoma, Geneva, Verdana, sans-serif' ); ?>>Tahoma</option><option value="Palatino, Palatino Linotype, serif" <?php selected($font_family_post_entry, 'Palatino, Palatino Linotype, serif' ); ?>>Palatino</option><option value="Helvetica Neue, Helvetica, sans-serif" <?php selected($font_family_post_entry, 'Helvetica Neue, Helvetica, sans-serif' ); ?>>Helvetica*</option><option value="Calibri, Candara, Segoe, Optima, sans-serif" <?php selected($font_family_post_entry, 'Calibri, Candara, Segoe, Optima, sans-serif' ); ?>>Calibri*</option><option value="Myriad Pro, Myriad, sans-serif" <?php selected($font_family_post_entry, 'Myriad Pro, Myriad, sans-serif' ); ?>>Myriad Pro*</option><option value="Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif" <?php selected($font_family_post_entry, 'Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif' ); ?>>Lucida</option><option value="Arial Black, sans-serif" <?php selected($font_family_post_entry, 'Arial Black, sans-serif' ); ?>>Arial Black</option><option value="Gill Sans, Gill Sans MT, Calibri, sans-serif" <?php selected($font_family_post_entry, 'Gill Sans, Gill Sans MT, Calibri, sans-serif' ); ?>>Gill Sans*</option><option value="Geneva, Tahoma, Verdana, sans-serif" <?php selected($font_family_post_entry, 'Geneva, Tahoma, Verdana, sans-serif' ); ?>>Geneva*</option><option value="Impact, Charcoal, sans-serif" <?php selected($font_family_post_entry, 'Impact, Charcoal, sans-serif' ); ?>>Impact</option><option value="Courier, Courier New, monospace" <?php selected($font_family_post_entry, 'Courier, Courier New, monospace' ); ?>>Courier</option><option value="Abel" <?php selected($font_family_post_entry, 'Abel' ); ?>>Abel</option><option value="Abril Fatface" <?php selected($font_family_post_entry, 'Abril Fatface' ); ?>>Abril Fatface</option><option value="Aclonica" <?php selected($font_family_post_entry, 'Aclonica' ); ?>>Aclonica</option><option value="Actor" <?php selected($font_family_post_entry, 'Actor' ); ?>>Actor</option><option value="Adamina" <?php selected($font_family_post_entry, 'Adamina' ); ?>>Adamina</option><option value="Aldrich" <?php selected($font_family_post_entry, 'Aldrich' ); ?>>Aldrich</option><option value="Alice" <?php selected($font_family_post_entry, 'Alice' ); ?>>Alice</option><option value="Alike" <?php selected($font_family_post_entry, 'Alike' ); ?>>Alike</option><option value="Alike Angular" <?php selected($font_family_post_entry, 'Alike Angular' ); ?>>Alike Angular</option><option value="Allan" <?php selected($font_family_post_entry, 'Allan' ); ?>>Allan</option><option value="Allerta" <?php selected($font_family_post_entry, 'Allerta' ); ?>>Allerta</option><option value="Allerta Stencil" <?php selected($font_family_post_entry, 'Allerta Stencil' ); ?>>Allerta Stencil</option><option value="Amaranth" <?php selected($font_family_post_entry, 'Amaranth' ); ?>>Amaranth</option><option value="Amatic SC" <?php selected($font_family_post_entry, 'Amatic SC' ); ?>>Amatic SC</option><option value="Andada" <?php selected($font_family_post_entry, 'Andada' ); ?>>Andada</option><option value="Andika" <?php selected($font_family_post_entry, 'Andika' ); ?>>Andika</option><option value="Annie Use Your Telescope" <?php selected($font_family_post_entry, 'Annie Use Your Telescope' ); ?>>Annie Use Your Telescope</option><option value="Anonymous Pro" <?php selected($font_family_post_entry, 'Anonymous Pro' ); ?>>Anonymous Pro</option><option value="Antic" <?php selected($font_family_post_entry, 'Antic' ); ?>>Antic</option><option value="Anton" <?php selected($font_family_post_entry, 'Anton' ); ?>>Anton</option><option value="Architects Daughter" <?php selected($font_family_post_entry, 'Architects Daughter' ); ?>>Architects Daughter</option><option value="Arimo" <?php selected($font_family_post_entry, 'Arimo' ); ?>>Arimo</option><option value="Artifika" <?php selected($font_family_post_entry, 'Artifika' ); ?>>Artifika</option><option value="Arvo" <?php selected($font_family_post_entry, 'Arvo' ); ?>>Arvo</option><option value="Asset" <?php selected($font_family_post_entry, 'Asset' ); ?>>Asset</option><option value="Astloch" <?php selected($font_family_post_entry, 'Astloch' ); ?>>Astloch</option><option value="Atomic Age" <?php selected($font_family_post_entry, 'Atomic Age' ); ?>>Atomic Age</option><option value="Aubrey" <?php selected($font_family_post_entry, 'Aubrey' ); ?>>Aubrey</option><option value="Bangers" <?php selected($font_family_post_entry, 'Bangers' ); ?>>Bangers</option><option value="Bentham" <?php selected($font_family_post_entry, 'Bentham' ); ?>>Bentham</option><option value="Bevan" <?php selected($font_family_post_entry, 'Bevan' ); ?>>Bevan</option><option value="Bigshot One" <?php selected($font_family_post_entry, 'Bigshot One' ); ?>>Bigshot One</option><option value="Black Ops One" <?php selected($font_family_post_entry, 'Black Ops One' ); ?>>Black Ops One</option><option value="Bowlby One" <?php selected($font_family_post_entry, 'Bowlby One' ); ?>>Bowlby One</option><option value="Bowlby One SC" <?php selected($font_family_post_entry, 'Bowlby One SC' ); ?>>Bowlby One SC</option><option value="Brawler" <?php selected($font_family_post_entry, 'Brawler' ); ?>>Brawler</option><option value="Butcherman Caps" <?php selected($font_family_post_entry, 'Butcherman Caps' ); ?>>Butcherman Caps</option><option value="Cabin" <?php selected($font_family_post_entry, 'Cabin' ); ?>>Cabin</option><option value="Cabin Sketch" <?php selected($font_family_post_entry, 'Cabin Sketch' ); ?>>Cabin Sketch</option><option value="Cabin Sketch" <?php selected($font_family_post_entry, 'Cabin Sketch' ); ?>>Cabin Sketch</option><option value="Calligraffitti" <?php selected($font_family_post_entry, 'Calligraffitti' ); ?>>Calligraffitti</option><option value="Candal" <?php selected($font_family_post_entry, 'Candal' ); ?>>Candal</option><option value="Cantarell" <?php selected($font_family_post_entry, 'Cantarell' ); ?>>Cantarell</option><option value="Cardo" <?php selected($font_family_post_entry, 'Cardo' ); ?>>Cardo</option><option value="Carme" <?php selected($font_family_post_entry, 'Carme' ); ?>>Carme</option><option value="Carter One" <?php selected($font_family_post_entry, 'Carter One' ); ?>>Carter One</option><option value="Caudex" <?php selected($font_family_post_entry, 'Caudex' ); ?>>Caudex</option><option value="Cedarville Cursive" <?php selected($font_family_post_entry, 'Cedarville Cursive' ); ?>>Cedarville Cursive</option><option value="Changa One" <?php selected($font_family_post_entry, 'Changa One' ); ?>>Changa One</option><option value="Cherry Cream Soda" <?php selected($font_family_post_entry, 'Cherry Cream Soda' ); ?>>Cherry Cream Soda</option><option value="Chewy" <?php selected($font_family_post_entry, 'Chewy' ); ?>>Chewy</option><option value="Chivo" <?php selected($font_family_post_entry, 'Chivo' ); ?>>Chivo</option><option value="Coda" <?php selected($font_family_post_entry, 'Coda' ); ?>>Coda</option><option value="Comfortaa" <?php selected($font_family_post_entry, 'Comfortaa' ); ?>>Comfortaa</option><option value="Coming Soon" <?php selected($font_family_post_entry, 'Coming Soon' ); ?>>Coming Soon</option><option value="Contrail One" <?php selected($font_family_post_entry, 'Contrail One' ); ?>>Contrail One</option><option value="Copse" <?php selected($font_family_post_entry, 'Copse' ); ?>>Copse</option><option value="Corben" <?php selected($font_family_post_entry, 'Corben' ); ?>>Corben</option><option value="Corben" <?php selected($font_family_post_entry, 'Corben' ); ?>>Corben</option><option value="Cousine" <?php selected($font_family_post_entry, 'Cousine' ); ?>>Cousine</option><option value="Coustard" <?php selected($font_family_post_entry, 'Coustard' ); ?>>Coustard</option><option value="Covered By Your Grace" <?php selected($font_family_post_entry, 'Covered By Your Grace' ); ?>>Covered By Your Grace</option><option value="Crafty Girls" <?php selected($font_family_post_entry, 'Crafty Girls' ); ?>>Crafty Girls</option><option value="Creepster Caps" <?php selected($font_family_post_entry, 'Creepster Caps' ); ?>>Creepster Caps</option><option value="Crimson Text" <?php selected($font_family_post_entry, 'Crimson Text' ); ?>>Crimson Text</option><option value="Crushed" <?php selected($font_family_post_entry, 'Crushed' ); ?>>Crushed</option><option value="Cuprum" <?php selected($font_family_post_entry, 'Cuprum' ); ?>>Cuprum</option><option value="Damion" <?php selected($font_family_post_entry, 'Damion' ); ?>>Damion</option><option value="Dancing Script" <?php selected($font_family_post_entry, 'Dancing Script' ); ?>>Dancing Script</option><option value="Dawning of a New Day" <?php selected($font_family_post_entry, 'Dawning of a New Day' ); ?>>Dawning of a New Day</option><option value="Days One" <?php selected($font_family_post_entry, 'Days One' ); ?>>Days One</option><option value="Delius" <?php selected($font_family_post_entry, 'Delius' ); ?>>Delius</option><option value="Delius Swash Caps" <?php selected($font_family_post_entry, 'Delius Swash Caps' ); ?>>Delius Swash Caps</option><option value="Delius Unicase" <?php selected($font_family_post_entry, 'Delius Unicase' ); ?>>Delius Unicase</option><option value="Didact Gothic" <?php selected($font_family_post_entry, 'Didact Gothic' ); ?>>Didact Gothic</option><option value="Dorsa" <?php selected($font_family_post_entry, 'Dorsa' ); ?>>Dorsa</option><option value="Droid Sans" <?php selected($font_family_post_entry, 'Droid Sans' ); ?>>Droid Sans</option><option value="Droid Sans Mono" <?php selected($font_family_post_entry, 'Droid Sans Mono' ); ?>>Droid Sans Mono</option><option value="Droid Serif" <?php selected($font_family_post_entry, 'Droid Serif' ); ?>>Droid Serif</option><option value="EB Garamond" <?php selected($font_family_post_entry, 'EB Garamond' ); ?>>EB Garamond</option><option value="Eater Caps" <?php selected($font_family_post_entry, 'Eater Caps' ); ?>>Eater Caps</option><option value="Expletus Sans" <?php selected($font_family_post_entry, 'Expletus Sans' ); ?>>Expletus Sans</option><option value="Fanwood Text" <?php selected($font_family_post_entry, 'Fanwood Text' ); ?>>Fanwood Text</option><option value="Federant" <?php selected($font_family_post_entry, 'Federant' ); ?>>Federant</option><option value="Federo" <?php selected($font_family_post_entry, 'Federo' ); ?>>Federo</option><option value="Fontdiner Swanky" <?php selected($font_family_post_entry, 'Fontdiner Swanky' ); ?>>Fontdiner Swanky</option><option value="Forum" <?php selected($font_family_post_entry, 'Forum' ); ?>>Forum</option><option value="Francois One" <?php selected($font_family_post_entry, 'Francois One' ); ?>>Francois One</option><option value="Gentium Book Basic" <?php selected($font_family_post_entry, 'Gentium Book Basic' ); ?>>Gentium Book Basic</option><option value="Geo" <?php selected($font_family_post_entry, 'Geo' ); ?>>Geo</option><option value="Geostar" <?php selected($font_family_post_entry, 'Geostar' ); ?>>Geostar</option><option value="Geostar Fill" <?php selected($font_family_post_entry, 'Geostar Fill' ); ?>>Geostar Fill</option><option value="Give You Glory" <?php selected($font_family_post_entry, 'Give You Glory' ); ?>>Give You Glory</option><option value="Gloria Hallelujah" <?php selected($font_family_post_entry, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah</option><option value="Goblin One" <?php selected($font_family_post_entry, 'Goblin One' ); ?>>Goblin One</option><option value="Gochi Hand" <?php selected($font_family_post_entry, 'Gochi Hand' ); ?>>Gochi Hand</option><option value="Goudy Bookletter 1911" <?php selected($font_family_post_entry, 'Goudy Bookletter 1911' ); ?>>Goudy Bookletter 1911</option><option value="Gravitas One" <?php selected($font_family_post_entry, 'Gravitas One' ); ?>>Gravitas One</option><option value="Gruppo" <?php selected($font_family_post_entry, 'Gruppo' ); ?>>Gruppo</option><option value="Hammersmith One" <?php selected($font_family_post_entry, 'Hammersmith One' ); ?>>Hammersmith One</option><option value="Holtwood One SC" <?php selected($font_family_post_entry, 'Holtwood One SC' ); ?>>Holtwood One SC</option><option value="Homemade Apple" <?php selected($font_family_post_entry, 'Homemade Apple' ); ?>>Homemade Apple</option><option value="IM Fell DW Pica" <?php selected($font_family_post_entry, 'IM Fell DW Pica' ); ?>>IM Fell DW Pica</option><option value="IM Fell English" <?php selected($font_family_post_entry, 'IM Fell English' ); ?>>IM Fell English</option><option value="IM Fell English SC" <?php selected($font_family_post_entry, 'IM Fell English SC' ); ?>>IM Fell English SC</option><option value="Inconsolata" <?php selected($font_family_post_entry, 'Inconsolata' ); ?>>Inconsolata</option><option value="Indie Flower" <?php selected($font_family_post_entry, 'Indie Flower' ); ?>>Indie Flower</option><option value="Irish Grover" <?php selected($font_family_post_entry, 'Irish Grover' ); ?>>Irish Grover</option><option value="Irish Growler" <?php selected($font_family_post_entry, 'Irish Growler' ); ?>>Irish Growler</option><option value="Istok Web" <?php selected($font_family_post_entry, 'Istok Web' ); ?>>Istok Web</option><option value="Jockey One" <?php selected($font_family_post_entry, 'Jockey One' ); ?>>Jockey One</option><option value="Josefin Sans" <?php selected($font_family_post_entry, 'Josefin Sans' ); ?>>Josefin Sans</option><option value="Josefin Slab" <?php selected($font_family_post_entry, 'Josefin Slab' ); ?>>Josefin Slab</option><option value="Judson" <?php selected($font_family_post_entry, 'Judson' ); ?>>Judson</option><option value="Julee" <?php selected($font_family_post_entry, 'Julee' ); ?>>Julee</option><option value="Jura" <?php selected($font_family_post_entry, 'Jura' ); ?>>Jura</option><option value="Just Another Hand" <?php selected($font_family_post_entry, 'Just Another Hand' ); ?>>Just Another Hand</option><option value="Just Me Again Down Here" <?php selected($font_family_post_entry, 'Just Me Again Down Here' ); ?>>Just Me Again Down Here</option><option value="Kameron" <?php selected($font_family_post_entry, 'Kameron' ); ?>>Kameron</option><option value="Kelly Slab" <?php selected($font_family_post_entry, 'Kelly Slab' ); ?>>Kelly Slab</option><option value="Kenia" <?php selected($font_family_post_entry, 'Kenia' ); ?>>Kenia</option><option value="Kranky" <?php selected($font_family_post_entry, 'Kranky' ); ?>>Kranky</option><option value="Kreon" <?php selected($font_family_post_entry, 'Kreon' ); ?>>Kreon</option><option value="Kristi" <?php selected($font_family_post_entry, 'Kristi' ); ?>>Kristi</option><option value="La Belle Aurore" <?php selected($font_family_post_entry, 'La Belle Aurore' ); ?>>La Belle Aurore</option><option value="Lato" <?php selected($font_family_post_entry, 'Lato' ); ?>>Lato</option><option value="League Script" <?php selected($font_family_post_entry, 'League Script' ); ?>>League Script</option><option value="Leckerli One" <?php selected($font_family_post_entry, 'Leckerli One' ); ?>>Leckerli One</option><option value="Lekton" <?php selected($font_family_post_entry, 'Lekton' ); ?>>Lekton</option><option value="Limelight" <?php selected($font_family_post_entry, 'Limelight' ); ?>>Limelight</option><option value="Linden Hill" <?php selected($font_family_post_entry, 'Linden Hill' ); ?>>Linden Hill</option><option value="Lobster" <?php selected($font_family_post_entry, 'Lobster' ); ?>>Lobster</option><option value="Lobster Two" <?php selected($font_family_post_entry, 'Lobster Two' ); ?>>Lobster Two</option><option value="Lora" <?php selected($font_family_post_entry, 'Lora' ); ?>>Lora</option><option value="Love Ya Like A Sister" <?php selected($font_family_post_entry, 'Love Ya Like A Sister' ); ?>>Love Ya Like A Sister</option><option value="Loved by the King" <?php selected($font_family_post_entry, 'Loved by the King' ); ?>>Loved by the King</option><option value="Luckiest Guy" <?php selected($font_family_post_entry, 'Luckiest Guy' ); ?>>Luckiest Guy</option><option value="Maiden Orange" <?php selected($font_family_post_entry, 'Maiden Orange' ); ?>>Maiden Orange</option>
                            </select>
                        </div>
                        <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 10px; width: 180px;">
                            <select id="" name="font_style_post_entry" class="select"><option value="normal" <?php selected('normal'); ?>>Normal</option>
                            </select>
                        </div>
					    <div class="form-item">
                            <input type="text"  class="colorwell" id="descrip_color" name="color_post_entry" value="<?php $value=get_option('soon_page_desgin_settings'); if($value['descrip_color']=='') { echo '#ffffff' ;} else{ echo $value['descrip_color'];}?>" />
                        </div>
                        <div id="picker_post_entry" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;margin-left:150px">
                        </div>
                    </div>
                </div>
            </div><br /><br/>
            <!--div end for display "Description" Font & Color with formats and colors display" -->
            <input type="button" class="button-framework save-options"   value= "<?php _e('Save Changes');?>" onclick="datasave_design_settings()"/>
            <input type="button" class="button-framework reset"  value="<?php _e('Restore Defaults');?>" onclick="reset_data_typography()" />
            <div id="success_message" ><?php _e('Data Reset Successfully');?></div>
            <div id="success_message_save"  ><?php _e('Data Save Successfully');?></div>
        </div><!-- end of final div for design settings page -->
<style>
#success_message_save
{
   display: none;
   margin: 15px 8px 0px 1px;
   padding: 13px 0px 15px 52px;
   background: url(<?php echo plugins_url("/images/icon_check.png",__FILE__) ?>) left no-repeat #21759B;
   /*opacity:0.5;
   filter:alpha(opacity=50);*/
   background-position: 15px 15px;
   border: solid 1px #F22853;
   -webkit-border-radius: 15px;
   -moz-border-radius: 15px;
   border-radius: 15px;
   width: 220px;
   font-size: 20px;
   color: #ffffff;
   position: absolute;
   left: 500px;
   bottom: 20px;
   
}		
#success_message
{
   display: none;
   margin: 15px 8px 0px 1px;
   padding: 13px 0px 15px 52px;
    background: url(<?php echo plugins_url("/images/icon_check.png",__FILE__) ?>) left no-repeat #21759B;

   background-position: 15px 15px;
   border: solid 1px #F22853;
   -webkit-border-radius: 15px;
   -moz-border-radius: 15px;
   border-radius: 15px;
   width: 220px;
   font-size: 20px;
   color: #ffffff;
   position: absolute;
   left: 500px;
   bottom: 20px;
   
}
</style>
