<?php   

// Requires all Classes and some Security Settings
require_once 'brain.php';


// Requires
// Actions
$PageAction = $_GET["pa"]; // Gets the Page Action

// Page Functions

// This function executes all actions from Website
if($PageAction == "1")
{
$friendreqs = $_POST['friendreqs'];
if($friendreqs == 'on')
$friendreqs = "1";
elseif($friendreqs == '')
$friendreqs = "0";
$query = mysql_query("UPDATE users SET block_newfriends = '".$friendreqs."' WHERE username = '".$_SESSION['username']."'");

$GetSecurity->Redirect("settings.php");
exit;
} 
else { }

// Lets Check is Sessions is Registred
$GetSecurity->Get_Session();

// Get CMS Headers and Stuffs

// Website Header
$GetTemplate->GetHeader();

// Content Header
$GetTemplate->GetContentHeader("Configs");

$GetTemplate->WriteLine('<div id="main">');

// Getting the Page
$GetTemplate->GetTPL("settings");

// Getting Credits Stuff
$GetTemplate->GetContentFooter();

$GetTemplate->GetFooter();
?>
