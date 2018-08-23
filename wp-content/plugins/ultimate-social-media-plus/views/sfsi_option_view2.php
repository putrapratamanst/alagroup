<?php
  /* unserialize all saved option for second section options */
	$option4=  unserialize(get_option('sfsi_plus_section4_options',false));
    $option2=  unserialize(get_option('sfsi_plus_section2_options',false));
  
?>
<!-- Section 2 "What do you want the icons to do?" main div Start -->
<div class="tab2">
    <!-- RSS ICON -->
    <div class="row bdr_top sfsiplus_rss_section">
    	<h2 class="sfsicls_rs_s">
        	<?php  _e( 'RSS', 'ultimate-social-media-plus' ); ?> 
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users can subscribe via RSS', 'ultimate-social-media-plus' ); ?> 
            </p>
            <div class="rss_url_row">
                <h4>
               		<?php  _e( ' RSS URL', 'ultimate-social-media-plus' ); ?> 
                </h4>
                <input name="sfsi_plus_rss_url"  id="sfsi_plus_rss_url" class="add" type="url" value="<?php echo ($option2['sfsi_plus_rss_url']!='') ?  $option2['sfsi_plus_rss_url'] : '' ;?>" placeholder="E.g http://www.yoursite.com/feed" />
                <span class="sfrsTxt" >
                	<?php  _e( 'For most blogs it’s', 'ultimate-social-media-plus' ); ?>  
                 	<strong>
                 		<?php  _e( 'http://blogname.com/feed', 'ultimate-social-media-plus' ); ?> 
                 	</strong>
                </span>
            </div>
        </div>    
    </div>
    <!-- END RSS ICON -->
    
    <!-- EMAIL ICON -->
    <?php
		$feedId = get_option('sfsi_plus_feed_id',false);
		$connectToFeed = "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId);
	?>
    <div class="row sfsiplus_email_section">
        <h2 class="sfsicls_email">
        	<?php  _e( 'Email', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'Allows people to subscribe to your site on ', 'ultimate-social-media-plus' ); ?>
            	<a href="http://www.specificfeeds.com/widgets/emailSubscribeEncFeed/<?php echo $feedId; ?>/<?php echo base64_encode(8); ?>" target="_new">
            		<?php  _e( 'this screen', 'ultimate-social-media-plus' ); ?>
            	</a> 
            	
				<?php  _e( 'and receive new posts automatically. The service is 100% FREE, you get full access to the emails & interesting statistics (please', 'ultimate-social-media-plus' ); ?>
             
            	<a target="_new" href="<?php echo $connectToFeed; ?>">
            		<?php  _e( 'claim your feed', 'ultimate-social-media-plus' ); ?>
            	</a> 
            
            	<?php
					_e(
						'for that) and it also make sense if you already offer an email newsletter',
						'ultimate-social-media-plus'
					);
				?>
             	<a href="http://specificfeeds.com/rss" target="_new">
             		<?php  _e( '(learn more)', 'ultimate-social-media-plus' ); ?>
             	</a>.
            </p>
            
            <p><?php  _e( 'Please pick which icon type you want to use:', 'ultimate-social-media-plus' ); ?></p>
            
            <ul class="tab_2_email_sec">
                <li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='email') ?  'checked="true"' : '' ;?> type="radio" value="email" class="styled" /><span class="email_icn"></span>
					</div>
					<label>
                    	<?php  _e( 'Email-icon', 'ultimate-social-media-plus' ); ?>
                    </label>
                </li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='subscribe') ?  'checked="true"' : '' ;?> type="radio" value="subscribe" class="styled" /><span class="subscribe_icn"></span>
					</div>
					<label>
                    	<?php  _e( 'Follow icon', 'ultimate-social-media-plus' ); ?>
                    	<span class="sfplsdesc"> 
                    		<?php  _e( '(increases sign-ups)', 'ultimate-social-media-plus' ); ?>
                    	</span>
                    </label>
                </li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='sfsi') ?  'checked="true"' : '' ;?> type="radio" value="sfsi" class="styled"  /><span class="sf_arow"></span>
					</div>
					<label>
                    	<?php  _e( 'SpecificFeeds icon', 'ultimate-social-media-plus' ); ?>
                    	<span class="sfplsdesc"> 
                    		<?php  _e( '(provider of the service)', 'ultimate-social-media-plus' ); ?>
                    	</span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <!-- END EMAIL ICON -->
    
    <!-- FACEBOOK ICON -->
    <div class="row sfsiplus_facebook_section">
    	<h2 class="sfsicls_facebook">
        	<?php  _e( 'Facebook', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'The facebook icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do ', 'ultimate-social-media-plus' ); ?>
            
            	<a class="rit_link pop-up" href="javascript:;"  data-id="fbex-s2">
	                <?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
            	</a>.
            </p>
            <p>
            	<?php  _e( 'The facebook icon should allow users to...', 'ultimate-social-media-plus' ); ?>
            </p> 
            
            <p class="radio_section fb_url"><input name="sfsi_plus_facebookPage_option" <?php echo ($option2['sfsi_plus_facebookPage_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            
            <label>
            	<?php  _e( 'Visit my Facebook page at:', 'ultimate-social-media-plus' ); ?>
            </label>
            
            <input class="add" name="sfsi_plus_facebookPage_url" type="url" value="<?php echo ($option2['sfsi_plus_facebookPage_url']!='') ?  $option2['sfsi_plus_facebookPage_url'] : 'http://' ;?>" placeholder="E.g https://www.facebook.com/your_page_name" /></p>
            
            <p class="radio_section fb_url extra_sp">
            	<input name="sfsi_plus_facebookLike_option" <?php echo ($option2['sfsi_plus_facebookLike_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Like my blog on Facebook (+1)', 'ultimate-social-media-plus' ); ?>
            	</label>
            </p>
            
            <p class="radio_section fb_url extra_sp">
            	<input name="sfsi_plus_facebookShare_option" <?php echo ($option2['sfsi_plus_facebookShare_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                
                <label>
            		<?php  _e( 'Share my blog with friends (on Facebook)', 'ultimate-social-media-plus' ); ?>
            	</label>
            </p>
        </div>
    </div>
    <!-- END FACEBOOK ICON -->
    
    <!-- TWITTER ICON -->
    <div class="row sfsiplus_twitter_section">
    	<h2 class="sfsicls_twt">
        	<?php  _e( 'Twitter', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont twt_tab_2">
             <p>
              <?php
			  	_e( 'The Twitter icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', 'ultimate-social-media-plus' ); ?>
             	<a class="rit_link pop-up" href="javascript:;"  data-id="twex-s2">
             		<?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
             	</a>.
             </p> 
             <p>
             	<?php  _e( 'The Twitter icon should allow users to...', 'ultimate-social-media-plus' ); ?>
             </p> 
         	 <p class="radio_section fb_url">
             	<input name="sfsi_plus_twitter_page" <?php echo ($option2['sfsi_plus_twitter_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Visit me on Twitter:', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_twitter_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_plus_twitter_pageURL']!='') ?  $option2['sfsi_plus_twitter_pageURL'] : '' ;?>" class="add" />
             </p>
             
             <div class="radio_section fb_url twt_fld">
             	<input name="sfsi_plus_twitter_followme"  <?php echo ($option2['sfsi_plus_twitter_followme']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
             	
                <label>
              		<?php  _e( 'Follow me on Twitter:', 'ultimate-social-media-plus' ); ?>
             	</label>
                
                <input name="sfsi_plus_twitter_followUserName" type="text" value="<?php echo ($option2['sfsi_plus_twitter_followUserName']!='') ?  $option2['sfsi_plus_twitter_followUserName'] : '' ;?>" placeholder="my_twitter_name" class="add" />
             </div>
             <div class="radio_section fb_url twt_fld_2">
             	<input name="sfsi_plus_twitter_aboutPage" <?php echo ($option2['sfsi_plus_twitter_aboutPage']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
             	<label>
             		<?php  _e( 'Tweet about my page:', 'ultimate-social-media-plus' ); ?>
             	</label>
                <textarea name="sfsi_plus_twitter_aboutPageText" id="sfsi_plus_twitter_aboutPageText" type="text" class="add_txt" placeholder="Hey, check out this cool site I found: www.yourname.com #Topic via@my_twitter_name" /><?php echo ($option2['sfsi_plus_twitter_aboutPageText']!='') ?  $option2['sfsi_plus_twitter_aboutPageText'] : 'Hey check out this cool site I found' ;?></textarea>
             </div>
        </div>
    </div>
    <!-- END TWITTER ICON -->
    
    <!-- GOOGLE ICON -->
    <div class="row sfsiplus_google_section">
    	<h2 class="sfsicls_ggle_pls">Google+</h2>
        <div class="inr_cont google_in">
            <p>
            	<?php  _e( 'The Google+ icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', 'ultimate-social-media-plus' ); ?>
             
            	<a class="rit_link pop-up" href="javascript:;"  data-id="googlex-s2">
                	<?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
                </a>.</p>
            <p>
            	<?php  _e( 'The Google+ icon should allow users to...', 'ultimate-social-media-plus' ); ?>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_google_page" <?php echo ($option2['sfsi_plus_google_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
            		<?php  _e( 'Visit my Google+ page at:', 'ultimate-social-media-plus' ); ?>
            	</label>
            	
                <input name="sfsi_plus_google_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_plus_google_pageURL']!='') ?  $option2['sfsi_plus_google_pageURL'] : '' ;?>" class="add" />
            
            </p>
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_googleLike_option" <?php echo ($option2['sfsi_plus_googleLike_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Like my blog on Google+ (+1)', 'ultimate-social-media-plus' ); ?>
            	</label>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_googleShare_option" <?php echo ($option2['sfsi_plus_googleShare_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
            		<?php  _e( 'Share my blog with friends (on Google+)', 'ultimate-social-media-plus' ); ?>
            	</label>
            </p>
        </div>
    </div>
    <!-- END GOOGLE ICON -->
    
    <!-- YOUTUBE ICON -->
    <div class="row sfsiplus_youtube_section">
    	<h2 class="sfsicls_utube">
        	<?php  _e( 'Youtube', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont utube_inn">
            <p>
            	<?php  _e( 'The Youtube icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do ', 'ultimate-social-media-plus' ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="ytex-s2">
            		<?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
            	</a>.
            </p> 
            <p>
            	<?php  _e( 'The youtube icon should allow users to...', 'ultimate-social-media-plus' ); ?>
            </p> 
            <p class="radio_section fb_url"><input name="sfsi_plus_youtube_page" <?php echo ($option2['sfsi_plus_youtube_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Visit my Youtube page at:', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_youtube_pageUrl" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_plus_youtube_pageUrl']!='') ?  $option2['sfsi_plus_youtube_pageUrl'] : '' ;?>" class="add" />
            </p>
            <p class="radio_section fb_url"><input name="sfsi_plus_youtube_follow" <?php echo ($option2['sfsi_plus_youtube_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Subscribe to me on Youtube ', 'ultimate-social-media-plus' ); ?>
            		<span>
            			<?php  _e( '(allows people to subscribe to you directly, without leaving your blog)', 'ultimate-social-media-plus' ); ?>
            		</span>
                </label>
            </p>
        	<!--Adding Code for Channel Id and Channel Name-->
        	<?php
				if(!isset($option2['sfsi_plus_youtubeusernameorid']))
				{
					$sfsi_plus_youtubeusernameorid = '';
				}
				else
				{
					$sfsi_plus_youtubeusernameorid = $option2['sfsi_plus_youtubeusernameorid'];
				}
			?>
       	 
         <div class="cstmutbewpr">
            <ul class="enough_waffling">
               <li onclick="showhideutube(this);"><input name="sfsi_plus_youtubeusernameorid" <?php echo ($sfsi_plus_youtubeusernameorid=='name') ?  'checked="true"' : '' ;?> type="radio" value="name" class="styled"  />
               <label>
               		<?php  _e( 'User Name', 'ultimate-social-media-plus' ); ?>
               </label>
               </li>
               <li onclick="showhideutube(this);"><input name="sfsi_plus_youtubeusernameorid" <?php echo ($sfsi_plus_youtubeusernameorid=='id') ?  'checked="true"' : '' ;?> type="radio" value="id" class="styled"  />
               <label>
               		<?php  _e( 'Channel Id', 'ultimate-social-media-plus' ); ?>
               </label></li>
            </ul>
            <div class="cstmutbtxtwpr">
            	<div class="cstmutbchnlnmewpr" <?php if($sfsi_plus_youtubeusernameorid != 'id'){echo 'style="display: block;"';}?>>
                	<p class="extra_pp">
                    	<label><?php  _e( 'UserName:', 'ultimate-social-media-plus' ); ?></label>
                        <input name="sfsi_plus_ytube_user" type="url" value="<?php echo (isset($option4['sfsi_plus_ytube_user']) && $option2['sfsi_plus_ytube_user']!='') ?  $option2['sfsi_plus_ytube_user'] : '' ;?>" placeholder="Youtube username" class="add" />
                    </p>
                    <div class="utbe_instruction">
                    	<?php _e( 'To find your Username go to "My channel" in Youtube menu bar on the left & Select the "About" tab and take your user name from URL there (e.g. https://www.youtube.com/user/', 'ultimate-social-media-plus' ); ?>
                        <b>
                            <?php  _e( 'Myusername', 'ultimate-social-media-plus' ); ?>
                        </b>
                        <?php  _e( '/about).', 'ultimate-social-media-plus' ); ?>
                    </div>
                </div>
                <div class="cstmutbchnlidwpr" <?php if($sfsi_plus_youtubeusernameorid == 'id'){echo 'style="display: block"';}?>>
                	<p class="extra_pp">
                    	<label>
                       		<?php  _e( 'ChannelId:', 'ultimate-social-media-plus' ); ?>
                        </label>
                        <input name="sfsi_plus_ytube_chnlid" type="url" value="<?php echo (isset($option2['sfsi_plus_ytube_chnlid']) && $option2['sfsi_plus_ytube_chnlid']!='') ?  $option2['sfsi_plus_ytube_chnlid'] : '' ;?>" placeholder="youtube_channel_id" class="add" />
                    </p>
                    <div class="utbe_instruction">
                    	<?php  _e( 'To find your Channel name go to "My Channel" in Youtube menu bar on the left and take your channel name from there.', 'ultimate-social-media-plus' ); ?>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
    <!-- END YOUTUBE ICON -->
    
    <!-- PINTEREST ICON -->
    <div class="row sfsiplus_pinterest_section">
    	<h2 class="sfsicls_pinterest">Pinterest</h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'The Pinterest icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do   ', 'ultimate-social-media-plus' ); ?>
            	
                <a class="rit_link pop-up" href="javascript:;"  data-id="pinex-s2">
            		<?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
            	</a>.
            </p> 
            <p>
            	<?php  _e( 'The Pinterest icon should allow users to... ', 'ultimate-social-media-plus' ); ?>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_pinterest_page" <?php echo ($option2['sfsi_plus_pinterest_page']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                <label>
            		<?php  _e( 'Visit my Pinterest page at:', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_pinterest_pageUrl" type="url" placeholder="http://"  value="<?php echo ($option2['sfsi_plus_pinterest_pageUrl']!='') ?  $option2['sfsi_plus_pinterest_pageUrl'] : '' ;?>" class="add" />
            </p>
            <div class="pint_url">
            	<p class="radio_section fb_url">
                	<input name="sfsi_plus_pinterest_pingBlog" <?php echo ($option2['sfsi_plus_pinterest_pingBlog']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            		<label>
           				<?php  _e( 'Pin my blog on Pinterest (+1)', 'ultimate-social-media-plus' ); ?>
            		</label>
            	</p>
            </div>
        </div>
    </div>
    <!-- END PINTEREST ICON -->
    
    <!-- INSTAGRAM ICON -->
    <div class="row sfsiplus_instagram_section">
    	<h2 class="sfsicls_instagram">
        	<?php  _e( 'Instagram', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Instagram page.', 'ultimate-social-media-plus' ); ?>
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            		<?php  _e( 'URL', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_instagram_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_instagram_pageUrl']) && $option2['sfsi_plus_instagram_pageUrl']!='') ?  $option2['sfsi_plus_instagram_pageUrl'] : '' ;?>" placeholder="http://" class="add"  />
            </p>
        </div>
    </div>
    <!-- END INSTAGRAM ICON -->
    
    <!-- LINKEDIN ICON -->
    <div class="row sfsiplus_linkedin_section">
    	<h2 class="sfsicls_linkdin">
        	<?php  _e( 'LinkedIn', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont linked_tab_2 link_in">
            <p>
              	<?php  _e( 'The LinkedIn icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', 'ultimate-social-media-plus' ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="linkex-s2">
	            	<?php  _e( '(see an example)', 'ultimate-social-media-plus' ); ?>
            	</a>.
            </p> 
            <p>
            	<?php  _e( 'You find your ID in the link of your profile page, e.g. https://www.linkedin.com/profile/view?id=', 'ultimate-social-media-plus' ); ?>
            <b>
            	<?php  _e( '8539887', 'ultimate-social-media-plus' ); ?>
            </b>
            	&trk=nav_responsive_tab_profile_pic
            </p>
            <p>
            	 <?php  _e( 'The LinkedIn icon should allow users to... ', 'ultimate-social-media-plus' ); ?>
            </p> 
            <div class="radio_section fb_url link_1">
            	<input name="sfsi_plus_linkedin_page" <?php echo ($option2['sfsi_plus_linkedin_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
              		<?php _e( 'Visit my Linkedin page at:', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_linkedin_pageURL" type="text" placeholder="http://" value="<?php echo ($option2['sfsi_plus_linkedin_pageURL']!='') ?  $option2['sfsi_plus_linkedin_pageURL'] : '' ;?>" class="add" />
            </div>
            
            <div class="radio_section fb_url link_2">
            	<input name="sfsi_plus_linkedin_follow" <?php echo ($option2['sfsi_plus_linkedin_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
           			<?php  _e( ' Follow me on Linkedin:', 'ultimate-social-media-plus' ); ?> 
            	</label>
                
                <input name="sfsi_plus_linkedin_followCompany" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_followCompany']!='') ?  $option2['sfsi_plus_linkedin_followCompany'] : '' ;?>" class="add" placeholder="Enter company ID, e.g. 123456" />
            </div>
            
            <div class="radio_section fb_url link_3">
            	<input name="sfsi_plus_linkedin_SharePage" <?php echo ($option2['sfsi_plus_linkedin_SharePage']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Share my page on LinkedIn', 'ultimate-social-media-plus' ); ?>
            	</label>
            </div>
            
            <div class="radio_section fb_url link_4">
            	<input name="sfsi_plus_linkedin_recommendBusines" <?php echo ($option2['sfsi_plus_linkedin_recommendBusines']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
                <label class="anthr_labl">
            		<?php  _e( 'Recommend my business or product on Linkedin', 'ultimate-social-media-plus' ); ?>
            	</label>
                <input name="sfsi_plus_linkedin_recommendProductId" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_recommendProductId']!='') ?  $option2['sfsi_plus_linkedin_recommendProductId'] : '' ;?>" class="add link_dbl" placeholder="Enter Product ID, e.g. 1441" /> <input name="sfsi_plus_linkedin_recommendCompany" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_recommendCompany']!='') ?  $option2['sfsi_plus_linkedin_recommendCompany'] : '' ;?>" class="add" placeholder="Enter company name, e.g. Google”" />
            </div>
            <div class="lnkdin_instruction">
                <?php  _e( 'To find your Product or Company ID, you can use their ID lookup tool at ', 'ultimate-social-media-plus' ); ?>
                <a target="_blank" href="https://developer.linkedin.com/apply-getting-started#company-lookup">
                	<?php
						_e(
							'https://developer.linkedin.com/apply-getting-started#company-lookup',
							'ultimate-social-media-plus'
						);
					?>
                </a>
                <?php  _e( '. You need to be logged in to Linkedin to be able to use it.', 'ultimate-social-media-plus' ); ?>
            </div>
        </div>
    </div>
    <!-- END LINKEDIN ICON -->
    
    <!-- share button -->
    <div class="row sfsiplus_share_section">
   		<h2 class="sfsicls_share">
        	<?php  _e( 'Share', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont">
        	<p>
            	<?php  _e( 'Nothing needs to be done here – your visitors to share your site via «all the other» social media sites.  ', 'ultimate-social-media-plus' ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="share-s2">
            		<?php  _e( '(see an example).', 'ultimate-social-media-plus' ); ?>
            	</a>
            </p> 
        </div>
    </div>
    <!-- share end -->
    
    <!-- HOUZZ ICON -->
    <div class="row sfsiplus_houzz_section">
    	<h2 class="sfsicls_houzz">
        	<?php  _e( 'Houzz', 'ultimate-social-media-plus' ); ?>
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'Please provide the url to your Houzz profile (e.g. http://http://www.houzz.com/user/your_username).', 'ultimate-social-media-plus' ); ?>
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    <?php  _e( 'URL', 'ultimate-social-media-plus' ); ?>
                </label>
                <input name="sfsi_plus_houzz_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_houzz_pageUrl']) && $option2['sfsi_plus_houzz_pageUrl']!='') ?  $option2['sfsi_plus_houzz_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- HOUZZ INSTAGRAM ICON -->
    
    <!-- Custom icon section start here -->
    <div class="plus_custom-links sfsiplus_custom_section">
	<?php 
	  	$costom_links=  unserialize($option2['sfsi_plus_CustomIcon_links']);
	  	$count=1;
		for($i=$first_key;$i<=$endkey;$i++) : ?> 
        <?php if(!empty( $icons[$i])) : ?>
           <div class="row  sfsiICON_<?php echo $i; ?> cm_lnk">
               	<h2 class="custom">
               		<span class="customstep2-img">
                    	<img src="<?php echo (!empty($icons[$i])) ?  $icons[$i] : SFSI_PLUS_PLUGURL.'images/custom.png';?>" id="CImg_<?php echo $new_element; ?>" style="border-radius:48%"  />
                    </span>
                    <span class="sfsiCtxt">
               			<?php  _e( 'Custom', 'ultimate-social-media-plus' ); ?>
			   			<?php echo $count; ?>
                    </span>
                </h2>
               	<div class="inr_cont ">
                   	<p>
                	   <?php  _e( 'Where do you want this icon to link to?', 'ultimate-social-media-plus' ); ?>
                   	</p> 
                   	<p class="radio_section fb_url sfsiplus_custom_section cus_link " >
                   		<label>
                   			<?php  _e( 'Link :', 'ultimate-social-media-plus' ); ?>
                   		</label>
                        <input name="sfsi_plus_CustomIcon_links[]" type="text" value="<?php echo (isset($costom_links[$i]) && $costom_links[$i]!='') ?  $costom_links[$i] : '' ;?>" placeholder="http://" class="add" file-id="<?php echo $i; ?>" />
                    </p>
        		</div>
           </div>
	 	<?php $count++; endif; endfor; ?>
    </div> 
    <!-- END Custom icon section here -->
    <!-- SAVE BUTTON SECTION   --> 
    <div class="save_button tab_2_sav">
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
        
		<?php  $nonce = wp_create_nonce("update_plus_step2"); ?>
        
        <a href="javascript:;" id="sfsi_plus_save2" title="Save" data-nonce="<?php echo $nonce;?>">
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

</div>
<!-- END Section 2 "What do you want the icons to do?" main div -->