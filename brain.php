<?php   

header('Content-Type: text/html; charset=iso-8859-1');

function usingClass($file) { require_once 'system/'.$file.'.class.php'; }
function usingConfig($file) { require_once 'system/'.$file.'.config.php'; }

######################################################################

usingClass("connection");
usingClass("hotel");
usingClass("security");
usingClass("users");
usingClass("template");

usingConfig("database");
usingConfig("client");
usingConfig("website");

######################################################################

$GetConnection = new MysqlConnection(); 
$GetTemplate = new TemplateManager();
$GetUsers = new Users();
$GetHotel = new Hotel(); 
$GetSecurity = new Security();

######################################################################

$GetSecurity->StartSession();

$GetTemplate->Init();

$GetConnection->CheckConfigurationData(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(SITE_MAINTENANCE != 0) { header("Location: maintenance.php"); } else {}

function CheckUsersOnline() {  $CheckServer = new Hotel();  $CheckServer->UsersOnline(); }

function GetUserInfo($user_name, $value) {  $GetUsers = new Users();  $GetUsers->GetUserValue($user_name, $value); }

function Texts($filename) { $GetTexts = new TemplateManager();  $GetTexts->GetTEXT($filename); }

function About() {  $GetCreditsStuff = new TemplateManager();  $GetCreditsStuff->Head_Foot(); }
function Powered() {  $GetCreditsStuff = new TemplateManager();  $GetCreditsStuff->Down_Foot(); }

?>