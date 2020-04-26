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
else if (isset($_SESSION['session_started']) && $_SESSION['session_started'])
{
	if ($login->isUserLoggedIn())
	{
		include("pages/control_panel.php");
	}
	else
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
}
else
{
?>	
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="author" content="Danonek"/>
		<title>Employee App :: Start</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
		<link rel="icon" type="image/png" href="assets/icon.png"/>	
        <script src="assets/js/all.min.js"></script>
    </head>
    <body>
        <div id="layoutPre">
            <div id="layoutPre_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <h1 class="display-4">Hello,</h1>
                                    <p class="display-4"><?php echo $_SESSION['user_firstname'] . " " . $_SESSION['user_surname']?>.</p>
                                    <p class="lead"><?php echo $functions->getCurrentDate(); ?> </p>
									<?php
										if ($functions->isBirthday())
										{
									?>
											<p class="lead">Happy Birthday ;)</p>
									<?php
										}
									?>
                                    
                                    <a class="btn btn-primary" href="cp.php"><i class="fas fa-play-circle mr-1"></i>Start Session</a>
									<br>
									<br>
                                    <a class="btn btn-primary" href="logout.php?token=<?= $_SESSION['token'] ?>"><i class="fas fa-power-off mr-1"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutPre_footer">
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
