<?php
$KEEUrl = plugin_dir_url( __FILE__ ) . "Locco/";
$opt = get_option('Locco_Ro_emoticons');

$KEReplace	= array(
	// emoticonuri de baza
	':D' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_42.gif" style="border:none;background:none;" alt=":D" />',
	':O' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_33.gif" style="border:none;background:none;" alt=":o" />',
	':(' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_54.gif" style="border:none;background:none;" alt=":(" />',
	':)' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_53.gif" style="border:none;background:none;" alt=":)" />',
	'=))' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_44.gif" style="border:none;background:none;" alt="=))" />',
	':P' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_1.gif" style="border:none;background:none;" alt=":p" />',
	';)' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_50.gif" style="border:none;background:none;" alt=";)" />',
	// emoticonuri locco
	'locco_smiley_1' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_2.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_2' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_3.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_3' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_4.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_4' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_5.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_5' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_6.gif" style="border:none;background:none;" alt=":(" />',
	'locco_smiley_6' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_7.gif" style="border:none;background:none;" alt=":)" />',
	'locco_smiley_7' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_8.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_8' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_9.gif" style="border:none;background:none;" alt="=))" />',
	'locco_smiley_9' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_10.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_10' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_11.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_11' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_12.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_12' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_13.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_13' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_14.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_14' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_15.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_15' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_16.gif" style="border:none;background:none;" alt=":(" />',
	'locco_smiley_16' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_17.gif" style="border:none;background:none;" alt=":)" />',
	'locco_smiley_17' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_18.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_18' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_19.gif" style="border:none;background:none;" alt="=))" />',
	'locco_smiley_19' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_20.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_20' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_21.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_21' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_22.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_22' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_23.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_23' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_24.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_24' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_25.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_25' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_26.gif" style="border:none;background:none;" alt=":(" />',
	'locco_smiley_26' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_27.gif" style="border:none;background:none;" alt=":)" />',
	'locco_smiley_27' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_28.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_28' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_29.gif" style="border:none;background:none;" alt="=))" />',
	'locco_smiley_29' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_30.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_30' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_31.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_41' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_32.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_42' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_34.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_43' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_35.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_44' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_36.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_45' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_37.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_46' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_38.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_47' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_39.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_40' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_40.gif" style="border:none;background:none;" alt=";)" />',
	'locco_smiley_31' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_41.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_32' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_43.gif" style="border:none;background:none;" alt=":D" />',
	'locco_smiley_33' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_45.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_34' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_46.gif" style="border:none;background:none;" alt=":o" />',
	'locco_smiley_35' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_47.gif" style="border:none;background:none;" alt=":(" />',
	'locco_smiley_36' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_48.gif" style="border:none;background:none;" alt=":)" />',
	'locco_smiley_37' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_49.gif" style="border:none;background:none;" alt=":p" />',
	'locco_smiley_38' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_51.gif" style="border:none;background:none;" alt="=))" />',
	'locco_smiley_39' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_52.gif" style="border:none;background:none;" alt=":p" />',
	':d' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_42.gif" style="border:none;background:none;" alt=":D" />',
	':o' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_33.gif" style="border:none;background:none;" alt=":o" />',
	':p' => '<img src="'. $KEEUrl.'Locco_Ro_smiley_1.gif" style="border:none;background:none;" alt=":p" />',
);
$KEReplace2 = $KEReplace;
if ( isset( $opt['stat'] ) )
{
	foreach ( $opt['stat'] as $k => $v )
	{
		$KEReplace[$k] = '';
	}
}
?>