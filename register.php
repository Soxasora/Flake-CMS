<?php   

// Requires all Classes and some Security Settings
require_once 'brain.php';

// Requires
$GetSecurity->IF_LogIN();

// Gets the Page Action
$PageAction = $_GET["pa"];

// Functions of The Page
// This function executes all actions from Website
if($PageAction == "1") { $GetUsers->Register($_POST["email"], $_POST["username"], $_POST["password"], $_POST["password2"]); }
// User´s Registy
else{}

// Get CMS Header Static
$GetTemplate->GetHeader(); // Website Header
$GetTemplate->GetContentHeader("Registrazione"); // Content Header
$GetTemplate->WriteLine('<div id="main">');

// Getting Messages Session


// Getting the Page
$GetTemplate->GetTPL("register");
$GetTemplate->WriteLineSeveral('</div>', 2);


// Getting Credits Stuff
$GetTemplate->GetContentFooter();
$GetTemplate->GetFooter();
$GetTemplate->GetSession(1);
?>
