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
	$security = new CSRF();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="author" content="Danonek"/>
        <title>Employee App :: Login</title>
        <link href="assets/css/style.css" rel="stylesheet"/>
		<link rel="icon" type="image/png" href="assets/icon.png"/>
        <script src="assets/js/all.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                       <form class="form-card" action="index.php" method="post" id="center" autocomplete="off">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Login</label><input class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Enter Login" name="user_login" required/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter Password" name="user_password" required/></div>
											<input type="hidden" name="token" id="token" value="<?php echo $security->GenerateToken(); ?>">
											<div class="form-group"><label class="small mb-1" for="inputPassword">Captcha</label>
											<p><img class="captcha" src="libraries/captcha.php" width="120" height="30" border="1"></p>
											<input class="form-control py-4" id="inputPassword" type="text" placeholder="Enter Captcha" name="captcha" required/></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
												<p class="small-error">
												<?php 
													if (isset($login)) 
													{
														if ($login->errors)
														{
															foreach ($login->errors as $error) 
															{
																echo $error;
															}
														}
													}
												?>
												</p>
												<input class="btn btn-primary" type="submit" name="login"></input>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Danonek <?= date('Y');?></div>
                            <div>
                                <a href="https://github.com/DanonekTM">Github</a>
                                &middot;
                                <a href="https://danonek.dev/portfolio">Portfolio</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
		<script src="assets/js/jquery-3.5.0.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		<script src="assets/js/scripts.js"></script>
    </body>
</html>

<?php
}
?>
