<?php
if (!isset($file_included))
{
?>
	<html>
	<head><title>404 Not Found</title></head>
	<body bgcolor="white">
	<center><h1>404 Not Found</h1></center>
	<hr><center>nginx</center>
	</body>
	</html>
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
<?php
}
else
{
	if (isset($registration))
	{
		if ($registration->errors) 
		{
			foreach ($registration->errors as $error) 
			{
				echo $error;
			}
		}
		if ($registration->messages)
		{
			foreach ($registration->messages as $message)
			{
				echo $message;
			}
		}
	}
?>
<html>
		<head>
			<title>Employee App :: Add Employee</title>
			<link rel="stylesheet" href="assets/css/style.css">
			<link rel="icon" type="image/png" href="assets/icon.png">		
		</head>
		
		<body>
			<div class="card" id="center">
				<div class="card-body-center">
					<form method="post" action="register.php" name="registerform">

						<label for="login_input_userlogin">Login (only letters and numbers, 2 to 64 characters)</label>
						<input id="login_input_userlogin" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_login" required />
						<br>
						<br>
						
						<label for="login_input_firstname">First Name (only letters and numbers, 2 to 64 characters)</label>
						<input id="login_input_firstname" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_firstname" required />
						<br>
						<br>		
						
						<label for="login_input_surname">Surname (only letters and numbers, 2 to 64 characters)</label>
						<input id="login_input_surname" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_surname" required />
						<br>
						<br>	
						
						<label for="login_input_address">Address (only letters and numbers, 2 to 64 characters)</label>
						<input id="login_input_address" class="form-control" type="text" pattern="{2,64}" name="user_address" required />
						<br>
						<br>		
						
						
						<label for="login_input_title">Job title (only letters and numbers, 2 to 64 characters)</label>
						<input id="login_input_title" class="form-control" type="text" pattern="{2,64}" name="user_title" required />
						<br>
						<br>	

						<label for="login_input_phone">Phone Number (only numbers)</label>
						<input id="login_input_phone" class="form-control" type="number" name="user_phone" required />
						<br>
						<br>
						
						<label for="login_input_employee_id">Employee ID (only numbers)</label>
						<input id="login_input_employee_id" class="form-control" type="number" name="employee_id" required />
						<br>
						<br>			
						
						<label for="login_input_birthday">Birthday</label>
						<input id="login_input_birthday" type="date" data-format="DD/MMMM/YYYY" class="form-control" name="user_birthday" required />
						<br>	
						<br>

						<label for="login_input_password">Password (min. 6 characters)</label>
						<input id="login_input_password" class="form-control" type="password" name="user_password" pattern=".{6,}" required autocomplete="off" />
						<br>	
						<br>	

						<label for="login_input_password_repeat">Repeat password</label>
						<input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
						<br>
						<br>
						
						<input type="submit"  name="register" value="Register" />

					</form>

					<a href="index.php">Back to Login Page</a>
				</div>
			</div>
		</body>
	</html>
<?php
}
?>