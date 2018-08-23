<?php global $wpdb; ?>
<div class="wrap">  
<?php include("seatt_header.php"); ?>
          <?php    echo "<h2>" . __( 'Simple Event Attendance Options', 'seatt_trdom' ) . "</h2>"; ?>  
<?php

// Clean down event ID by checking if numeric, then casting to integer
if (isset($_GET['event_id'])) {
	if (is_numeric($_GET['event_id'])) {
		$event_id = intval($_GET['event_id']);
	} else {
		$event_id = '';
	}
} else {
	$event_id = '';
}

// Check for remove event, and remove if present
if (($event_id != '') && (isset($_GET['remove_event']))) {
	// We have previously checked event_id
	if ($wpdb->delete($wpdb->prefix.'seatt_events', array('id' => $event_id), array('%d'))) {
		// If we were able to remove the event, remove any attendees
		$wpdb->delete($wpdb->prefix.'seatt_attendees', array('event_id' => $event_id), array('%d'));
		?>  
		<div class="updated">
			<p><strong>Event <em><?php echo esc_html($event_id); ?></em> deleted.</strong></p>
		</div>  
		<?php
	} else {
		// If event couldn't be removed
		?>  
		<div class="error">
			<p><strong>Event not found. Click <a href="admin.php?page=seatt_events">here</a> to reload this page.</strong></p>
		</div>  
		<?php
	}
}


// Check for duplicate event
if (($event_id != '') && (isset($_GET['duplicate_event']))) {
	
	// Get existing event details
	$event = $wpdb->get_row($wpdb->prepare("SELECT event_name, event_desc, event_limit, event_start, event_expire, event_reserves FROM ".$wpdb->prefix."seatt_events WHERE id = %d", $event_id));

	if ($event != NULL) {
	// Create another record
	$wpdb->insert($wpdb->prefix.'seatt_events', array( 'event_name' => $event->event_name, 'event_desc' => $event->event_desc, 'event_limit' => $event->event_limit, 'event_start' => $event->event_start, 'event_expire' => $event->event_expire, 'event_status' => 0, 'event_reserves' => $event->event_reserves ), array('%s', '%s', '%d', '%s', '%s', '%d', '%d') );
	?>  
    <div class="updated">
    	<p><strong>Event <em><?php echo esc_html($event_id); ?></em> duplicated.</strong></p>
    </div>  
        <?php
	}
}

// Check for update settings (not currently in use)
if (isset($_POST['seatt_hidden'])) {
	$seatt_hidden = $_POST['seatt_hidden'];
} else {
	$seatt_hidden = 'N';
}
if	($seatt_hidden == 'Y') {  
	//Form data sent  
	// $data = $_POST['seatt_data'];  
	//update_option('seatt_dbhost', $dbhost);  
	?>  
	<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
	<?php  
	}  

// Page content start	
?>	
<p>To include an attendance form on a page/post, paste the tag into the document text:</p>
<p> [seatt-form event_id=x] </p>
<p>(x = the event id in the table below). If you haven't created the event_id, or have deleted it, nothing will be displayed.</p>
<table width="auto" border="0" align="left" cellpadding="5" cellspacing="5">
    <tr>
        <th align="left" scope="col">Event ID</th>
        <th align="left" scope="col">Shortcode</th>
        <th align="left" scope="col">Event Name</th>
        <th align="left" scope="col">Hours Left</th>
        <th align="left" scope="col">Close Date/Time</th>
        <th align="left" scope="col">Status</th>
        <th align="left" scope="col">Attendees</th>
        <th align="left" scope="col">Options</th>
    </tr>
    <?php
	// Get all listed events
    $events = $wpdb->get_results("SELECT id, event_name, event_limit, event_expire, event_status FROM ".$wpdb->prefix."seatt_events ORDER BY id DESC");
    foreach ($events as $event) {
		$attendees = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) FROM ".$wpdb->prefix."seatt_attendees WHERE event_id = %d", $event->id));
		$event_expire = ceil($event->event_expire - current_time('timestamp')) / 3600;
		if ($event_expire < 0) {
			$event_expire = 0;
			$event->event_status = 0;
    	}
    ?>
    <tr>
        <td><?php echo esc_html($event->id); ?></td>
        <td>[seatt-form event_id=<?php echo esc_html($event->id); ?>]</td>
        <td><a href="admin.php?page=seatt_events_edit&event_id=<?php echo intval($event->id); ?>"><?php echo esc_html($event->event_name); ?></a></td>
        <td><?php echo round($event_expire); ?></td>
        <td><?php echo date("d-m-Y H:i", $event->event_expire); ?></td>
        <td><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/plugins/simple-event-attendance/<?php echo intval($event->event_status); ?>.gif" width="10" height="10" /></td>
        <td><strong><?php echo intval($attendees); ?></strong> / <?php echo intval($event->event_limit); ?></td>
        <td><a href="admin.php?page=seatt_events_edit&event_id=<?php echo intval($event->id); ?>">Edit</a> | <a href="admin.php?page=seatt_events&duplicate_event=1&event_id=<?php echo intval($event->id); ?>">Duplicate</a></td>
    </tr>
    <?php
    }
	
	if (count($events) == 0) {
	echo "<tr><td colspan=\"8\">No events found.</td></tr>";
}
    ?>
</table>
<!--
To come.
    <h3>Options:</h3>
  <p>Attendees visible to all?</p>
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'seatt_trdom' ) ?>" />  
-->
</div>  