<?php 

require_once  "system/website.config.php";
require_once  "system/template.class.php";

// If website isn´t anymore in Maintenance Mode , redirects to the frontpage (index.php)
if(SITE_MAINTENANCE == 0) { header("Location: index.php"); } else {}

// Declares the Template Class
$GetTemp = new TemplateManager();

// Requiring all pages that complain the maintenance
$GetTemp->GetTPL("maintenance_header");
$GetTemp->GetTPL("maintenance_body");
$GetTemp->GetTPL("maintenance_footer");

?>
