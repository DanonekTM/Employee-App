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
						<h1 class="mt-4">Employee Report</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="cp.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Employee Report</li>
						</ol>
						<div class="card mb-4">
							<div class="card-header"><i class="fas fa-table mr-1"></i>Employee Report</div>
							<div class="card-body">
							
								<?php 
									$employees = $functions->getAllEmployees();
									
									if (mysqli_num_rows($employees) == 0)
									{
										?>
										<p>No Records</p>
										<?php
									}
									else
									{
										?>
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Employee ID</th>
													<th>Name</th>
													<th>Surname</th>
													<th>Birthday</th>
													<th>Address</th>
													<th>Phone Number</th>
													<th>Employee Title</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($employees as $employee)
												{
												?>
													<tr>
														<td><?php echo $employee['employee_id']; ?></td>
														<td><?php echo $employee['user_firstname']; ?></td>
														<td><?php echo $employee['user_surname']; ?></td>
														<td><?php echo $employee['user_birthday']; ?></td>
														<td><?php echo $employee['user_address']; ?></td>
														<td><?php echo $employee['user_phone']; ?></td>
														<td><?php echo $employee['user_title']; ?></td>
														<td class="center-td"><a href="?userId=<?php echo $employee['user_id']; ?>"><i class="fas fa-eye"></i></td>
													</tr>
												<?php
												}
												?>
											</tbody>
											</table>
										</div>
									<?php
									}
								?>
							</div>
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
