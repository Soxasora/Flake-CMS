<?php   

require_once 'website.config.php';

require_once 'security.class.php';
require_once 'connection.class.php';

class TemplateManager extends Security
{
	private $outputData;
	private $params = Array();
	private $includeFiles = Array();

	public function Init()
	{
		if($this->isLogged())
		{	
			$this->SetParam('username', $_SESSION["account_name"]);
		}
		elseif(!$this->isLogged())
		{
			$this->SetParam('username', 'Guest');
		}
		
	}
	
    public function isLogged()
	{
		if($_SESSION['login'] == true)
		{
			return true;
		}
		
		return false;
	}
	
	public function SetParam($param, $value)
	{
		$this->params[$param] = is_object($value) ? $value->fetch() : $value;
	}
	
	public function filterParams($str)
    {
        foreach($this->params as $key => $value)
        {
            $str = str_ireplace('%' . $key . '%', $value, $str);
			$str = str_ireplace('#' . $key . '#', $value, $str);
			$str = str_ireplace('{' . $key . '}', $value, $str);
        }

        return $str;
	}

	public function Head_Foot(){echo "<!---- FlakeCMS for hMercury. --->";}
	public function Down_Foot(){echo "<!---- Based on RainbowCMS Framework and GetCMS. Thanks to Meth0d, At0m. --->";}

	public function GetHeader()	{ require_once('requires/tpl/header.tpl');	}

	public function GetFooter()	{ require_once('requires/tpl/footer.tpl');	}
	
	public function GetContentHeader($page_title){	$pt = $page_title;  require_once('requires/tpl/content_header.tpl'); }
	
	public function GetContentFooter()	{ require_once('requires/tpl/content_footer.tpl');	}
	
	public function GetSession($number)	{ require_once('requires/sessions/'.$number.'.php');	}
		
	function WriteLine($line) { echo $this->filterParams($line); }
	
	function WriteLineSeveral($line, $times)
	{
		$nr = 1;  
		while ($nr <= $times)
		{
			echo $line; $nr++;
		}
	}

	public function GetTPL($filename) 
	{
		if(Security::CheckFile($filename, 00) != FALSE)
		{
			require_once('requires/tpl/'.$filename.'.tpl');
		}
		else
		{
			die("<center>Flake Warning:<br><br><font color='red'><h2>Where are the TPL: (<b>$filename</b>.tpl)... It doesn't exist.. You eat it?</h2></font></center>");
		}		
	}
	
	public function GetTEXT($filename)
	{
		if(Security::CheckFile($filename, 11) != FALSE)
		{
			require_once('requires/texts/'.$filename.'.php');
		}
		else
		{
			die("<center>Flake Warning<br><br><font color='red'><h2>Where is (<b>$filename</b>.php)? You eat it?</h2></font></center>");
		}
	}
	
	public function GetLastImageFromNews($url = SITE_DOMAIN, $sep = "'")
	{
		$Con = new MysqlConnection();
		
//		$get_image = $Con->execQuery_("");
		
		echo '<div class="topnews" style="background-image: url('.$sep.'http://'.SITE_DOMAIN.'/images/news/Installed.png'.$sep.');">';
	}
	
	
	
}
?>