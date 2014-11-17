<?php   

// Requires all Classes and some Security Settings
require_once 'brain.php';


// Requires
// Actions
$PageAction = $_GET["pa"]; // Gets the Page Action

// Page Functions

// This function executes all actions from Website
if($PageAction == "1") { $GetSecurity->Logout(); } else{} // Logout User from Website

// Lets Check is Sessions is Registred
$GetSecurity->Get_Session();

$GetTemplate->Init();

// Get CMS Headers and Stuffs

// Website Header
$GetTemplate->GetHeader();

// Content Header
$GetTemplate->GetContentHeader("Principal");

$GetTemplate->WriteLine('<div id="main">');

// Getting the Page
$GetTemplate->GetTPL("me");

// Getting Credits Stuff
$GetTemplate->GetContentFooter();

$GetTemplate->GetFooter();
?>
