<?php   

if (!file_exists("system/database.config.php"))
{
$config_file = "<?php   

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'YOURPSW');
define('DB_NAME', 'YOURDB');

?>";

$gen_now = fopen("system/database.config.php","w");
fwrite($gen_now,"$config_file");
fclose($gen_now);

die("<center><h2>FlakeCMS Message<br>The Configuration File was generated now, you must edit it to the website works, go to <u>system</u> folder and search for file <u>database.config.php</u>, edit the file with your data and press F5 to update this webpage.</h2></center>");
}
		
include_once 'database.config.php';

class MysqlConnection
{
	function __construct() 
	{
		$mysql_connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("<center>FlakeCMS Warning<br><br><font color='red'><h2>Configuration Error.</h2></font></center>");
		mysql_select_db(DB_NAME, $mysql_connection) or die('Check the configuration of the MySQL... Error: -> ' . mysql_error());
	}
	
	function CheckConfigurationData($db_hostname, $db_username, $db_password, $db_name)
	{
		if($db_hostname == "" || $db_username == "" || $db_password == "" || $db_name == "")
		{
			$Error_Text = "Problems... I Fucking hate problems.";
			die ('<center><h2>'.$Error_Text.'</h2></center>');
		}
		else		{		return;		}
	}
	
	function DatabaseCleanUp()
	{
		
	}
	
	function execQuery_($query)
	{
		mysql_query(''.$query.'');
	}
	
}


?>