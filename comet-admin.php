<?php
	wp_enqueue_style("ccadmin", plugin_dir_url( __FILE__ ).'css/comet-admin.css');
	wp_enqueue_script("ccevent", plugin_dir_url( __FILE__ ).'js/event.js');
	wp_enqueue_script("comet-admin", plugin_dir_url( __FILE__ ).'js/comet-admin.js');

	$isBuddyPressActive = '';
	if(!is_plugin_active('buddypress/bp-loader.php')){
		$isBuddyPressActive = 'style="display:none;"';
	}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<div class="tabs">
		<h1>CometChat Settings</h1>
        <ul class="tab-links" id = "submenu">
            <li data-rel="cc_adminpanel" class="active menus"><a href="#cc_adminpanel">Admin Panel</a></li>
            <li data-rel="cc_settings" class="menus"><a href="#cc_settings" <?php echo $isBuddyPressActive; ?>>BuddyPress Settings</a></li>
        </ul>

        <div class="tab-content">
            <div id="cc_adminpanel" class="tab active">
	        	<div class="cc_admin_content">
					<h2>
						CometChat Admin Panel
					</h2>
					<p>
						To Change the layout or further customize cometchat please visit admin panel.
					</p>
					<p style="margin-top: 20px;">
						<button type="button" class="button-primary" onclick="cometGOPanel('<?php echo $adminpanelurl; ?>');">
							Launch Admin Panel
						</button>
					</p>
	        	</div>
            </div>

            <div id="cc_settings" class="tab">
				<p class="cc-go-para">
					Extend CometChat for BuddyPress!
				</p>
				<p>
					We’ve detected that you’re using BuddyPress. Here are some additional settings that you can configure:
				</p>
				<table cellspacing="1" style="margin-top:20px;">
					<tr style="margin-top:20px;">
						<td width="550" style="padding-top: 20px;">
							<p class="cc-go-para">
								Show only Friends in Contacts list?
							</p>
							<p>
								If you tick this option, then when a user logs in, he will be able to see only his friends in the Contacts list. Note that, friends are synchronized only after they login atleast once to your site (after adding CometChat).
							</p>
						</td>
						<td valign="top" style="padding-top: 30px;">
							<input type = "checkbox" class="show_friends" value="show_friends" name="show_friends" <?php if(get_option('show_friends') === 'true') echo 'checked="checked"';?> /> Yes
						</td>
					</tr>
					<tr style="margin-top:20px;">
						<td width="550" style="padding-top: 20px;">
							<p class="cc-go-para">
								Synchronize BuddyPress Groups with CometChat
							</p>
							<p>
								If you tick this option, we will create equivalent chat groups in CometChat and add only those users part of your BuddyPress Group to it.
							</p>
						</td>
						<td valign="top" style="padding-top: 30px;">
							<input type = "checkbox" class="bp_group_sync" value="bp_group_sync" name="bp_group_sync" <?php if(get_option('bp_group_sync') === 'true') echo 'checked="checked"';?> /> Yes
						<td>
					</tr>
					<tr>
						<td style="padding-top: 20px;">
							<button type="submit" value = "submit" id = "save" class = "button-primary">Save Settings</button>
						</td>
					</tr>
				</table>
                <div id = "success" class = "successmsg"></div>
            </div>
        </div>
    </div>
</body>
</html>