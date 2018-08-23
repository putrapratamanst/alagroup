<?php
/* unserialize all saved option for  section 7 options */
    $option7=  unserialize(get_option('sfsi_plus_section7_options',false));
   
?>
<!-- Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->
<div class="tab7">
	<p>
    	<?php  _e( 
					'You can increase chances that people share or follow you by dislaying a pop-up asking them to. You can define the design and layout below:', 
					'ultimate-social-media-plus' 
				); ?>
    </p>
<!-- icons preview section -->
<div class="like_pop_box">
	<div class="sfsi_plus_Popinner">
	<h2>
		<?php  _e( 'Enjoy this site? Please follow and like us!', 'ultimate-social-media-plus' ); ?>
	</h2>
	<ul class="like_icon plus_sfsi_sample_icons">
    	 <li class="sfsiplus_rss_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/rss.png" alt="RSS" /><span class="sfsi_Cdisplay" id="sfsi_plus_rss_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_email_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/<?php echo $email_image; ?>" alt="Email" class="icon_img" /><span class="sfsi_Cdisplay" id="sfsi_plus_email_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_facebook_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/facebook.png" alt="Facebook" /><span class="sfsi_Cdisplay" id="sfsi_plus_facebook_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_google_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/google_plus.png" alt="Google Plus" /><span class="sfsi_Cdisplay" id="sfsi_plus_google_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_twitter_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/twitter.png" alt="Twitter" /><span class="sfsi_Cdisplay" id="sfsi_plus_twitter_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_share_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/share.png" alt="Share" /><span class="sfsi_Cdisplay" id="sfsi_plus_shares_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_youtube_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/youtube.png" alt="YouTube" /><span class="sfsi_Cdisplay" id="sfsi_plus_youtube_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_pinterest_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/pinterest.png" alt="Pinterest" /><span class="sfsi_Cdisplay" id="sfsi_plus_pinterest_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_linkedin_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/linked_in.png" alt="Linked In" /><span class="sfsi_Cdisplay" id="sfsi_plus_linkedIn_countsDisplay">12k</span></div></li>
		<li class="sfsiplus_instagram_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/instagram.png" alt="Instagram" /><span class="sfsi_Cdisplay" id="sfsi_plus_instagram_countsDisplay">12k</span></div></li>
        <li class="sfsiplus_houzz_section"><div><img src="<?php echo SFSI_PLUS_PLUGURL ?>images/houzz.png" alt="Houzz" /><span class="sfsi_Cdisplay" id="sfsi_plus_houzz_countsDisplay">12k</span></div></li>
	<?php
		if(isset($icons) && !empty($icons))
		{
			if(is_array($icons))
			{
				foreach($icons as $icn =>$img)
				{
					echo '<li class="sfsiplus_custom_section sfsiICON_'.$icn.'"  element-id="'.$icn.'" ><div><img src="'.$img.'" alt="Custom Icon" class="sfcm" /><span class="sfsi_Cdisplay">12k</span></div></li>';
				}
			}
		}
		?>
	</ul>  
</div>
</div><!-- END icons preview section -->

