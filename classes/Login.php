<?php

class Login
{
	private $db_connection = null;
	public $errors = array();
	public function __construct()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}
		
		if (isset($_POST["login"], $_POST["token"], $_POST["captcha"]))
		{
			$CSRF = new CSRF();
			$token = $_POST["token"];
			
			if ($CSRF->Check($token))
			{
				$this->loginWithPostData();
			}
			else
			{
				$this->errors[] = "CSRF Token Failed.";
			}
		}
	}

	private function loginWithPostData()
	{
		if (empty($_POST['user_login']))
		{
			$this->errors[] = "Login field was empty.";
		}
		elseif (empty($_POST['user_password']))
		{
			$this->errors[] = "Password field was empty.";
		}
		elseif (empty($_POST['captcha']))
		{
			$this->errors[] = "Captcha field was empty.";
		}
		elseif ($_POST['captcha'] != $_SESSION['digit'])
		{
			$this->errors[] = "Wrong captcha code.";
		}
		elseif (!empty($_POST['user_login']) && !empty($_POST['user_password']) && !empty($_POST['captcha']))
		{
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if (!$this->db_connection->set_charset("utf8"))
			{
				$this->errors[] = $this->db_connection->error;
			}

			if (!$this->db_connection->connect_error)
			{
				$user_login = $this->db_connection->real_escape_string($_POST['user_login']);
				$query = $this->db_connection->prepare("SELECT user_id, user_login, user_password, user_firstname, user_surname, user_birthday, user_title FROM users WHERE user_login = ?;");
				$query->bind_param('s', $user_login);
				$query->execute();
				$result_of_login_check = $query->get_result();

				if ($result_of_login_check->num_rows == 1)
				{
					$result_row = $result_of_login_check->fetch_object();

					if (password_verify($_POST['user_password'], $result_row->user_password))
					{
						$_SESSION['user_id'] = $result_row->user_id;
						$_SESSION['user_login'] = $result_row->user_login;
						$_SESSION['user_firstname'] = $result_row->user_firstname;
						$_SESSION['user_surname'] = $result_row->user_surname;
						$_SESSION['user_birthday'] = $result_row->user_birthday;
						$_SESSION['user_title'] = $result_row->user_title;
						$_SESSION['user_login_status'] = 1;
					}
					else
					{		
						setcookie('login', 1, time()+60*10);
						$this->errors[] = "Wrong password. Try again.";
					}
				}
				else
				{
					if (isset($_COOKIE['login']))
					{
						if ($_COOKIE['login'] < 3)
						{
							$attempts = $_COOKIE['login'] + 1;
							setcookie('login', $attempts, time()+60*10);
							$this->errors[] = "Wrong password. Try again.";
						}
						else
						{
							$this->errors[]  = 'Maximum login attempts reached!';
						}
					}
					else
					{
						setcookie('login', 1, time()+60*10);
						$this->errors[] = "Wrong password. Try again.";
					}
				}
			}
			else
			{
				$this->errors[] = "Database connection problem.";
			}
			mysqli_close($this->db_connection);
		}
	}

	public function doLogout()
	{
		$_SESSION = array();
		session_destroy();
		unset($_COOKIE['login']); 
		setcookie('login', 1, time()+60*10);
		header("Location: index.php");
	}
	
	public function isUserLoggedIn()
	{
		if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1)
		{
			return true;
		}
		return false;
	}
}
