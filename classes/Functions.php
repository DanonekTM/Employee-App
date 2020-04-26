<?php
class Functions
{
	public $errors = array();
	
	public function showErrors()
	{
		foreach ($errors as $error)
		{
			echo $error;
		}
	}
	
	public function getSidebar()
	{
		?>
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading">Core</div>
					<a class="nav-link" href="cp.php">
						<div class="sb-nav-link-icon">
							<i class="fas fa-tachometer-alt"></i>
						</div>
						Dashboard
					</a>
					<div class="sb-sidenav-menu-heading">File Maintenance</div>
					<a class="nav-link" href="add.php">
						<div class="sb-nav-link-icon">
							<i class="fas fa-plus"></i>
						</div>
						Add Employee
					</a>
					<a class="nav-link" href="delete.php">
						<div class="sb-nav-link-icon">
							<i class="fas fa-trash"></i>
						</div>
						Delete Employee
					</a>
					<div class="sb-sidenav-menu-heading">Reports</div>
					<a class="nav-link" href="all.php">
						<div class="sb-nav-link-icon">
							<i class="fas fa-chart-area"></i>
						</div>
						All Employees
					</a>
					<a class="nav-link" href="report.php">
						<div class="sb-nav-link-icon">
							<i class="fas fa-clipboard-list"></i>
						</div>
						Employee Report
					</a>
				</div>
			</div>
			<div class="sb-sidenav-footer">
				<div class="small">Logged in as:</div>
				<?php echo $_SESSION['user_firstname'] . " " . $_SESSION['user_surname']?>
			</div>
		</nav>
		<?php
	}
	
	public function getCurrentDate()
	{
		$currentMonth= date('m');
		$months = array (1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December');
		echo "Today is " . date('l') . " the " . date('jS'). " of " . $months[(int)$currentMonth] . " " . date('Y') . " and it is " . date("H:i a") . ".";
	}
	
	public function isBirthday()
	{
		if ($_SESSION['user_birthday'] == date("d/m/Y"))
		{
			return true;
		}
		return false;
	}
	
	public function databaseSession($status)
	{
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->set_charset("utf8"))
		{
			$this->errors[] = $this->db_connection->error;
		}

		if (!$this->db_connection->connect_error)
		{
			$user_id = $_SESSION['user_id'];
			$currentTime = date('h:i:s d/m/Y', time());
			$session_token = $_SESSION['token'];
			
			switch ($status)
			{
				case "start":
					$checkLogin = $this->db_connection->prepare("SELECT session_token FROM logins WHERE user_id = ?;");
					$checkLogin->bind_param('s', $user_id);
					$checkLogin->execute();
					$row = $checkLogin->get_result()->fetch_assoc();
					if ($row['session_token'] != $session_token)
					{
						$query = $this->db_connection->prepare("INSERT into logins (user_id, login_date, session_token) VALUES (?, ?, ?);");
						$query->bind_param('sss', $user_id, $currentTime, $session_token);
						$query->execute();
					}
				break;
				
				
				case "stop":
					$checkLogin = $this->db_connection->prepare("UPDATE logins set logout_date = ? WHERE session_token = ? AND user_id = ?;");
					$checkLogin->bind_param('sss', $currentTime, $session_token, $user_id);
					$checkLogin->execute();
				break;
			}
		}
		mysqli_close($this->db_connection);
	}
	
	public function getAllEmployees()
	{
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->set_charset("utf8"))
		{
			$this->errors[] = $this->db_connection->error;
		}

		if (!$this->db_connection->connect_error)
		{
			$query = $this->db_connection->prepare("SELECT * FROM users ORDER BY employee_id DESC;");
			$query->execute();
		
			$resultSet = $query->get_result();
			
			return $resultSet;
		}
	}
	
	public function getReport($id)
	{
		$userId = trim($id);
		
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->set_charset("utf8"))
		{
			$this->errors[] = $this->db_connection->error;
		}

		if (!$this->db_connection->connect_error)
		{
			$query = $this->db_connection->prepare("SELECT * FROM logins WHERE user_id = ?");
			$query->bind_param('s', $userId);
			$query->execute();
		
			$resultSet = $query->get_result();
			
			return $resultSet;
		}
	}
	
	public function getEmployeeInfoById($id)
	{
		$userId = trim($id);
		
		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->set_charset("utf8"))
		{
			$this->errors[] = $this->db_connection->error;
		}

		if (!$this->db_connection->connect_error)
		{
			$query = $this->db_connection->prepare("SELECT * FROM users WHERE user_id = ?");
			$query->bind_param('s', $userId);
			$query->execute();
		
			$resultSet = $query->get_result()->fetch_assoc();
			
			return $resultSet;
		}
	}
	
	public function deleteEmployee($id)
	{
		$userId = trim($id);
		
		if (preg_replace('/^(\-){0,1}[0-9]+(\.[0-9]+){0,1}/', '', $userId) == "") 
		{
			if ($userId == $_SESSION['user_id'])
			{
				return 1;
			}
			else
			{
				$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

				if (!$this->db_connection->set_charset("utf8"))
				{
					$this->errors[] = $this->db_connection->error;
				}

				if (!$this->db_connection->connect_error)
				{
					$query = $this->db_connection->prepare("DELETE FROM users WHERE user_id = ?;");
					$query->bind_param('i', $userId);
					$query->execute();
					
					return 2;
				}
				else
				{
					return 3;
				}
			}
		}
		else
		{
			return 3;
		}
	}
	
	public function isSamePass($oldPass, $newPass)
	{
		$user_id = $_SESSION['user_id'];

		$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->db_connection->set_charset("utf8"))
		{
			$this->errors[] = $this->db_connection->error;
		}

		if (!$this->db_connection->connect_error)
		{
			$query = $this->db_connection->prepare("SELECT user_password from users WHERE user_id = ?");
			$query->bind_param('s', $user_id);
			$query->execute();
			
			$result = $query->get_result();

			$row = $result->fetch_assoc();
			
			if (password_verify($oldPass, $row['user_password']))
			{
				if (strcmp($oldPass, $newPass) == 0)
				{
					return 1;
				}
				$user_password_hash = password_hash($newPass, PASSWORD_DEFAULT);
				$user_id = $_SESSION['user_id'];
			
				$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

				if (!$this->db_connection->set_charset("utf8"))
				{
					$this->errors[] = $this->db_connection->error;
				}

				if (!$this->db_connection->connect_error)
				{
					$query = $this->db_connection->prepare("UPDATE users SET user_password = ? WHERE user_id = ?");
					$query->bind_param('ss', $user_password_hash, $user_id);
					$query->execute();
					return 2;
				}
			}
			else
			{
				return 3;
			}
		}
	}
}