<!-- icons controllers section -->
<div class="space">
	<h4><?php  _e( 'Text &amp; Design', 'ultimate-social-media-plus' ); ?></h4>
	<div class="text_options">
		<h3><?php  _e( 'Text Options', 'ultimate-social-media-plus' ); ?></h3>
		<div class="sfsiplus_row_tab">
                    <label><?php  _e( 'Text:', 'ultimate-social-media-plus' ); ?></label>
                    <input class="mkPop" name="sfsi_plus_popup_text" type="text" value="<?php echo ($option7['sfsi_plus_popup_text']!='') ?  $option7['sfsi_plus_popup_text'] : '' ;?>" />
		</div>
		<div class="sfsiplus_row_tab">
			<label><?php  _e( 'Font:', 'ultimate-social-media-plus' ); ?></label>
                        <div class="field">
                            <select name="sfsi_plus_popup_font" id="sfsi_plus_popup_font" class="styled">
                                <option value="Arial, Helvetica, sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Arial, Arial, Helvetica, sans-serif') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Arial', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Arial Black, Gadget, sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Arial Black, Gadget, sans-serif') ?  'selected="true"' : '' ;?>>
                               
                                 <?php  _e( 'Arial Black', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Calibri" <?php echo ($option7['sfsi_plus_popup_font']=='Calibri') ?  'selected="true"' : '' ;?>>
                                
                                 <?php  _e( 'Calibri', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Comic Sans MS" <?php echo ($option7['sfsi_plus_popup_font']=='Comic Sans MS') ?  'selected="true"' : '' ;?>>
                               
                                 <?php  _e( 'Comic Sans MS', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Courier New" <?php echo ($option7['sfsi_plus_popup_font']=='Courier New') ?  'selected="true"' : '' ;?>>
                                
                                 <?php  _e( 'Courier New', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Georgia" <?php echo ($option7['sfsi_plus_popup_font']=='Georgia') ?  'selected="true"' : '' ;?>>
                                
                                 <?php  _e( 'Georgia', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Helvetica,Arial,sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Helvetica,Arial,sans-serif') ?  'selected="true"' : '' ;?>>
                                
                                 <?php  _e( 'Helvetica', 'ultimate-social-media-plus' ); ?>
                                </option>
								<option value="Impact" <?php echo ($option7['sfsi_plus_popup_font']=='Impact') ?  'selected="true"' : '' ;?>>
                					<?php  _e( 'Impact', 'ultimate-social-media-plus' ); ?>
                				</option>
                                <option value="Lucida Console" <?php echo ($option7['sfsi_plus_popup_font']=='Lucida Console') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Lucida Console', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Tahoma,Geneva" <?php echo ($option7['sfsi_plus_popup_font']=='Tahoma,Geneva') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Tahoma', 'ultimate-social-media-plus' ); ?>
                                </option>
                         		<option value="Times New Roman" <?php echo ($option7['sfsi_plus_popup_font']=='Times New Roman') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Times New Roman', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Trebuchet MS" <?php echo ($option7['sfsi_plus_popup_font']=='Trebuchet MS') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Trebuchet MS', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="Verdana" <?php echo ($option7['sfsi_plus_popup_font']=='Verdana') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Verdana', 'ultimate-social-media-plus' ); ?>
                                </option>
                            
                            </select>
                        </div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
				<?php  _e( 'Font style:', 'ultimate-social-media-plus' ); ?>
            </label>
			<div class="field">
                            <select name="sfsi_plus_popup_fontStyle" id="sfsi_plus_popup_fontStyle" class="styled">
                                <option value="normal" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='normal') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Normal', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="inherit" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='inherit') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Inherit', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="oblique" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='oblique') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Oblique', 'ultimate-social-media-plus' ); ?>
                                </option>
                                <option value="italic" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='italic') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'Italic', 'ultimate-social-media-plus' ); ?>
                                </option>
                            </select>
                        </div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Font color:', 'ultimate-social-media-plus' ); ?>
            </label>
            <input name="sfsi_plus_popup_fontColor" id="sfsi_plus_popup_fontColor" type="text" value="<?php echo ($option7['sfsi_plus_popup_fontColor']!='') ?  $option7['sfsi_plus_popup_fontColor'] : '' ;?>" class="small mkPop" /><div class="color_box">
			<div class="corner"></div>
            <div class="color_box1" id="sfsifontCloroPicker" style="background: <?php echo ($option7['sfsi_plus_popup_fontColor']!='') ?  $option7['sfsi_plus_popup_fontColor'] : '#ffffff' ; ?>"></div>
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Font size:', 'ultimate-social-media-plus' ); ?>
            </label>
            <input name="sfsi_plus_popup_fontSize" type="text" value="<?php echo ($option7['sfsi_plus_popup_fontSize']!='') ?  $option7['sfsi_plus_popup_fontSize'] : '' ;?>" class="small" />
		</div>
	</div>
	<div class="text_options layout">
		<h3>
        	<?php  _e( 'Icon Box Layout', 'ultimate-social-media-plus' ); ?>
        </h3>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Backgroud', 'ultimate-social-media-plus' ); ?><br />
				<?php  _e( 'Color:', 'ultimate-social-media-plus' ); ?>
            </label>
            <input name="sfsi_plus_popup_background_color" id="sfsi_plus_popup_background_color" type="text" value="<?php echo ($option7['sfsi_plus_popup_background_color']!='') ?  $option7['sfsi_plus_popup_background_color'] : '' ;?>" class="small" />
			<div class="color_box">
			  <div class="corner"></div>			  
                          <div class="color_box1" id="sfsiBackgroundColorPicker" style="background: <?php echo ($option7['sfsi_plus_popup_background_color']!='') ?  $option7['sfsi_plus_popup_background_color'] : '#ffffff' ; ?>"></div>
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label class="border">
           		<?php  _e( 'Border Color:', 'ultimate-social-media-plus' ); ?>
            </label>
			<div class="field"><input name="sfsi_plus_popup_border_color" id="sfsi_plus_popup_border_color" type="text" value="<?php echo ($option7['sfsi_plus_popup_border_color']!='') ?  $option7['sfsi_plus_popup_border_color'] : '' ;?>" class="small" />
			<div class="color_box">
			  <div class="corner"></div>
                          <div class="color_box1" id="sfsiBorderColorPicker" style="background: <?php echo ($option7['sfsi_plus_popup_border_color']!='') ?  $option7['sfsi_plus_popup_border_color'] : '#ffffff' ; ?>"></div>
			</div></div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Border', 'ultimate-social-media-plus' ); ?><br />
				<?php  _e( 'Thinckness:', 'ultimate-social-media-plus' ); ?>
            </label>
			<div class="field"><input name="sfsi_plus_popup_border_thickness" type="text" value="<?php echo ($option7['sfsi_plus_popup_border_thickness']!='') ?  $option7['sfsi_plus_popup_border_thickness'] : '' ;?>" class="small" />
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
             	<?php  _e( 'Border', 'ultimate-social-media-plus' ); ?><br />
				<?php  _e( 'Shadow:', 'ultimate-social-media-plus' ); ?>
            </label>
			<ul class="border_shadow">
  	<li><input name="sfsi_plus_popup_border_shadow" <?php echo ($option7['sfsi_plus_popup_border_shadow']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
    <label> 
    	<?php  _e( 'On', 'ultimate-social-media-plus' ); ?>
    </label></li>
    <li><input name="sfsi_plus_popup_border_shadow" <?php echo ($option7['sfsi_plus_popup_border_shadow']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" />
    <label>
    	<?php  _e( 'Off', 'ultimate-social-media-plus' ); ?>
    </label></li>
  </ul>
		</div>
		
	</div>
</div>
<div class="row">
	<h4>
    	<?php  _e( 'Where shall the pop-up be shown?', 'ultimate-social-media-plus' ); ?>
    </h4>
        <div class="pop_up_show"><input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='none') ?  'checked="true"' : '' ;?> type="radio" value="none" class="styled" />
        <label>
        	<?php  _e( 'Nowhere', 'ultimate-social-media-plus' ); ?>
        </label>
        </div>
	<div class="pop_up_show"><input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='everypage') ?  'checked="true"' : '' ;?> type="radio" value="everypage" class="styled" />
    <label>
    	<?php  _e( 'On every page', 'ultimate-social-media-plus' ); ?>
    </label></div>
	<div class="pop_up_show"><input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='blogpage') ?  'checked="true"' : '' ;?> type="radio" value="blogpage" class="styled"/>
    <label>
    	<?php  _e( 'On blog posts only', 'ultimate-social-media-plus' ); ?>
    </label></div>
	<div class="pop_up_show"><input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='selectedpage') ?  'checked="true"' : '' ;?>  type="radio" value="selectedpage" class="styled"/>
    <label>
   		<?php  _e( 'On selected pages only', 'ultimate-social-media-plus' ); ?>
    </label>
            <div class="field" style="width:50%"><select multiple="multiple" name="sfsi_plus_Show_popupOn_PageIDs" id="sfsi_plus_Show_popupOn_PageIDs" style="width:60%;min-height: 150px;"  >
             <?php $select=  (isset($option7['sfsi_plus_Show_popupOn_PageIDs'])) ? unserialize($option7['sfsi_plus_Show_popupOn_PageIDs']) :array();
			 $get_pages = get_pages( array( 
            'offset'=> 1,
            'hierarchical'=>1,     
            'sort_order' => 'DESC', 
            'sort_column' => 'post_date', 
            'posts_per_page' => 200, 
            'post_status' => 'publish' 
        )); //print_r($get_pages);
        if( $get_pages )
        {
            
            foreach( $get_pages as $page )
            {
                /*printf(
                    '<option value="%s"  %s style="margin-bottom:3px;">%s</option>',
                    $page->ID,
                    in_array( $page->ID, $select) ? 'selected="selected" class="sel-active"' : '',
                    $page->post_title
                );*/
				if(!empty($select))
				{
					if( in_array( $page->ID, $select) )
					{
						$selected_box = 'selected="selected"';
						$class = 'class="sel-active"';
					}
					else
					{
						$selected_box = '';
						$class = '';
					}
				}
				else
				{
					$selected_box = '';
					$class = '';
				}
				echo '<option value="'.$page->ID.'" style="margin-bottom: 3px;" '.$selected_box.' '.$class.'>'.$page->post_title.'</option>';
            }
           
        } ?>   
                
            </select><br/>
            <?php  _e( 'Please hold CTRL key to select multiple pages.', 'ultimate-social-media-plus' ); ?>
        </div>
        </div>
