<?php   

require_once 'users.class.php';

class Hotel extends Users
{
	public function UsersOnline()
	{
        $query_serverstatus = mysql_query("SELECT status FROM server_status") or die(mysql_error());
		$amount_row = mysql_fetch_assoc($query_serverstatus);

		$amount_users_online = $amount_row["sval"];
		do
		{
			if($amount_users_online == 0) {	echo '0 Online users';}
			else { echo ''.$amount_users_online.' Online users'; }
		}
		while(0);
	}
	
	public function _RandomString_($length, $numbers, $upper)
	{
		if (1 > $length) $length = 8;
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numChars = 62;
		
		if (!$numbers)
		{
			$numChars = 52;
			$chars = substr($chars, 10, $numChars);
		}
			
			if (!$upper)
			{
				$numChars -= 26;
				$chars = substr($chars, 0, $numChars);
			}
				
				$string = '';
				for ($i = 0; $i < $length; $i++)
				{
					$string .= $chars[mt_rand(0, $numChars - 1)];
				}
					
			return $string;
					
		}
	
	public function GenerateSSO($username, $text_mode = strtoupper, $tick_pass = 'Flake', $separator = '-', $size_1 = 10, $size_2 = 10, $size_3 = 9, $size_4 = 10)
	{
		$randnum1 = $this->_RandomString_($size_1, TRUE, FALSE);
		$randnum2 = $this->_RandomString_($size_4, FALSE, TRUE);
		$randnum3 = $this->_RandomString_($size_3, TRUE, TRUE);
		$randnum4 = $this->_RandomString_($size_2, TRUE, TRUE);

		$sso = ''.$tick_pass.'';
		$sso .= ''.$separator.''.$randnum1.'';
		$sso .= ''.$separator.''.$randnum2.'';
		$sso .= ''.$separator.''.$randnum3.'';
		$sso .= ''.$separator.''.$randnum4.'';

		$Ticket_SSO = $text_mode($sso);
		
		return $Ticket_SSO;
	}

}
?>