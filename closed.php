<?php   

// Requires all Classes and some Security Settings
require_once 'brain.php';

// Requires
$GetSecurity->IF_LogIN();

// Get CMS Header Static
$GetTemplate->GetHeader(); // Website Header
$GetTemplate->GetContentHeader("Registro Fechado"); // Content Header
$GetTemplate->WriteLine('<div id="main">');

// Getting Messages Session
$GetTemplate->GetSession(2);

// Getting the Page
$GetTemplate->GetTPL("reg_closed");
$GetTemplate->WriteLine('</div>');

// Credit Stuff
$GetTemplate->GetContentFooter();
$GetTemplate->GetFooter();
?>
