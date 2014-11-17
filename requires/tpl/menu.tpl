<?php
if($_SESSION['login'] == FALSE)
{
?>
	<li class="<?php if($current_subpage == "frontpage") { echo "selected"; } else {} ?>"><a href="http://<?php echo SITE_DOMAIN; ?>/index.php">Home</a></li> 
	<li class="<?php if($current_subpage == "login") { echo "selected"; } else {} ?>"><a href="http://<?php echo SITE_DOMAIN; ?>/login.php">Login</a></li> 
	<li class="<?php if($current_subpage == "register") { echo "selected"; } else {} ?>"><a href="http://<?php echo SITE_DOMAIN; ?>/register.php">Register NOW!</a></li> 
<?php
}
else
{
?>
	<li class="<?php if($current_subpage == "home") { echo "selected"; } else {} ?>"><a href="http://<?php echo SITE_DOMAIN; ?>/me.php">Home</a></li> 
	<li class="<?php if($current_subpage == "account_settings") { echo "selected"; } else {} ?>"><a href="http://<?php echo SITE_DOMAIN; ?>/settings.php">Account Settings</a></li> 

	<?php
	$query = mysql_query("SELECT * FROM characters WHERE username = '".$_SESSION['username']."'");
	$get = mysql_fetch_assoc($query);
	$id = $get["id"];

	$que = mysql_query("SELECT * FROM badges WHERE user_id = '".$id."'");
	$gee = mysql_fetch_assoc($que);
	$bid = $gee["badge_id"];

	if($bid == "11" || $bid == "12" || $bid == "13")
	{
	?>
		<li class=""><a href="http://<?php echo SITE_DOMAIN; ?>/housekeeping/">Housekeeping [NO]</a></li> 
	<?php
	}
	?>
	<li class=""><a href="http://<?php echo SITE_DOMAIN; ?>/me.php?pa=1">Logout</a></li> 
<?php
}
?>