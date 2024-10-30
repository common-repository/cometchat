<?php
	wp_enqueue_style("ccadmin", plugin_dir_url( __FILE__ ).'css/admin.css');
	wp_enqueue_style("ccmaintab", plugin_dir_url( __FILE__ ).'css/bootstrap.min.css');
	wp_enqueue_script("adminjs", plugin_dir_url( __FILE__ ).'js/admin.js');
	wp_enqueue_script("bootstrapjs", plugin_dir_url( __FILE__ ).'js/bootstrap.min.js');

	$additionalstyle = '';
	if(!is_plugin_active('buddypress/bp-loader.php')){
		$additionalstyle = 'style="display:none;"';
	}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<div class="wrapper">
		<div class="container" id="cc_plugin_main_container" style="opacity:0.1;">
			<div id="narrow-browser-alert" class="alert text-center">
				<img src="<?php echo $cometchatLogo; ?>" id="ccimg">
			</div>

			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
							<span class="text">CometChat Admin Panel</span>
						</a>
					</li>
					<li role="presentation" class="next" <?php echo $additionalstyle; ?>>
						<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
							<span class="text">Buddypress Settings</span>
						</a>
					</li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			        	<div class="cc_admin_content">
							<p class="cc_admin_para">
								To Change the layout or further customize cometchat please visit admin panel.
							</p>
							<h1 class="cc_admin_name">
								CometChat Admin Panel
							</h1>
							<iframe src="<?php echo $adminpanelurl; ?>" id="cc_iframe"></iframe>
							<button type="button" id="cc_plugin_admin_panel" class="ccadminpanel ccadminpanel-primary" onclick="openCCAdminPanel('<?php echo $adminpanelurl; ?>');">
								Launch Admin Panel
							</button>
			        	</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
						<p class="cc_admin_para">
							Extend CometChat for BuddyPress!
						</p>
						<p>
							We’ve detected that you’re using BuddyPress. Here are some additional settings that you can configure:
						</p>
						<table cellspacing="1" style="margin-top:20px;">
							<tr style="margin-top:20px;">
								<td width="550" style="padding-top: 20px;">
									<p class="cc_admin_para">
										Show only Friends in Contacts list?
									</p>
									<p>
										If you tick this option, then when a user logs in, he will be able to see only his friends in the Contacts list. Note that, friends are synchronized only after they login atleast once to your site (after adding CometChat).
									</p>
								</td>
								<td valign="top" style="padding-top: 20px;">
									<input type = "checkbox" class="show_friends" value="show_friends" name="show_friends" <?php if(get_option('show_friends') === 'true') echo 'checked="checked"';?> /> Yes
								</td>
							</tr>
							<tr style="margin-top:20px;">
								<td width="550" style="padding-top: 20px;">
									<p class="cc_admin_para">
										Synchronize BuddyPress Groups with CometChat
									</p>
									<p>
										If you tick this option, we will create equivalent chat groups in CometChat and add only those users part of your BuddyPress Group to it.
									</p>
								</td>
								<td valign="top" style="padding-top: 20px;">
									<input type = "checkbox" class="bp_group_sync" value="bp_group_sync" name="bp_group_sync" <?php if(get_option('bp_group_sync') === 'true') echo 'checked="checked"';?> /> Yes
								<td>
							</tr>
							<tr>
								<td style="padding-top: 20px;">
									<button type="submit" value = "submit" id = "save" class = "button-primary">Save Settings</button>
								</td>
							</tr>
						</table>
						<div id="success" class="success-message"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>