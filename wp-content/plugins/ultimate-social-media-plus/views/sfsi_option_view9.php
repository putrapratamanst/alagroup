<?php
    /* unserialize all saved option for Eight options */
    $option9=  unserialize(get_option('sfsi_plus_section9_options',false));
?>
<div class="tab9">
	
    <p>
		<?php  _e('In addition to the email- or follow-icon you can also show a subscription form which maximizes chances that people subscribe to your site.', 'ultimate-social-media-plus'); ?>
    </p>
	
    <div class="sfsi_plus_tab8_container">
    	<!--Section 1-->
        <div class="sfsi_plus_tab8_subcontainer">
    		<h3 class="sfsi_plus_section_title">
            	<?php  _e( 'Preview:', 'ultimate-social-media-plus' ); ?>
            </h3>
            <div class="like_pop_box">
            	<?php get_sfsi_plus_SubscriptionForm(); ?>
            </div>
        </div>
        
        <!--Section 2-->
        <div class="sfsi_plus_tab8_subcontainer sfsi_plus_seprater">
    		<h3 class="sfsi_plus_section_title">
            	<?php  _e( 'Place it on your site', 'ultimate-social-media-plus' ); ?>
            </h3>
            <label class="sfsi_plus_label_text">
            	<?php  _e( 'You can place the form by different methods:', 'ultimate-social-media-plus' ); ?>
            </label>
            
            <ul class="sfsi_plus_form_info">
            	<li>
                    <b>
                        <?php  _e( '1. Widget:', 'ultimate-social-media-plus' ); ?>
                    </b> 
                    
					<?php  _e( 'Go to the', 'ultimate-social-media-plus' ); ?>
                    
                    <a target="_blank" href="<?php echo site_url()?>/wp-admin/widgets.php">
                        <?php  _e( 'widget settings', 'ultimate-social-media-plus' ); ?>
                    </a> 
                    
					<?php  _e( 'and drag & drop it to the sidebar.', 'ultimate-social-media-plus' ); ?>
                </li>
                <li>
                	<b>
                		<?php  _e( '2. Shortcode:', 'ultimate-social-media-plus' ); ?>
                	</b>
                 	
					<?php  _e( 'Use the shortcode', 'ultimate-social-media-plus' ); ?>
                  	
                    <b>[USM_plus_form]</b> 
                  	
					<?php  _e( 'to place it into your codes', 'ultimate-social-media-plus' ); ?>
               	</li>
                <li>
                    <b>
                        <?php  _e( '3. Copy & paste HTML code:', 'ultimate-social-media-plus' ); ?>
                    </b>
                </li>
            </ul>
            
            <div class="sfsi_plus_html" style="display: none;">
            	<?php
					$sfsi_plus_feediid = get_option('sfsi_plus_feed_id');
					$url = "http://www.specificfeeds.com/widgets/subscribeWidget/";
					$url = $url.$sfsi_plus_feediid.'/8/';
				?>
                <div class="sfsi_plus_subscribe_Popinner" style="padding: 18px 0px;">
                    <form method="post" onsubmit="return sfsi_plus_processfurther(this);" target="popupwindow" action="<?php echo $url?>" style="margin: 0px 20px;">
                        <h5 style="margin: 0 0 10px; padding: 0;">
                        	<?php  _e( 'Get new posts by email:', 'ultimate-social-media-plus' ); ?>
                        </h5>
                        <div style="margin: 5px 0; width: 100%;">
                            <input style="padding: 10px 0px !important; width: 100% !important;" type="email" placeholder="Enter your email" value="" name="data[Widget][email]" />
                        </div>
                        <div style="margin: 5px 0; width: 100%;">
                        	<input style="padding: 10px 0px !important; width: 100% !important;" type="submit" name="subscribe" value="Subscribe" /><input type="hidden" name="data[Widget][feed_id]" value="<?php echo $sfsi_plus_feediid ?>"><input type="hidden" name="data[Widget][feedtype]" value="8">
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="sfsi_plus_subscription_html">
            	<xmp id="selectable" onclick="sfsi_plus_selectText('selectable')">
                    <?php get_sfsi_plus_SubscriptionForm(); ?>
                </xmp>
            </div>
        </div>
        
        <!--Section 3-->
        <div class="sfsi_plus_tab8_subcontainer sfsi_plus_seprater">
        	<h3 class="sfsi_plus_section_title">
            	<?php  _e( 'Define text & design (optional)', 'ultimate-social-media-plus' ); ?>
            </h3>
            <h5 class="sfsi_plus_section_subtitle">
            	<?php  _e( 'Overall size & border', 'ultimate-social-media-plus' ); ?>
            </h5>
            
            <!--Left Section-->
            <div class="sfsi_plus_left_container">
            	<?php get_sfsi_plus_SubscriptionForm(); ?>
            </div>
            
            <!--Right Section-->
            <div class="sfsi_plus_right_container">
            	<div class="row_tab">
                    <label class="sfsi_plus_heding">
                    	<?php  _e( 'Adjust size to space on website?', 'ultimate-social-media-plus' ); ?>
                    </label>
					<ul class="border_shadow">
                    	<li>
                        	<input type="radio" class="styled" value="yes" name="sfsi_plus_form_adjustment"
                            	<?php echo sfsi_plus_isChecked($option9['sfsi_plus_form_adjustment'], 'yes'); ?> >
                            <label>
                         		<?php  _e( 'Yes', 'ultimate-social-media-plus' ); ?>
                            </label>
                        </li>
                        <li>
                        	<input type="radio" class="styled" value="no" name="sfsi_plus_form_adjustment"
                            	<?php echo sfsi_plus_isChecked($option9['sfsi_plus_form_adjustment'], 'no'); ?> >
                            <label>
                            	<?php  _e( 'No', 'ultimate-social-media-plus' ); ?>
                            </label>
                        </li>
                    </ul>
				</div>
                <!--Row Section-->
                <div class="row_tab" style="<?php echo ($option9['sfsi_plus_form_adjustment'] == 'yes')? "display:none": ''; ?>">
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Height', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input name="sfsi_plus_form_height" type="text"
                        	value="<?php echo ($option9['sfsi_plus_form_height']!='') ?  $option9['sfsi_plus_form_height'] : '' ;?>"
                            class="small rec-inp" />
                            <span class="pix">
                            	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                            </span>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Width', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input name="sfsi_plus_form_width" type="text"
                        	value="<?php echo ($option9['sfsi_plus_form_width']!='') ?  $option9['sfsi_plus_form_width'] : '' ;?>" class="small rec-inp" />
                            <span class="pix">
                            	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                            </span>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                    <label class="sfsi_plus_heding">
                    	<?php  _e( 'Border?', 'ultimate-social-media-plus' ); ?>
                    </label>
					<ul class="border_shadow">
                    	<li>
                        	<input type="radio" class="styled" value="yes" name="sfsi_plus_form_border"
                            	<?php echo sfsi_plus_isChecked($option9['sfsi_plus_form_border'], 'yes'); ?> >
                            <label>
                            	<?php  _e( 'Yes', 'ultimate-social-media-plus' ); ?>
                            </label>
                        </li>
                        <li>
                        	<input type="radio" class="styled" value="no" name="sfsi_plus_form_border"
                            	<?php echo sfsi_plus_isChecked($option9['sfsi_plus_form_border'], 'no'); ?> >
                            <label>
                            	<?php  _e( 'No', 'ultimate-social-media-plus' ); ?>
                            </label>
                        </li>
                    </ul>
				</div>
                <!--Row Section-->
                <div class="row_tab" style="<?php echo ($option9['sfsi_plus_form_border'] == 'no')? "display:none": ''; ?>">
                	<div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Thickness', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input name="sfsi_plus_form_border_thickness" type="text" value="<?php echo ($option9['sfsi_plus_form_border_thickness']!='')
										? $option9['sfsi_plus_form_border_thickness'] : '' ;
									?>" class="small rec-inp" />
                        <span class="pix">
                        	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                        </span>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Color', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input id="sfsi_plus_form_border_color" class="small color-code" type="text" name="sfsi_plus_form_border_color"
                        	value="<?php echo ($option9['sfsi_plus_form_border_color']!='')
										? $option9['sfsi_plus_form_border_color'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div id="sfsiPlusFormBorderColor" class="color_box1" style="background: <?php echo ($option9['sfsi_plus_form_border_color']!='')? $option9['sfsi_plus_form_border_color'] : '' ;?>"></div>
                        </div>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                    <label class="sfsi_plus_heding autowidth">
                    	<?php  _e( 'Background color:', 'ultimate-social-media-plus' ); ?>
                    </label>
					<div class="sfsi_plus_field">
                    	<input id="sfsi_plus_form_background" class="small color-code" type="text" name="sfsi_plus_form_background"
                        	value="<?php echo ($option9['sfsi_plus_form_background']!='')
										? $option9['sfsi_plus_form_background'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div id="sfsiPlusFormBackground" class="color_box1" style="background: <?php echo ($option9['sfsi_plus_form_background']!='')? $option9['sfsi_plus_form_background'] : '' ;?>"></div>
                        </div>
                    </div>
				</div>
                <!--Row Section-->
            </div>
            
        </div>
        
        <!--Section 4-->
        <div class="sfsi_plus_tab8_subcontainer sfsi_plus_seprater">
        	<h5 class="sfsi_plus_section_subtitle">
            	<?php  _e( 'Text above entry field', 'ultimate-social-media-plus' ); ?>
            </h5>
            
            <!--Left Section-->
            <div class="sfsi_plus_left_container">
            	<?php get_sfsi_plus_SubscriptionForm("h5"); ?>
            </div>
            
            <!--Right Section-->
            <div class="sfsi_plus_right_container">
            	<div class="row_tab">
                    <label class="sfsi_plus_heding fixwidth sfsi_plus_same_width">
                    	<?php  _e( 'Text:', 'ultimate-social-media-plus' ); ?>
                    </label>
                    <div class="sfsi_plus_field">
                        <input type="text" class="small new-inp" name="sfsi_plus_form_heading_text"
                            value="<?php echo ($option9['sfsi_plus_form_heading_text']!='')
										? $option9['sfsi_plus_form_heading_text'] : '' ;
									?>"/>
                    </div>           
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Font:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_font("sfsi_plus_form_heading_font", $option9['sfsi_plus_form_heading_font']); ?>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                       		<?php  _e( ' Font style:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_fontstyle("sfsi_plus_form_heading_fontstyle", $option9['sfsi_plus_form_heading_fontstyle']); ?>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Font color', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input type="text" name="sfsi_plus_form_heading_fontcolor" class="small color-code" id="sfsi_plus_form_heading_fontcolor" value="<?php echo ($option9['sfsi_plus_form_heading_fontcolor']!='')
										? $option9['sfsi_plus_form_heading_fontcolor'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div class="color_box1" id="sfsiPlusFormHeadingFontcolor" style="background: <?php echo ($option9['sfsi_plus_form_heading_fontcolor']!='') ? $option9['sfsi_plus_form_heading_fontcolor'] : '' ;
									?>"></div>
                        </div>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Font size', 'ultimate-social-media-plus' ); ?>
                       	</label>
                        <input type="text" class="small rec-inp" name="sfsi_plus_form_heading_fontsize"
                        	value="<?php echo ($option9['sfsi_plus_form_heading_fontsize']!='')
										? $option9['sfsi_plus_form_heading_fontsize'] : '' ;?>"/>
                        <span class="pix">
                        	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                        </span>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Alignment:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_alignment("sfsi_plus_form_heading_fontalign", $option9['sfsi_plus_form_heading_fontalign']); ?>
                    </div>
                </div>
                <!--End Section-->
            </div>
            
        </div>
        
        <!--Section 5-->
        <div class="sfsi_plus_tab8_subcontainer sfsi_plus_seprater">
        	<h5 class="sfsi_plus_section_subtitle">
            	<?php  _e( 'Entry field', 'ultimate-social-media-plus' ); ?>
            </h5>
            
            <!--Left Section-->
            <div class="sfsi_plus_left_container">
            	<?php get_sfsi_plus_SubscriptionForm("email"); ?>
            </div>
            
            <!--Right Section-->
            <div class="sfsi_plus_right_container">
            	<div class="row_tab">
                    <label class="sfsi_plus_heding fixwidth sfsi_plus_same_width">
                    	<?php  _e( 'Text:', 'ultimate-social-media-plus' ); ?>
                    </label>
                    <div class="sfsi_plus_field">
                        <input type="text" class="small new-inp" name="sfsi_plus_form_field_text"
                            value="<?php echo ($option9['sfsi_plus_form_field_text']!='')
										? $option9['sfsi_plus_form_field_text'] : '' ;
									?>"/>
                    </div>           
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                       		<?php  _e( 'Font:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_font("sfsi_plus_form_field_font", $option9['sfsi_plus_form_field_font']); ?>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                       		<?php  _e( 'Font style:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_fontstyle("sfsi_plus_form_field_fontstyle", $option9['sfsi_plus_form_field_fontstyle']); ?>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<input type="hidden" name="sfsi_plus_form_field_fontcolor" value="">
                    <!--<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">Font color</label>
                        <input type="text" name="sfsi_plus_form_field_fontcolor" class="small color-code" id="sfsi_plus_form_field_fontcolor" value="<?php //echo ($option9['sfsi_plus_form_field_fontcolor']!='')
										//? $option9['sfsi_plus_form_field_fontcolor'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div class="color_box1" id="sfsiPlusFormFieldFontcolor" style="background: <?php //echo ($option9['sfsi_plus_form_field_fontcolor']!='') ? $option9['sfsi_plus_form_field_fontcolor'] : '' ;
									?>"></div>
                        </div>
                    </div>-->
                    <div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Alignment:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_alignment("sfsi_plus_form_field_fontalign", $option9['sfsi_plus_form_field_fontalign']); ?>
                    </div>
                    
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Font size', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input type="text" class="small rec-inp" name="sfsi_plus_form_field_fontsize"
                        	value="<?php echo ($option9['sfsi_plus_form_field_fontsize']!='')
										? $option9['sfsi_plus_form_field_fontsize'] : '' ;?>"/>
                        <span class="pix">
                        	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                        </span>
                    </div>
                </div>
                <!--End Section-->
            </div>
            
        </div>
        
        <!--Section 6-->
        <div class="sfsi_plus_tab8_subcontainer">
        	<h5 class="sfsi_plus_section_subtitle">
            	<?php  _e( 'Subscribe button', 'ultimate-social-media-plus' ); ?>
            </h5>
            
            <!--Left Section-->
            <div class="sfsi_plus_left_container">
            	<?php get_sfsi_plus_SubscriptionForm("submit"); ?>
            </div>
            
            <!--Right Section-->
            <div class="sfsi_plus_right_container">
            	<div class="row_tab">
                    <label class="sfsi_plus_heding fixwidth sfsi_plus_same_width">
                    	<?php  _e( 'Text:', 'ultimate-social-media-plus' ); ?>
                    </label>
                    <div class="sfsi_plus_field">
                        <input type="text" class="small new-inp" name="sfsi_plus_form_button_text"
                            value="<?php echo ($option9['sfsi_plus_form_button_text']!='')
										? $option9['sfsi_plus_form_button_text'] : '' ;
									?>"/>
                    </div>           
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Font:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_font("sfsi_plus_form_button_font", $option9['sfsi_plus_form_button_font']); ?>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Font style:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_fontstyle("sfsi_plus_form_button_fontstyle", $option9['sfsi_plus_form_button_fontstyle']); ?>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Font color', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input type="text" name="sfsi_plus_form_button_fontcolor" class="small color-code" id="sfsi_plus_form_button_fontcolor" value="<?php echo ($option9['sfsi_plus_form_button_fontcolor']!='')
										? $option9['sfsi_plus_form_button_fontcolor'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div class="color_box1" id="sfsiPlusFormButtonFontcolor" style="background: <?php echo ($option9['sfsi_plus_form_button_fontcolor']!='') ? $option9['sfsi_plus_form_button_fontcolor'] : '' ;
									?>"></div>
                        </div>
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>
                        	<?php  _e( 'Font size', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input type="text" class="small rec-inp" name="sfsi_plus_form_button_fontsize"
                        	value="<?php echo ($option9['sfsi_plus_form_button_fontsize']!='')
										? $option9['sfsi_plus_form_button_fontsize'] : '' ;?>"/>
                        <span class="pix">
                        	<?php  _e( 'pixels', 'ultimate-social-media-plus' ); ?>
                        </span>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width">
                        	<?php  _e( 'Alignment:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <?php sfsi_plus_get_alignment("sfsi_plus_form_button_fontalign", $option9['sfsi_plus_form_button_fontalign']); ?>
                    </div>
                </div>
                <!--Row Section-->
                <div class="row_tab">
                	<div class="sfsi_plus_field">
                    	<label class="sfsi_plus_same_width"><b>
                        	<?php  _e( 'Button color:', 'ultimate-social-media-plus' ); ?>
                        </b></label>
                        <input type="text" name="sfsi_plus_form_button_background" class="small color-code" id="sfsi_plus_form_button_background" value="<?php echo ($option9['sfsi_plus_form_button_background']!='')
										? $option9['sfsi_plus_form_button_background'] : '' ;
									?>">
                        <div class="color_box">
                            <div class="corner"></div>
                            <div class="color_box1" id="sfsiPlusFormButtonBackground" style="background: <?php echo ($option9['sfsi_plus_form_button_background']!='') ? $option9['sfsi_plus_form_button_background'] : '' ;
									?>"></div>
                        </div>
                    </div>
                </div>    
                <!--End Section-->
            </div>
            
        </div>
    	<!--Section End-->
    </div>
    
	<!-- SAVE BUTTON SECTION   --> 
	<div class="save_button">
       <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
       <?php $nonce = wp_create_nonce("update_plus_step9"); ?>
       <a  href="javascript:;" id="sfsi_plus_save9" title="Save" data-nonce="<?php echo $nonce;?>">
       	<?php  _e( 'Save', 'ultimate-social-media-plus' ); ?>
       </a>
	</div>
    <!-- END SAVE BUTTON SECTION   -->
	
    <a class="sfsiColbtn closeSec" href="javascript:;">
    	<?php  _e( 'Collapse area', 'ultimate-social-media-plus' ); ?>
    </a>
	<label class="closeSec"></label>
    
	<!-- ERROR AND SUCCESS MESSAGE AREA-->
	<p class="red_txt errorMsg" style="display:none"> </p>
	<p class="green_txt sucMsg" style="display:none"> </p>
	<div class="clear"></div>
	
</div>
<?php
function sfsi_plus_isChecked($givenVal, $value)
{
	if($givenVal == $value)
		return 'checked="true"';
	else
		return '';
}
function sfsi_plus_isSeletcted($givenVal, $value)
{
	if($givenVal == $value)
		return 'selected="true"';
	else
		return '';
}
function sfsi_plus_get_font($name, $value)
{
	?>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">
			<option value="Arial, Helvetica, sans-serif"
				<?php echo sfsi_plus_isSeletcted("Arial, Helvetica, sans-serif", $value) ?> >
				<?php  _e( 'Arial', 'ultimate-social-media-plus' ); ?>
			</option>
			<option value="Arial Black, Gadget, sans-serif"
				<?php echo sfsi_plus_isSeletcted("Arial Black, Gadget, sans-serif", $value) ?> >
				<?php  _e( 'Arial Black', 'ultimate-social-media-plus' ); ?>
			</option>
			<option value="Calibri" <?php echo sfsi_plus_isSeletcted("Calibri", $value) ?> >
           		<?php  _e( ' Calibri', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Comic Sans MS" <?php echo sfsi_plus_isSeletcted("Comic Sans MS", $value) ?> >
            	<?php  _e( ' Comic Sans MS', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Courier New" <?php echo sfsi_plus_isSeletcted("Courier New", $value) ?> >
            	<?php  _e( ' Courier New', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Georgia" <?php echo sfsi_plus_isSeletcted("Georgia", $value) ?> >
            	<?php  _e( 'Georgia', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Helvetica,Arial,sans-serif"
				<?php echo sfsi_plus_isSeletcted("Helvetica,Arial,sans-serif", $value) ?> >
				<?php  _e( 'Helvetica', 'ultimate-social-media-plus' ); ?>
			</option>
			<option value="Impact" <?php echo sfsi_plus_isSeletcted("Impact", $value) ?> >
                <?php  _e( 'Impact', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Lucida Console" <?php echo sfsi_plus_isSeletcted("Lucida Console", $value) ?> >
                <?php  _e( 'Lucida Console', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Tahoma,Geneva" <?php echo sfsi_plus_isSeletcted("Tahoma,Geneva", $value) ?> >
                <?php  _e( 'Tahoma', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Times New Roman" <?php echo sfsi_plus_isSeletcted("Times New Roman", $value) ?> >
            	<?php  _e( 'Times New Roman', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Trebuchet MS" <?php echo sfsi_plus_isSeletcted("Trebuchet MS", $value) ?> >
            	<?php  _e( 'Trebuchet MS', 'ultimate-social-media-plus' ); ?>
            </option>
			<option value="Verdana" <?php echo sfsi_plus_isSeletcted("Verdana", $value) ?> >
            	<?php  _e( 'Verdana', 'ultimate-social-media-plus' ); ?>
            </option>
		</select>
	<?php
}
function sfsi_plus_get_fontstyle($name, $value)
{
	?>
	<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">
		<option value="normal" <?php echo sfsi_plus_isSeletcted("normal", $value) ?> >
        	<?php  _e( 'Normal', 'ultimate-social-media-plus' ); ?>
        </option>
		<option value="inherit" <?php echo sfsi_plus_isSeletcted("inherit", $value) ?> >
        	<?php  _e( 'Inherit', 'ultimate-social-media-plus' ); ?>
        </option>
		<option value="oblique" <?php echo sfsi_plus_isSeletcted("oblique", $value) ?> >
        	<?php  _e( 'Oblique', 'ultimate-social-media-plus' ); ?>
        </option>
		<option value="italic" <?php echo sfsi_plus_isSeletcted("italic", $value) ?> >
        	<?php  _e( 'Italic', 'ultimate-social-media-plus' ); ?>
        </option>
        <option value="bold" <?php echo sfsi_plus_isSeletcted("bold", $value) ?> >
        	<?php  _e( 'Bold', 'ultimate-social-media-plus' ); ?>
        </option>
	</select>
	<?php                     
}
function sfsi_plus_get_alignment($name, $value)
{
	?>
	<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="select-same">
		<option value="left" <?php echo sfsi_plus_isSeletcted("left", $value) ?> >
        	<?php  _e( 'Left Align', 'ultimate-social-media-plus' ); ?>
        </option>
		<option value="center" <?php echo sfsi_plus_isSeletcted("center", $value) ?> >
        	<?php  _e( 'Centered', 'ultimate-social-media-plus' ); ?>
        </option>
		<option value="right" <?php echo sfsi_plus_isSeletcted("right", $value) ?> >
        	<?php  _e( 'Right Align', 'ultimate-social-media-plus' ); ?>
        </option>
	</select>	
	<?php
}
function get_sfsi_plus_SubscriptionForm($hglht=null)
{
	?>
    	<div class="sfsi_plus_subscribe_Popinner">
            <div class="form-overlay"></div>
            <form method="post">
                <h5 <?php if($hglht=="h5"){ echo 'class="sfsi_plus_highlight"';}?> >
               		<?php  _e( 'Get new posts by email:', 'ultimate-social-media-plus' ); ?>
                </h5>
                <div class="sfsi_plus_subscription_form_field">
                    <input type="email" name="data[Widget][email]" placeholder="Enter your email" value=""
                    	<?php if($hglht=="email"){ echo 'class="sfsi_plus_highlight"';}?> />
                </div>
                <div class="sfsi_plus_subscription_form_field">
                    <input type="submit" name="subscribe" value="Subscribe"
                     <?php if($hglht=="submit"){ echo 'class="sfsi_plus_highlight"';}?> />
                </div>
            </form>
        </div>
    <?php
}
?>