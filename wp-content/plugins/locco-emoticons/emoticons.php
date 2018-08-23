<?php
/*
Plugin Name: Locco Emoticons
Plugin URI: http://wordpress.org/plugins/locco-emoticons/
Description: Plugin creat pentru toti membrii blogosferei.
Version: 1.2
Author: Andrei Sebastian
Author URI: http://locco.ro

Copyright 2014

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once( "emoticons-list.php" );
register_activation_hook( __FILE__, array('loccoEmoticons', 'activate'));
register_deactivation_hook( __FILE__, array('loccoEmoticons', 'deactivate'));
add_filter('the_content',array('loccoEmoticons','replace'));
add_filter('comment_text',array('loccoEmoticons','replace'));
add_action('comment_form', array('loccoEmoticons', 'scut'));
add_action('wp_head', array('loccoEmoticons', 'script'));
add_action('admin_menu', array('loccoEmoticons','menu'));
add_filter( 'plugin_action_links', array('loccoEmoticons', 'link'), 10, 2 );
//add_action('media_buttons', array('loccoEmoticons', 'add_button'), 30);

if(!class_exists('loccoEmoticons')){
	class loccoEmoticons {
		function activate(){
			$data = array(
				'backlink'=> 1
			);
	    	if (!get_option('Locco_Ro_emoticons')){
	      		add_option('Locco_Ro_emoticons', $data);
	    	} else {
	      		update_option('Locco_Ro_emoticons', $data);
	    	}
		}
		
		function deactivate(){
			//delete_option('Locco_Ro_emoticons');
		}

		function link( $links, $file ){
			static $this_plugin;
			if ( ! $this_plugin ) $this_plugin = plugin_basename(__FILE__);
			
			if ( $file == $this_plugin ){
				$settings_link = '<a href="options-general.php?page=loccoEmoticons">' . __('Settings') . '</a>';
				array_unshift( $links, $settings_link ); // before other links
			}
			return $links;
		}
		
		function menu(){
			add_options_page('Locco Emoticons', 'Locco Emoticons', 8, 'loccoEmoticons', array('loccoEmoticons','control'));
		}

		function control() {
			//die(print_r($_POST,true));
			global $KEEUrl,$KEReplace2;
			$options = $newoptions = get_option('Locco_Ro_emoticons');
			//die(print_r($options,true));
			if($_POST["Locco_Ro_emoticons_action"]) {
				//print_r($_POST);
				$kes = null;
				if(isset($_POST['Locco_Ro_emoticons_stat']) && count($_POST['Locco_Ro_emoticons_stat'])>0){
					foreach($_POST['Locco_Ro_emoticons_stat'] as $k=>$v){
						$kes[$k]='';
					}
				}
				$newoptions['stat'] = $kes;
				$newoptions['backlink'] 	= strip_tags(stripslashes($_POST["Locco_Ro_emoticons_backlink"]));
				if(trim($newoptions['backlink'])=="") $newoptions['backlink'] = 1;
			}
			if ($options != $newoptions) {
				$options = $newoptions;
				//print_r($options);
				update_option('Locco_Ro_emoticons', $options);
			}
			
			$backlink = htmlspecialchars($options['backlink'], ENT_QUOTES);
			$check = plugin_dir_url( __FILE__ ) . "checkbox";
			$check0 = $check."0.gif";
			$check1 = $check."1.gif";
?>
			<style type="text/css">
			.codelist{
				border-collapse: collapse;
			}
			.codelist td{
				border: 1px solid #eee;
				vertical-align: middle;
				padding: 2px;
			}
			
			.code-row{
				background: none;
				cursor: pointer;
			}

			.code-row-checked{
				background: #dfdfdf;
			}

			.code-row-hover{
				background: white;
			}
			
			.code-check0{
				background:url("<?php echo $check0;?>") no-repeat scroll center center transparent;
			}

			.code-check1{
				background:url("<?php echo $check1;?>") no-repeat scroll center center transparent;
			}
			</style>
			<img src="<?php echo $check0;?>" style="display:none">
			<img src="<?php echo $check1;?>" style="display:none">
			<h2>Emoticoane pentru wordpress</h2>
			Daca folosesti acest plugin nu uita sa-i dai o bere autorului <a href="http://www.Locco.ro" target="_blank">Andrei Sebastian</a><br />
			Sunt prezent si pe twitter - <a href="http://twitter.com/LoccoChicco" target="_blank">twitter.com/LoccoChicco</a> <br /><br />
			<form method="post" action="options-general.php?page=loccoEmoticons">
			<table>
			<tr>
			<td><?php _e('Pentru backlink ! Poti sa-l dezactivezi dar daca il activezi, Multam fain!'); ?></td>
			<td>
				<select name="Locco_Ro_emoticons_backlink">
					<option value="1"<?php echo($backlink=="1"?" selected":"")?>>Activeaza</option>
					<option value="0"<?php echo($backlink=="1"?"":" selected")?>>Dezactiveaza</option>
				</select>
			</td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="codelist" align="center" cellpadding="0" cellspacing="0" border="0">
					<tr style="background:#ccc;">
						<td align="center"><strong>Dezactiveaza</strong></td>
						<td align="center"><strong>Imagine</strong></td>
						<td align="center"><strong>Codul folosit</strong></td>
					</tr>
					<?php 
					foreach($KEReplace2 as $k=>$v):
						$xstat = isset($options['stat']) && isset($options['stat'][$k]);
					?>
					<tr class="code-row<?php echo ($xstat?" code-row-checked":"");?>">
						<td align="center" class="code-check<?php echo ($xstat?1:0);?>"><input <?php echo ($xstat ? "checked=\"checked\"":"");?> name="Locco_Ro_emoticons_stat[<?php echo $k;?>]" type="checkbox" style="display:none"></td>
						<td align="center"><?php echo $v;?></td>
						<td><?php echo $k;?></td>
					</tr>
					<?php endforeach;?>
					</table>
				</td>
			</tr>
			</table>
			<input type="hidden" id="Locco_Ro_emoticons_action" name="Locco_Ro_emoticons_action" value="1" /><br />
			<input type="submit" id="submit" class="button button-primary" name="Locco_Ro_emoticons_submit" value="Save Settings" />
			</form>
			<script language="javascript">
			jQuery(".code-row").each(function(i){
				jQuery(this).mouseover(function(){
					jQuery(this).addClass("code-row-hover");
				}).mouseout(function(){
					jQuery(this).removeClass("code-row-hover");
				}).click(function(){
					if((jQuery(this).find(":checkbox")[0]).checked){
						(jQuery(this).find("td")[0]).className = "code-check0";
						jQuery(this).removeClass("code-row-checked");
					}
					else{
						jQuery(this).addClass("code-row-checked");
						(jQuery(this).find("td")[0]).className = "code-check1";
					}
					(jQuery(this).find(":checkbox")[0]).checked = !(jQuery(this).find(":checkbox")[0]).checked;
				});
			});
			</script>
<?php
		}

		function replace($string){
			//die($string);
			$output = '';
			$textarr = preg_split("/(<\/?pre[^>]*>)|(<\/?p[^>]*>)|(<\/?a[^>]*>)|(<\/?object[^>]*>)|(<\/?img[^>]*>)|(<\/?embed[^>]*>)|(<\/?strong[^>]*>)|(<\/?b[^>]*>)|(<\/?i[^>]*>)|(<\/?em[^>]*>)/U", $string, -1, PREG_SPLIT_DELIM_CAPTURE); 
			$stop = count($textarr);
			//die(print_r($opt['stat'],true));
			$s=false;
			for ($i = 0; $i < $stop; $i++){
				$content = $textarr[$i];
				if(preg_match("/^<img/",trim($content))){
					$output .= $content;
					continue;
				}
				if(preg_match("/^<pre/",trim($content)))$s = true;
				if(trim($content)=="^</pre>")$s = false;
				//if (!$s && (strlen($content) > 0) && ('<' != $content{0}))
				if (!$s)
				{ 
					$content = loccoEmoticons::replace_code( $content ) ;
				}
				$output .= $content;
			}
			
			return $output;
			
		}

		function replace_code($content){
			global $KEReplace;
			//print_r($content);die;
			return strtr($content,$KEReplace);
		}
		
		function add_button(){
			$pl_dir 	= plugin_dir_url( __FILE__ );
	        $wizard_url = $pl_dir . 'emoticons-wizard.php';
	        $button_src = $pl_dir.'Locco_Ro.jpg';
	        $button_tip = 'Insert a Locco_Ro Emoticon';
	        //echo '<a title="Add a Locco_Ro Emoticon" href="'.$wizard_url.'?pl_dir='.$pl_dir.'&KeepThis=true&TB_iframe=true" class="thickbox"><img src="' . $button_src . '" alt="' . $button_tip . '" /></a>';
	        echo '<a title="Add a Locco_Ro Emoticon" href="'.$wizard_url.'?pl_dir='.$pl_dir.'&KeepThis=true&TB_iframe=true" class="thickbox"><img src="' . $button_src . '" alt="' . $button_tip . '" /></a>';
		}
		
		function scut(){
			global $KEReplace;
			$opt = get_option('Locco_Ro_emoticons');
			echo "<div style=\"cursor:pointer;margin:2px\" onclick=\"loccoEmoticonsclink()\"><span id='loccoEmoticonslink'><strong>Click here to add emoticon into your comment!</strong></span>";
			if ( isset($opt['backlink']) && $opt['backlink'] ) echo "&nbsp;<a target=\"_blank\" href=\"http://locco.ro\"></a>";
			else {
				if( !isset($opt['backlink']) )  echo "&nbsp;<a target=\"_blank\" href=\"http://locco.ro\">Locco.Ro</a>";
			}
			echo "</div>";
			echo "<div id='loccoEmoticonscontent' style=\"display:none\">";
			foreach($KEReplace as $k=>$v){
				if(isset($opt['stat']) && isset($opt['stat'][$k])){}
				else echo "<a title=\"".$k."\" href=\"javascript:loccoEmoticonsclick('".$k."')\" style=\"cursor:pointer;margin:1px;border:none\">".$v."</a>";
			}
			echo "</div>"; 
		}
		
		function script(){
?>
<script language="javascript">
	var gOI = function(id){
		return document.getElementById(id);
	};
	
	var loccoEmoticonsclick = function(tag){
		var d = gOI("comment");
		var b = d.selectionStart, a = d.selectionEnd;
		d.value = d.value.substring(0, b) + " " + tag + " " + d.value.substring(a, d.value.length);
	};
	
	var loccoEmoticonsclink = function(){
		gOI("loccoEmoticonslink").innerHTML = gOI("loccoEmoticonscontent").style.display == "" ? "<strong>Show emoticon</strong>":"<strong>Hide emoticon</strong>";
		gOI("loccoEmoticonscontent").style.display = gOI("loccoEmoticonscontent").style.display == "" ? "none":"";
	};
</script>	
<?php
		}
	}
}
?>