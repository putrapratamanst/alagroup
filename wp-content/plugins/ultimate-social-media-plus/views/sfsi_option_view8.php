<?php
     /* unserialize all saved option for Eight options */
    $option8=  unserialize(get_option('sfsi_plus_section8_options',false));
	if(!isset($option8['sfsi_plus_rectsub']))
	{
		$option8['sfsi_plus_rectsub'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectfb']))
	{
		$option8['sfsi_plus_rectfb'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_rectgp']))
	{
		$option8['sfsi_plus_rectgp'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_rectshr']))
	{
		$option8['sfsi_plus_rectshr'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_recttwtr']))
	{
		$option8['sfsi_plus_recttwtr'] = 'no';
	}
?>
<div class="tab8">
	<ul class="sfsiplus_icn_listing8">
    	<!--First Section-->
		<li class="">
			<div class="radio_section tb_4_ck" onclick="checkforinfoslction(this);"><input name="sfsi_plus_show_via_widget" <?php echo ($option8['sfsi_plus_show_via_widget']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_show_via_widget" type="checkbox" value="yes" class="styled"  /></div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show them via a widget', 'ultimate-social-media-plus' ); ?>
                    </span><br>
                    <?php
                    if($option8['sfsi_plus_show_via_widget']=='yes')
					{
						$label_style = 'style="display:block; font-size: 16px;"';
					}
					else
					{
						$label_style = 'style="font-size: 16px;"';
					}
					?>
					<label class="sfsiplus_sub-subtitle ckckslctn" <?php echo $label_style;?>>
                    	<?php  _e( 'Go to the', 'ultimate-social-media-plus' ); ?>
                    	<a href="<?php echo admin_url('widgets.php');?>">
                    		<?php  _e( 'widgets area', 'ultimate-social-media-plus' ); ?>
                    	</a> 
                    	<?php  _e( 'and drag & drop it where you want to have it!', 'ultimate-social-media-plus' ); ?>
                    </label>
				</p>
			</div>
		</li>
        
        <!--Second Section-->
		<li class="">
            <div class="radio_section tb_4_ck cstmfltonpgstck" onclick="sfsiplus_toggleflotpage(this);">
                <input name="sfsi_plus_float_on_page" <?php echo ($option8['sfsi_plus_float_on_page']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_float_on_page" type="checkbox" value="yes" class="styled" />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Float them on the page', 'ultimate-social-media-plus' ); ?>
                    </span>
				</p>
                <?php
                if($option8['sfsi_plus_float_on_page'] == "yes")
				{
					$style = 'display: block;';
				}
				else
				{
					$style ="display: none;";
				}
				?>
                <div class="sfsiplus_tab_3_icns"  <?php echo 'style="'.$style.'"';?>>
					<ul class="sfsiplus_tab_3_icns flthmonpg">
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='top-left') ?  'checked="true"' : '' ;?> type="radio" value="top-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptntl">
                           		<?php  _e( 'Top left', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_left.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='top-right') ?  'checked="true"' : '' ;?> type="radio" value="top-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptntr">
                            	<?php  _e( 'Top right', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_right.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-left') ?  'checked="true"' : '' ;?> type="radio" value="center-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncl">
                            	<?php  _e( 'Center left', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_left.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-right') ?  'checked="true"' : '' ;?> type="radio" value="center-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncr">
                            	<?php  _e( 'Center right', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_right.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='bottom-left') ?  'checked="true"' : '' ;?> type="radio" value="bottom-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptnbl">
                            	<?php  _e( 'Bottom left', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_left.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='bottom-right') ?  'checked="true"' : '' ;?> type="radio" value="bottom-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptnbr">
                            	<?php  _e( 'Bottom right', 'ultimate-social-media-plus' ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_right.png" /></label>
                        </li>
                    </ul>
                    <div style="width: 88%; float: left; margin:25px 0 0 47px">
                    	<h4>
                       		<?php  _e( 'Margin From :', 'ultimate-social-media-plus' ); ?>
                        </h4>
                        <ul class="sfsi_plus_floaticon_margin_sec">
                            <li>
                                <label>
                                	<?php  _e( 'Top :', 'ultimate-social-media-plus' ); ?>
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_top" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_top']!='') ?  $option8['sfsi_plus_icons_floatMargin_top'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', 'ultimate-social-media-plus' ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                                	<?php  _e( 'Bottom :', 'ultimate-social-media-plus' ); ?>
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_bottom" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_bottom'] != '') ?  $option8['sfsi_plus_icons_floatMargin_bottom'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', 'ultimate-social-media-plus' ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                             		<?php  _e( 'Left :', 'ultimate-social-media-plus' ); ?>
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_left" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_left']!='') ?  $option8['sfsi_plus_icons_floatMargin_left'] : '' ;?>" />
                                <ins>
                              		<?php  _e( 'Pixels', 'ultimate-social-media-plus' ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                                	<?php  _e( 'Right :', 'ultimate-social-media-plus' ); ?>
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_right" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_right']!='') ?  $option8['sfsi_plus_icons_floatMargin_right'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', 'ultimate-social-media-plus' ); ?>
                                </ins>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
		</li>
        
        <!--Third Section-->
		<li class="sfsiplusplacethemanulywpr">
			<div class="radio_section tb_4_ck" onclick="checkforinfoslction(this);"><input name="sfsi_plus_place_item_manually" <?php echo ($option8['sfsi_plus_place_item_manually']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_place_item_manually" type="checkbox" value="yes" class="styled"  /></div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Place them manually', 'ultimate-social-media-plus' ); ?>
                    </span><br>
                    <?php
                    if($option8['sfsi_plus_place_item_manually']=='yes')
					{
						$label_style = 'style="display:block; font-size: 15px;"';
					}
					else
					{
						$label_style = 'style="font-size: 15px;"';
					}
					?>
					<label class="sfsiplus_sub-subtitle ckckslctn" <?php echo $label_style;?>>
                    	<?php  _e( 'Place', 'ultimate-social-media-plus' ); ?>
                    <label class="sfsi_ckckslctnlbl"><</label><label class="sfsi_ckckslctnlbl">?</label><label class="sfsi_ckckslctnlbl">
                    	php echo DISPLAY_ULTIMATE_PLUS();
                    	<?php  //_e( 'php echo DISPLAY_ULTIMATE_PLUS();', 'ultimate-social-media-plus' ); ?>
                    
                    </label><label class="sfsi_ckckslctnlbl">?</label><label class="sfsi_ckckslctnlbl">></label> 
                    	<?php  _e( 'in your theme codes or use the shortcode', 'ultimate-social-media-plus' ); ?>
                    	<b>
                    		[DISPLAY_ULTIMATE_PLUS]
							<?php  //_e( '[DISPLAY_ULTIMATE_PLUS]', 'ultimate-social-media-plus' ); ?>
                    	</b> 
                    	<?php  _e( 'to display them wherever you want.', 'ultimate-social-media-plus' ); ?>
                    </label>
				</p>
			</div>
		</li>
        
        <!--Fourth Section-->
		<li class="">
			<div class="radio_section tb_4_ck" onclick="sfsiplus_toggleflotpage(this);"><input name="sfsi_plus_show_item_onposts" <?php echo ($option8['sfsi_plus_show_item_onposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_show_item_onposts" type="checkbox" value="yes" class="styled"  /></div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show them before or after posts', 'ultimate-social-media-plus' ); ?>
                    </span>
                    <br>
                    <?php
					if($option8['sfsi_plus_show_item_onposts'] != "yes")
					{
						$style_float = "style='font-size: 15px; display: none;'";
					}
					else
					{
						$style_float = "style='font-size: 15px;'";
					}
					?>
                    <label class="sfsiplus_sub-subtitle sfsiplus_toglpstpgsbttl" <?php echo $style_float;?>>
                    	<?php  _e( 'Here you have two options:', 'ultimate-social-media-plus' ); ?>
                    </label>
				</p>
				
				<ul class="sfsiplus_tab_3_icns sfsiplus_shwthmbfraftr" <?php echo ($option8['sfsi_plus_show_item_onposts'] != "yes")? 'style="display: none";' : '' ;?>>
					<li onclick="sfsiplus_togglbtmsection('sfsiplus_toggleonlystndrshrng', 'sfsiplus_toggledsplyitemslctn', this);" class="clckbltglcls">
						<input name="sfsi_plus_display_button_type" <?php echo ( $option8['sfsi_plus_display_button_type']=='standard_buttons') ?  'checked="true"' : '' ;?> type="radio" value="standard_buttons" class="styled"  />
						<label class="labelhdng4">
                        	<?php  _e( 'Display rectangle icons', 'ultimate-social-media-plus' ); ?>
                        </label>
                    </li>
                    <li onclick="sfsiplus_togglbtmsection('sfsiplus_toggledsplyitemslctn', 'sfsiplus_toggleonlystndrshrng', this);" class="clckbltglcls">
						<input name="sfsi_plus_display_button_type" <?php echo ( $option8['sfsi_plus_display_button_type']=='normal_button') ?  'checked="true"' : '' ;?> type="radio" value="normal_button" class="styled"  />
						<label class="labelhdng4">
                        	<?php  _e( 'Display the icons I selected above', 'ultimate-social-media-plus' ); ?>
                        </label>
                    </li>
					<li class="sfsiplus_toggleonlystndrshrng">
                    	<?php if ($option8['sfsi_plus_display_button_type']=='standard_buttons'): $display = "display:block"; else:  $display = "display:none"; endif;?>
						<div class="radiodisplaysection" style="<?php echo $display; ?>">

                            <p class="cstmdisplaysharingtxt cstmdisextrpdng">
                            	<?php  _e( 'Rectangle icons spell out the', 'ultimate-social-media-plus' ); ?>
                            	<code>«</code>
                                <strong>
								<?php  _e( 'call to action', 'ultimate-social-media-plus' ); ?></strong>
                                <code>»</code> 
                            	<?php  _e( 'which increases chances that visitors do it.', 'ultimate-social-media-plus' ); ?>
                            </p>
							<p class="cstmdisplaysharingtxt">
                            	<?php  _e( 'Select the icons you want to show:', 'ultimate-social-media-plus' ); ?>
                            </p>
                            <div class="social_icon_like1 cstmdsplyulwpr">
                                <ul>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectsub" <?php echo ($option8['sfsi_plus_rectsub']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectsub" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Subscribe Follow" class="cstmdsplsub">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/follow_subscribe.png" alt="Subscribe Follow" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectfb" <?php echo ($option8['sfsi_plus_rectfb']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectfb" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Facebook Like" class="cstmdspllke">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/like.jpg" alt="Facebook Like" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectgp" <?php echo ($option8['sfsi_plus_rectgp']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectgp" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Google Plus" class="cstmdsplggpls">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/google_plus1.jpg" alt="Google Plus" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_recttwtr" <?php echo ($option8['sfsi_plus_recttwtr']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_recttwtr" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="twitter" class="cstmdspltwtr">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/twiiter.png" alt="Twitter like" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck">
                                        	<input name="sfsi_plus_rectshr" <?php echo ($option8['sfsi_plus_rectshr']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectshr" type="checkbox" value="yes" class="styled"  />
                                        </div>
                                        <a href="#" title="Share" class="cstmdsplshr">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/share1.jpg" alt="Share" />
                                            <span style="display: none;">18k</span>
                                        </a>
                                        <p style="width:auto;float:left;padding: 0px!important;border:0px !important;">
                                        	
                                            <?php  _e( '(may impact loading speed)', 'ultimate-social-media-plus' ); ?>
                                        </p>
                                    </li>
								</ul>	
                            </div>
						
                            <!--<p class="clear">Those are usually all you need: </p>
                            <ul class="usually" style="color:#5a6570">
                                <li>1. Facebook is No.1 in liking, so it’s a must have</li>
                                <li>2. Google+ is also important due to SEO reasons, so important to have as well</li>
                                <li>3. Share-button covers all other platforms for sharing</li>
                            </ul>-->
                            <div class="options">
                                <label>
                                	<?php  _e( 'Do you want to display the counts?', 'ultimate-social-media-plus' ); ?>
                                </label><div class="field">
                                <select name="sfsi_plus_icons_DisplayCounts" id="sfsi_plus_icons_DisplayCounts" class="styled"><option value="yes" <?php echo ($option8['sfsi_plus_icons_DisplayCounts']=='yes') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'YES', 'ultimate-social-media-plus' ); ?>
                                </option><option value="no" <?php echo ($option8['sfsi_plus_icons_DisplayCounts']=='no') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'NO', 'ultimate-social-media-plus' ); ?>
                                </option></select></div>
                            </div>
					  </div>
                    </li>
					
					<li class="sfsiplus_toggledsplyitemslctn">
                    	<?php if ($option8['sfsi_plus_display_button_type']=='normal_button'): $display = "display:block"; else:  $display = "display:none"; endif;?>
						<div class="row radiodisplaysection" style="<?php echo $display; ?>">
							<h4>
                            	<?php  _e( 'Size &amp; spacing of your icons', 'ultimate-social-media-plus' ); ?>
                            </h4>
							<div class="icons_size">
                            <span>
                            	<?php  _e( 'Size:', 'ultimate-social-media-plus' ); ?>
                            </span><input name="sfsi_plus_post_icons_size" value="<?php echo ($option8['sfsi_plus_post_icons_size']!='') ?  $option8['sfsi_plus_post_icons_size'] : '' ;?>" type="text" /><ins>
                           		<?php  _e( 'pixels wide &amp; tall', 'ultimate-social-media-plus' ); ?>
                            </ins> <span class="last">
                            	<?php  _e( 'Spacing between icons:', 'ultimate-social-media-plus' ); ?>
                            </span><input name="sfsi_plus_post_icons_spacing" type="text" value="<?php echo ($option8['sfsi_plus_post_icons_spacing']!='') ?  $option8['sfsi_plus_post_icons_spacing'] : '' ;?>" /><ins>
                            	<?php  _e( 'Pixels', 'ultimate-social-media-plus' ); ?>
                            </ins></div>
						</div>
                    </li>
                      
                  <li class="row sfsiplus_PostsSettings_section">
                    <!--<h4 class="labelhdng4">Options:</h4>-->
                    
                    <!--Display them options-->
                    <div class="options sfsipluspstvwpr">
                        <label class="first chcklbl">
                        	<?php  _e( 'Display them:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <label class="seconds chcklbl labelhdng4">
                        	<?php  _e( 'On Post Pages', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <div class="chckwpr">
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_before_posts" <?php echo ($option8['sfsi_plus_display_before_posts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_before_posts" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">
                                	<?php  _e( 'Before posts', 'ultimate-social-media-plus' ); ?>
                                </div>
                            </div>
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_after_posts" <?php echo ($option8['sfsi_plus_display_after_posts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_after_posts" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">
                                	<?php  _e( 'After posts', 'ultimate-social-media-plus' ); ?>
                                </div>
                            </div>
                            <!--<div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_on_postspage" <?php //echo ($option8['sfsi_plus_display_on_postspage']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_on_postspage" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">On posts pages</div>
                            </div>
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_on_homepage" <?php //echo ($option8['sfsi_plus_display_on_homepage']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_on_homepage" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">On homepage</div>
                            </div>-->
                        </div>
                    </div>
                    
                    
                    <div class="options sfsipluspstvwpr">
                        <label class="seconds chcklbl labelhdng4">
                        	<?php  _e( 'On Homepage', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <div class="chckwpr">
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_before_blogposts" <?php echo ($option8['sfsi_plus_display_before_blogposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_before_blogposts" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">
                                	<?php  _e( 'Before posts', 'ultimate-social-media-plus' ); ?>
                                </div>
                            </div>
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_after_blogposts" <?php echo ($option8['sfsi_plus_display_after_blogposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_after_blogposts" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">
                                	<?php  _e( 'After posts', 'ultimate-social-media-plus' ); ?>
                                </div>
                            </div>
                            <!--<div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_on_postspage" <?php //echo ($option8['sfsi_plus_display_on_postspage']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_on_postspage" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">On posts pages</div>
                            </div>
                            <div class="snglchckcntr">
                                <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_on_homepage" <?php //echo ($option8['sfsi_plus_display_on_homepage']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_on_homepage" type="checkbox" value="yes" class="styled"  /></div>
                                <div class="sfsiplus_right_info">On homepage</div>
                            </div>-->
                        </div>
                    </div>
                    
                    <!--Display them options-->
                    
                    
                    <div class="options shareicontextfld">
                        <label class="first">
                        	<?php  _e( 'Text to appear before the sharing icons:', 'ultimate-social-media-plus' ); ?>
                        </label><input name="sfsi_plus_textBefor_icons" type="text" value="<?php echo ($option8['sfsi_plus_textBefor_icons']!='') ?  $option8['sfsi_plus_textBefor_icons'] : '' ; ?>" />
                    </div>
                    <div class="options">
                        <label>
                         	<?php  _e( 'Alignment of share icons:', 'ultimate-social-media-plus' ); ?>
                        </label><div class="field">
                        <select name="sfsi_plus_icons_alignment" id="sfsi_plus_icons_alignment" class="styled">
                        	<option value="left" <?php echo ($option8['sfsi_plus_icons_alignment']=='left') ?  'selected="selected"' : '' ;?>>
                        		<?php  _e( 'Left', 'ultimate-social-media-plus' ); ?>
                        	</option>
                            <option value="right" <?php echo ($option8['sfsi_plus_icons_alignment']=='right') ?  'selected="selected"' : '' ;?>>
                        		<?php  _e( 'Right', 'ultimate-social-media-plus' ); ?>
                        	</option>
                            <option value="center" <?php echo ($option8['sfsi_plus_icons_alignment']=='center') ?  'selected="selected"' : '' ;?>>
                        		<?php  _e( 'Center', 'ultimate-social-media-plus' ); ?>
                        	</option>
                        </select></div>
                    </div>
                    <!--<div class="options">
                        <label>Do you want to display the counts?</label><div class="field"><select name="sfsi_plus_icons_DisplayCounts" id="sfsi_plus_icons_DisplayCounts" class="styled"><option value="yes" <?php //echo ($option8['sfsi_plus_icons_DisplayCounts']=='yes') ?  'selected="true"' : '' ;?>>YES</option><option value="no" <?php //echo ($option8['sfsi_plus_icons_DisplayCounts']=='no') ?  'selected="true"' : '' ;?>>NO</option></select></div>
                    </div>-->				
                  </li>	
					
				</ul>	
			</div>
		</li>
	</ul>
	
	
	<!-- SAVE BUTTON SECTION   --> 
	<div class="save_button">
       <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
       <?php  $nonce = wp_create_nonce("update_plus_step8"); ?>
        <a  href="javascript:;" id="sfsi_plus_save8" title="Save" data-nonce="<?php echo $nonce;?>">
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