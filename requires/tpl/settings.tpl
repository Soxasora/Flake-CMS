<h3>Account Configuration</h3>
<p>Here you can set your settings</p>
<br />
<form method="post" action="settings.php?pa=1">


<table width="100%" class="registration">

<?php
$query = mysql_query("SELECT * FROM characters WHERE username = '".$_SESSION['username']."'");
$get = mysql_fetch_assoc($query);
$reqs = $get['privacy_accept_friends'];
?>

<tr><td class="l" width="30%">
<strong>New Friend Requests</strong><p><small>Do you want to receive new friend requests?</small></p></td>
<td class="r" width="100%"><input type="checkbox"  name="friendreqs" <?php if($reqs == "1") { echo "checked=\"on\""; } elseif($reqs == "0") { echo ""; } ?> />&nbsp;&nbsp;<?php if($reqs == "0") { echo ""; } else if($reqs == "1") { echo ""; } ?><br /></td></tr>

<tr>
<td colspan="2" class="r" style="text-align: center;">
<br />
<br />
<tr><td colspan="2" class="r"><input type="submit" class="blbtn"; value="Save" /></td></tr></table>

</form>
