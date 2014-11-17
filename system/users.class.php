<?php   

require_once "security.class.php";
require_once "connection.class.php";
require_once "website.config.php";
require_once "hotel.class.php";

class Users extends Security
{
	public function TryLogin($email, $password)
	{
		Users::Enter($email, $password);
	}
	
	public function Register($email, $username, $password, $password2)
	{
		$entered_email =  $email;
		$entered_username =  $username;
		$entered_password =  $password;
		$entered_password2 =  $password2;

		if(empty($email) || empty($username) || empty($password) || empty($password2))
		{
			Security::CreateSession("error", "2");
			Security::Redirect("register.php");
			exit;
		}
		
		// Names
		if(Users::CheckPN($username) != 0)
		{
			if(preg_match('/^[a-za-zA-Z\d_]{4,32}$/i', $username))
			{
			}
		}
	
		// Existing Name
		if(Users::CheckName($username))
		{
			if(preg_match('/^[a-za-zA-Z\d_]{4,32}$/i', $username))
			{
			}
		}
		
		// User banned not finished :c
		
		// Email registered?
		if(Users::CheckEmail($email))
		{
			if(preg_match('/^[a-z0-9_\.-]+([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i', $email))
			{
			}
		}
		
		// Password.
		if($password2 != $password)
		{
			Security::CreateSession("error", "4");
			Security::Redirect("register.php");
			exit;
		}
		
		$sha1_password = Security::Encrypt('SHA1', $password);
		
		// Default User
		$initial_figure = "hr-3194-40-31.cc-3039-100.sh-290-62.hd-3092-1.lg-270-110.fa-1206-62.ha-3129-100"; // Figure
		$initial_motto = "Soxasora rulez!"; // Motto
		$initial_credits = "50"; // Credits
		$initial_pixels = "100"; // Pixels
		$initial_respects = "3"; // Respects	

		$last = mysql_insert_id();
		mysql_query("INSERT INTO users (id, username, password, mail, motto, look, credits, activity_points) VALUES ('".$last."', '".$username."', '".$sha1_password."', '".$entered_email."', '".$initial_motto."', '".$initial_figure."', '".$initial_credits."', '".$initial_pixels."');");
		
		
		Users::TryLogin($email, $password);
	}
	
	public function CheckEmail($email)
	{
		$query = mysql_query("SELECT * FROM users WHERE mail = '".$email."' LIMIT 1;");
		$ocuped = mysql_num_rows($query);
		if($ocuped == 1)
		{
			Security::CreateSession("error", "5");
			Security::Redirect("register.php");
			exit;
		}
		else
		{
		    $var = 1;
  		    return $var;
		}
	}
	
	public function CheckName($username)
	{
		$query = mysql_query("SELECT * FROM users WHERE username = '".$eusername."' LIMIT 1;");
		$ocuped = mysql_num_rows($query);
		if($ocuped == 1)
		{
			Security::CreateSession("error", "3");
			Security::Redirect("register.php");
			exit;
		}
		else
		{
		    $var = 1;
  		    return $var;
		}
	}
	
	public function CheckPN($username)
	{
		$prohibited_names = array('leoxgr', 'chuck_norris', 'norris', 'leo', 'at0m', 'moderator', 'administrador', 'Beta', 'Snowlight', 'meth0d', 'method', 'hack', 'uber', 'ion', 'nillus', 'nils', 'roy', 'hotel', 'staff', 'soxasora');
		
		if (in_array($username,$prohibited_names)) 
		{
			Security::CreateSession("error", "1");
			Security::Redirect("register.php");
			exit;
		}
		else 
		{
		    $var = 1;
  		    return $var;
        }
	}
	
	public function CreateUser($email, $username, $password, $result = FALSE)
	{
		$reg = $this->CreateCharacter($username);
		if($reg != $result)
		{
			Security::Redirect("success.php");
		}
	}
	
	public function Enter($email, $password)
	{
		$user_email = $email;
		$sha1_password = strtolower(Security::Encrypt('SHA1', $password));
		
		$result = mysql_query("SELECT * FROM users WHERE mail = '$email'");
		
		$user_data = mysql_fetch_array($result);
		$no_rows = mysql_num_rows($result);
		if(empty($email) && empty($password) || empty($email) || empty($password))
		{
			Security::CreateSession("login_error", "1");
			Security::Redirect("login.php");
			exit;
		}
		else
		{
			if ($no_rows >= 1) 
			{
				if($sha1_password == $user_data["password"])
				{
					$_SESSION['login'] = true;
					$_SESSION['id'] = $user_data['id'];
					$_SESSION['username'] = $user_data['username'];
					
					Security::Redirect("me.php");
				}
				else if($user_data["password"] != $sha1_password)
				{
					Security::CreateSession("login_error", "3");
					Security::Redirect("login.php");
					exit;
				}
			}
			else if($no_rows <= 0)
			{
				Security::CreateSession("login_error", "2");
				Security::Redirect("login.php");
				exit;
			}
		}
	}

	public function CreateCharacter($char_name)
	{
		$GetConnect = new MysqlConnection();
		
		$initial_figure = "hr-3194-40-31.cc-3039-100.sh-290-62.hd-3092-1.lg-270-110.fa-1206-62.ha-3129-100";
		$initial_motto = "Soxasora rulez!";
		$initial_credits = "50";
		$initial_pixels = "100";
		$initial_respects = "3";

		$InsertInDatabase = mysql_query("INSERT INTO users (real_name, age) VALUES ('Peter Griffin', '35')");

		if($InsertInDatabase)
		{
			return TRUE;
		}
	}
		
	public function BanUser($id){}	
	public function UpdateUser($id, $table, $values){}
	public function DeleteUser($id){}
	public function CheckSubscriptionsHC($id){}
	
	public function SSO($username)
	{
		$GetHotel = new Hotel();		
		
		$SSO_Data = $GetHotel->GenerateSSO($username);
		
		$this->UpdateSSO($SSO_Data, $username, 1);
		
		return $SSO_Data;
	}
	
	public function UpdateSSO($SSO, $username, $mode)
	{
        mysql_query("UPDATE users SET auth_ticket = '$SSO' WHERE username = '$username'");
	}
	
	public function GetUserValue($user_name, $value)
	{
		$result = mysql_query("SELECT $value FROM users WHERE username = '$username'");
		$user_data = mysql_fetch_array($result);
		echo $user_data[''.$value.''];
	}
	
}
?>