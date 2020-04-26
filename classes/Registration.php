<?php

class Registration
{
	private $db_connection = null;
	public $errors = array();
	public $messages = array();
	public function __construct()
	{
		if (isset($_POST['register']))
		{
			$this->registerNewUser();
		}
	}

	private function registerNewUser()
	{
		if (empty($_POST['user_login']) || empty ($_POST['user_firstname']) || empty($_POST['user_surname']) || empty($_POST['user_address']) || empty($_POST['user_title']) || empty($_POST['user_phone']) || empty($_POST['employee_id']) || empty($_POST['user_birthday']) || empty($_POST['user_password']) || empty($_POST['user_password_repeat']))
		{
			$this->errors[] = "All fields are required!";
		}
		elseif ($_POST['user_password'] !== $_POST['user_password_repeat'])
		{
			$this->errors[] = "Password and password repeat are not the same";
		}
		elseif (strlen($_POST['user_password']) < 6)
		{
			$this->errors[] = "Password has a minimum length of 6 characters";
		}
		elseif (strlen($_POST['user_login']) > 64 || strlen($_POST['user_login']) < 2)
		{
			$this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
		}
		elseif (strlen($_POST['user_firstname']) > 64 || strlen($_POST['user_firstname']) < 2)
		{
			$this->errors[] = "First name cannot be shorter than 2 or longer than 64 characters";
		}	
		elseif (strlen($_POST['user_surname']) > 64 || strlen($_POST['user_surname']) < 2)
		{
			$this->errors[] = "Surname cannot be shorter than 2 or longer than 64 characters";
		}
		elseif (strlen($_POST['user_address']) > 64 || strlen($_POST['user_address']) < 2)
		{
			$this->errors[] = "Address cannot be shorter than 2 or longer than 64 characters";
		}
		elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_login']))
		{
			$this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
		}
		elseif (!empty($_POST['user_login'])
			&& !empty($_POST['user_firstname'])
			&& !empty($_POST['user_surname'])
			&& !empty($_POST['user_title'])
			&& !empty($_POST['user_address'])
			&& !empty($_POST['user_birthday'])
			&& !empty($_POST['user_phone'])
			&& !empty($_POST['employee_id'])
			&& strlen($_POST['user_login']) <= 64
			&& strlen($_POST['user_login']) >= 2
			&& preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_login'])
			&& !empty($_POST['user_password'])
			&& !empty($_POST['user_password_repeat'])
			&& ($_POST['user_password'] === $_POST['user_password_repeat'])
		)
		{
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (!$this->db_connection->set_charset("utf8"))
			{
				$this->errors[] = $this->db_connection->error;
			}

			if (!$this->db_connection->connect_error)
			{
				$user_login = $this->db_connection->real_escape_string(strip_tags($_POST['user_login'], ENT_QUOTES));
				$user_password = $_POST['user_password'];
				$user_firstname = strip_tags($_POST['user_firstname'], ENT_QUOTES);
				$user_surname = strip_tags($_POST['user_surname'], ENT_QUOTES);
				$raw_date = htmlentities($_POST['user_birthday']);
				$user_birthday = date('d/m/Y', strtotime($raw_date));
				$user_address = strip_tags($_POST['user_address'], ENT_QUOTES);
				$user_title = strip_tags($_POST['user_title'], ENT_QUOTES);
				$user_phone = strip_tags($_POST['user_phone'], ENT_QUOTES);
				$employee_id = strip_tags($_POST['employee_id'], ENT_QUOTES);
				
				$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
				
				$query = $this->db_connection->prepare("SELECT * FROM users WHERE user_login = ?;");
				$query->bind_param('s', $user_login);
				$query->execute();
				$query_check_user_name = $query->get_result();

				if ($query_check_user_name->num_rows == 1)
				{
					$this->errors[] = "Sorry, that login is already taken.";
				}
				
				$query = $this->db_connection->prepare("SELECT * FROM users WHERE employee_id = ?;");
				$query->bind_param('s', $employee_id);
				$query->execute();
				$query_check_employee_id = $query->get_result();

				if ($query_check_employee_id->num_rows == 1)
				{
					$this->errors[] = "Sorry, that employee id is already taken.";
				}
				
				else
				{
					$query = $this->db_connection->prepare("INSERT INTO users (user_login, user_password, user_firstname, user_surname, user_birthday, user_address, user_title, user_phone, employee_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
					$query->bind_param('sssssssss', $user_login, $user_password_hash, $user_firstname, $user_surname, $user_birthday, $user_address, $user_title, $user_phone, $employee_id);
					$result = $query->execute();
					
					if ($result)
					{
						$this->messages[] = "Account has been created successfully.";
					} 
					else 
					{
						$this->errors[] = "Registration failed. Please go back and try again.";
					}
					mysqli_close($this->db_connection);
				}
			}
			else
			{
				$this->errors[] = "Sorry, no database connection.";
			}
		}
		else 
		{
			$this->errors[] = "An unknown error occurred.";
		}
	}
}