</div>
<div class="row">
	<h4>
    	<?php  _e( 'When shall the pop-up be shown?', 'ultimate-social-media-plus' ); ?>
    </h4>
	<div class="pop_up_show"><input name="sfsi_plus_Shown_pop" <?php echo ($option7['sfsi_plus_Shown_pop']=='once') ?  'checked="true"' : '' ;?> type="radio" value="once" class="styled" />
    <label>
    	<?php  _e( 'Once', 'ultimate-social-media-plus' ); ?> 
    	<input name="sfsi_plus_Shown_popupOnceTime" type="text" value="<?php echo ($option7['sfsi_plus_Shown_popupOnceTime']!='') ?  $option7['sfsi_plus_Shown_popupOnceTime'] : '' ;?>" class="seconds" /> 
    		<?php  _e( 'seconds after the user arrived on the site', 'ultimate-social-media-plus' ); ?>
    </label></div>
	<div class="pop_up_show"><input name="sfsi_plus_Shown_pop" <?php echo ($option7['sfsi_plus_Shown_pop']=='ETscroll') ?  'checked="true"' : '' ;?> type="radio" value="ETscroll" class="styled"/>
    <label>
   		<?php  _e( 'Every time user scrolls to the end of the page', 'ultimate-social-media-plus' ); ?>
    </label>
    </div>
        <!--<div class="pop_up_show"><input name="sfsi_plus_Shown_pop" <?php //echo ($option7['sfsi_plus_Shown_pop']=='LimitPopUp') ?  'checked="true"' : '' ;?> type="radio" value="LimitPopUp" class="styled"/><label>Limit popup impression per user to once per</label><div class="field" style="margin-top: -3px;">
                <select name="sfsi_plus_Shown_popuplimitPerUserTime" id="sfsi_plus_Shown_popuplimitPerUserTime" class="styled">
                     <option value="5"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==5) ?  'selected="selected"' : '' ;?>>5 min</option>
                     <option value="10"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==10) ?  'selected="selected"' : '' ;?>>10 min</option>
                     <option value="30"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==30) ?  'selected="selected"' : '' ;?>>30 min</option>
                     <option value="60"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==$i) ?  'selected="selected"' : '' ;?>>1 hour</option>
                     <option value="1440"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==$i) ?  'selected="selected"' : '' ;?>>1 Day</option>
                     <option value="10080"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==$i) ?  'selected="selected"' : '' ;?>>1 Week</option>
                     <option value="43200"  <?php //echo ($option7['sfsi_plus_Shown_popuplimitPerUserTime']==$i) ?  'selected="selected"' : '' ;?>>1 Month</option>              
                  </select></div></div>-->
</div>
     <!-- SAVE BUTTON SECTION   --> 
	<div class="save_button">
	     <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
         <?php  $nonce = wp_create_nonce("update_plus_step7"); ?>
	    <a href="javascript:;" id="sfsi_plus_save7" title="Save" data-nonce="<?php echo $nonce;?>">
        	<?php  _e( 'Save', 'ultimate-social-media-plus' ); ?>
        </a>
	</div><!-- END SAVE BUTTON SECTION   -->
	<a class="sfsiColbtn closeSec" href="javascript:;" class="closeSec">
    	<?php  _e( 'Collapse area', 'ultimate-social-media-plus' ); ?>
    </a>
	<label class="closeSec"></label>
	 <!-- ERROR AND SUCCESS MESSAGE AREA-->
	<p class="red_txt errorMsg" style="display:none"> </p>
	<p class="green_txt sucMsg" style="display:none"> </p>
	<div class="clear"></div>

</div><!-- END Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->