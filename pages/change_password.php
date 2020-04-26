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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="author" content="Danonek"/>
        <title>Employee App :: Dashboard</title>
		<link rel="icon" type="image/png" href="assets/icon.png"/>
        <script src="assets/js/all.min.js"></script>
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/tables.css" rel="stylesheet"/>
    </head>
	
    <body class="sb-nav-fixed" onload=display_ct();>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="cp.php">Employee App</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="color: rgba(255, 255, 255, 0.5);" id="ct"></div>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="password.php"><i class="fas fa-key mr-2"></i>Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php?token=<?= $_SESSION['token'] ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
				<?php $functions->getSidebar(); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
						<h1 class="mt-4">Change Password</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="cp.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Change Password</li>
						</ol>
                        <div class="card mb-4">

						   <form class="form-card" action="password.php?token=<?= $_SESSION['token'] ?>" method="post" id="center" autocomplete="off">
								<div class="form-group">
									<label class="small mb-1">Current Password</label>
									<input class="form-control py-4" type="password" placeholder="Current Password" name="old_password" required/>
								</div>
								<div class="form-group">
									<label class="small mb-1">New Password</label>
									<input class="form-control py-4" type="password" placeholder="New Password" name="new_password" required/>
								</div>
								<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
									<?php
										if (isset($samePass))
										{
											switch($samePass)
											{
												case 1:
												?>
													<p class="small-error">	
													<?php
													echo "Password must be different from the password already used.";
													?>
													</p>
												<?php
												break;	
												
												case 2:
												?>
													<p class="small-message">	
													<?php
													echo "Password changed successfully!";
													?>
													</p>
													<?php
												break;	

												case 3:
												?>
													<p class="small-error">	
													<?php
													echo "Incorrect Password!";
													?>
													</p>
													<?php
												break;
											}
										}
										else
										{
											?>
											<div></div>
											<?php
										}
									?>
									<input class="btn btn-primary" type="submit" name="login"></input>
								</div>
							</form>
                        </div> 
                    </div>
                </main>
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