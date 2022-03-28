
<?php
	session_start();
	//判断用户是否在线
	if (empty($_SESSION['email'])){
		echo "<script> parent.location.href='Sign-In.php'; </script>";
	}else{
		$email = $_SESSION['email'];
		$name = $_SESSION['name'];
		$permission = $_SESSION['permission'];
		$position = $_SESSION['position'];
		$image = $_SESSION['image'];
		$user_id = $_SESSION['user_id'];
	} 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>program list</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body class="antialiased">
  <div class="wrapper">
			<header class="navbar navbar-expand-md navbar-light d-print-none">
			<div class="container-xl">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
					<a href="./Home.php">
					<img src="./static/ssi.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
					</a>
				</h1>
				<div class="navbar-nav flex-row order-md-last">
            <!-- <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span class="badge bg-red"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body">
                  message
                  </div>
                </div>
              </div>
            </div> -->
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/user/<?php echo $image ?>)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div><?php echo $name ?></div>
                  <div class="mt-1 small text-muted"><?php echo $position ?></div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="./Profile-Account.php" class="dropdown-item">Settings</a>
                <a href="index.php" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
			</div>
			</header>
			<div class="navbar-expand-md">
			<div class="collapse navbar-collapse" id="navbar-menu">
				<div class="navbar navbar-light">
					<div class="container-xl">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="./Home.php">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
							</span>
							<span class="nav-link-title">
								Home
							</span>
							</a>
						</li>
						<li class="nav-item active dropdown">
							<a class="nav-link" href="./Program.php">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
							</span>
							<span class="nav-link-title">
								Program
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./Work-Space.php" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
							</span>
							<span class="nav-link-title">
								Work Space
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./Internet-Forum.php">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" /></svg>
							</span>
							<span class="nav-link-title">
								Internet Forum
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./Users.php">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
							</span>
							<span class="nav-link-title">
								Teams
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./Profile-Account.php" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="9" x2="10" y2="9" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="9" y1="17" x2="15" y2="17" /></svg>
							</span>
							<span class="nav-link-title">
								Personal information 
							</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="page-wrapper">
			<div class="container-xl">
			<!-- Page title -->
				<div class="page-header d-print-none">
					<div class="row align-items-center">
						<!-- Page title actions -->
						<div class="col-auto ms-auto d-print-none">
							<div class="btn-list">
								<form action="Program.php" method="GET">
									<div class="input-icon">
										<span class="input-icon-addon">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
											<button id ="serch_submit" name="serch_submit" style="display: none"></button>	
										</span>
										<!-- 検索機能  -->	
										<input type="text" class="form-control" name="serch_version" aria-label="Search in website" placeholder="Search version...">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- VERSIONの表示  --> 
     	<div class="page-body">
			<div class="container-xl">
            	<div class="card">
              		<div class="card-body">
					  	<div class="accordion" id="accordion-example">
							<?php
								$i = 1;
								$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
								if (mysqli_connect_errno($conn)) { 
									die("连接 MySQL 失败: " . mysqli_connect_error()); 
								}
								mysqli_set_charset($conn, "utf8");
								if(isset($_GET['serch_submit'])){
									$serch_word =  $_GET['serch_version'];
									if ($permission == 1){
										$versionsql = "SELECT * FROM VERSION WHERE VERSION_NAME LIKE '%$serch_word%'";
									}else{
										$versionsql = "SELECT * FROM VERSION WHERE VERSION_NAME LIKE '%$serch_word%' AND VERSION_ID IN (SELECT VERSION_ID FROM VERSION_TEAMS WHERE TEAMS_ID IN (SELECT TEAMS_ID FROM TEAMS_USER WHERE USER_ID = $user_id ))";
									}
								}else{
									if ($permission == 1){
										$versionsql = "SELECT * FROM VERSION";
									}else{
										$versionsql = "SELECT * FROM VERSION WHERE VERSION_ID IN (SELECT VERSION_ID FROM VERSION_TEAMS WHERE TEAMS_ID IN (SELECT TEAMS_ID FROM TEAMS_USER WHERE USER_ID = $user_id ))";
									}
								}
								$versionresult = mysqli_query($conn, $versionsql);

								if (mysqli_num_rows($versionresult) == 0) {
									echo '<div class="empty">';
									echo '	<div class="empty-img"><img src="./static/illustrations/undraw_printing_invoices_5r4r.svg" height="128"  alt=""></div>';
									echo '	<p class="empty-title">No results found</p>';
									echo '	<p class="empty-subtitle text-muted">';
									echo '		Try adjusting your search or filter to find what you are looking for.';
									echo '	</p>';
									echo '</div>';
								}else{
									if ($versionresult->num_rows > 0) {
										while($versionrow = $versionresult->fetch_assoc()) {
											$version_id = $versionrow['VERSION_ID'];
											$version_name = $versionrow['VERSION_NAME'];
											$version_num = $versionrow['VERSION_NUM'];
											$version_createtime = date_format(new DateTime($versionrow['CREATE_TIME']), 'l d, Y');
											//$version_starttime = date_format(new DateTime($versionrow['START_TIME']), 'Y-m-d');
											//$version_endtime = date_format(new DateTime($versionrow['END_TIME']), 'Y-m-d');
											$version_about = $versionrow['ABOUT'];
											
										echo 	'<div class="accordion-item">';
										echo 		'<h2 class="accordion-header" id="heading-' . $i . '">';
										echo			'<button class="accordion-button ';
										if($i != 1){echo 'collapsed';}; 
										echo            '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $i . '" aria-expanded="';
										if($i != 1){echo 'false">';}else{echo 'true">';};
										echo              $version_name;
										/*
										echo				'<div class="col-10">' . $version_name . '</div>';
										echo				'<div class="col-2 text-center">' . $version_createtime . '</div>';
										*/
										echo			'</button>';
										echo   		'</h2>';
										echo    	'<div id="collapse-' . $i . '" class="accordion-collapse collapse ';
										if($i == 1){echo 'show';};
										echo		'" data-bs-parent="#accordion-example">';
										echo    		'<div class="accordion-body pt-0" >';//<a href="./Program-Info.php?' . $version_id . '" ></a>
										echo '				<div class="col-lg-12">';
										echo '					<div class="card-body">';
										echo '							<div class="mb-1">';
										echo '								<span class="badge bg-blue-lt">' . $version_num . '-beta</span> –';
										echo '								<span class="text-muted">' . $version_createtime . '</span>';
										echo '							</div>';
										echo '							<p>' . $version_about . '😁</p>';
										echo '							<ul>';
										$MODULE_sql = "SELECT * FROM VERSION AS V 
														JOIN VERSION_MODULE AS VM ON V.VERSION_ID = VM.VERSION_ID 
														JOIN MODULE AS M ON VM.MODULE_ID = M.MODULE_ID
														WHERE V.VERSION_ID = $version_id";
										$MODULE_result = mysqli_query($conn, $MODULE_sql);
	
										if ($MODULE_result->num_rows > 0) {
											while($MODULErow = $MODULE_result->fetch_assoc()) {
												$MODULE_NAME = $MODULErow['MODULE_NAME'];
												echo '						<li>Updated to ' . $MODULE_NAME . '</li>';
											}
										}
										echo '							</ul>';
										echo '							<div>';
										echo '								<div class="d-flex mb-1">';
										echo '									<p class="ms-auto">';
										echo '										<a href="./Program-Info.php?' . $version_id . '" class="d-flex align-items-center">';
										echo '											<svg xmlns="http://www.w3.org/2000/svg" class="icon pe-1 text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" /><line x1="10" y1="14" x2="20" y2="4" /><polyline points="15 4 20 4 20 9" /></svg>';
										echo '											More information';
										echo '										</a>';
										echo '									</p>';
										echo '								</div>';
										echo '							</div>';
										echo '					</div>';
										echo '				</div>';
										echo '			</div>';
										echo '		</div>';
										echo '	</div>';
										$i++;
									}
								}
								
								$conn->close();
							} 
							?>
						</div>
					</div>
					<?php
						if ($permission == 1){
							echo '<div class="card-footer text-center">';
							echo '	<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">';
							echo '		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>';
							echo '		Create New Version';
							echo '	</a>';
							echo '	<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">';
							echo '		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>';
							echo '	</a>';
							echo '</div>';
						}
					?>
				</div>
            </div>
         </div>
         <footer class="footer footer-transparent d-print-none">
         <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
               <div class="col-lg-auto ms-lg-auto">
               <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">SSIチーム：</li>
                  <li class="list-inline-item">葉 佳臨、高 讚鉉、尾﨑 光祐</li>
               </ul>
               </div>
               <div class="col-12 col-lg-auto mt-3 mt-lg-0">
               <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                     社内開発管理システム &copy; SK2A 
                  </li>
                  <li class="list-inline-item">
				  	2021年10月
                  </li>
               </ul>
               </div>
            </div>
         </div>
         </footer>
      </div>
	</div>
	<!-- create project -->
	<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
	　	<form action="./Version-Add.php" method="POST">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New project</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
          		<div class="modal-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="mb-3">
							<label class="form-label">Version name</label>
							<input type="text" class="form-control" name="version_name" placeholder="Your project name" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="mb-3">
							<label class="form-label">Start time</label>
							<input type="date" class="form-control" name="start_time" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="mb-3">
							<label class="form-label">End time</label>
							<input type="date" class="form-control" name="end_time" required>
							</div>
						</div>
						<div class="col-lg-12">
							<div>
							<label class="form-label">Additional information</label>
							<textarea class="form-control" rows="1" name="about" required></textarea>
							</div>
						</div>
					</div>
				</div>
		  		<div class="modal-body">
				  <label class="form-label">Which teams can see your project?</label>
				  	<div class="row">
						<?php
							$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
							if (mysqli_connect_errno($conn)) { 
								die("连接 MySQL 失败: " . mysqli_connect_error()); 
							}
							mysqli_set_charset($conn, "utf8");
							$TEAMSsql = "SELECT * FROM TEAMS";
							$TEAMSresult = mysqli_query($conn, $TEAMSsql);

							if ($TEAMSresult->num_rows > 0) {
								while($row = $TEAMSresult->fetch_assoc()) {
									$TEAMS_ID = $row['TEAMS_ID'];
									$TEAMS_NAME = $row['TEAMS_NAME'];
									
							echo '		<div class="col-lg-6">';
							echo '		<div class="mb-3">';
							echo '			<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">';
							echo '				<label class="form-selectgroup-item flex-fill">';
							echo '					<input type="checkbox" name="change-project-information[]" value="' . $TEAMS_ID . '" class="form-selectgroup-input" >';
							echo '					<div class="form-selectgroup-label d-flex align-items-center p-3">';
							echo '						<div class="me-3">';
							echo '							<span class="form-selectgroup-check"></span>';
							echo '						</div>';
							echo '						<div class="form-selectgroup-label-content d-flex align-items-center">';
							echo '							<div>';
							echo '								<div class="font-weight-medium">'.$TEAMS_NAME.'</div>';
							echo '							</div>';
							echo '						</div>';
							echo '					</div>';
							echo '				</label>';
							echo '			</div>';
							echo '		</div>';
							echo '	</div>';
							}
							$conn->close();
						} 
						?>
					</div>
				</div>
          		<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
					Cancel
					</a>
					<button type="submit" name="version-add" class="btn btn-primary ms-auto">Create New Version</button>
          		</div>
        	</div>
      	</div>
		</from>
    </div>
	<!-- Tabler Core -->
	<script src="./dist/js/tabler.min.js"></script>
	</body>
</html>