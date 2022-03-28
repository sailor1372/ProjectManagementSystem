
<?php
	session_start();
	//判断用户是否在线
	if (empty($_SESSION['email'])){
		echo "<script> parent.location.href='sign-in.php'; </script>";
	}else{
		$EMAIL = $_SESSION['email'];
		$email = $_SESSION['email'];
		$name = $_SESSION['name'];
		$position = $_SESSION['position'];
		$image = $_SESSION['image'];
		$my_user_id = $_SESSION['user_id'];
	} 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Users list</title>
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
						<li class="nav-item">
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
						<li class="nav-item active dropdown">
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
						<div class="col-auto ms-auto d-print-none">
							<div class="btn-list">
								<form action="" method="GET">
									<div class="input-icon">
										<span class="input-icon-addon">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
											<button id ="serch_submit" name="serch_submit" style="display: none"></button>	
										</span>
										<!-- 検索機能  -->	
										<input type="text" class="form-control" name="serch_user" aria-label="Search in website" placeholder="Search teams or user's name...">
									</div>
								</form>
							</div>
						</div>
				<!-- Page title actions 
				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
					<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
						Create New Team
					</a>
					<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
					</a>
					</div>
				</div>-->
					</div>
				</div>
			</div>
			<!-- TEAMSの表示  --> 
			<div class="page-body">
				<div class="container-xl">
					<div class="row row-cards">           
						<?php 
							$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
							if (mysqli_connect_errno($conn)) { 
								die("连接 MySQL 失败: " . mysqli_connect_error()); 
							}
							mysqli_set_charset($conn, "utf8");

							$teamsql = "SELECT * FROM TEAMS";
							$teamresult = mysqli_query($conn, $teamsql);
							if ($teamresult->num_rows > 0) {
								while($teamrow = $teamresult->fetch_assoc()) {
									$teams_name = $teamrow['TEAMS_NAME'];
									$teams_id = $teamrow['TEAMS_ID'];
									echo '<div class="col-md-6">';
									echo 	'<a class="list-group-item-action align-items-center" href="./Teams.php?'.$teams_id.'">';
									echo 	'<div class="card mb-3">';
									echo 		'<div class="card-header">';					
									echo 			'<h3 class="card-title">'.$teams_name.'</h3>';	
									echo 		'</div>';
									echo 		'<div class="card-body"> ';
									echo 			'<div class="row g-3">';

									$usersql = "SELECT * FROM USER JOIN TEAMS_USER
											ON  USER.USER_ID = TEAMS_USER.USER_ID
											JOIN TEAMS
											ON TEAMS_USER.TEAMS_ID = TEAMS.TEAMS_ID
											WHERE TEAMS.TEAMS_ID = '$teams_id'";   //後WHERE条件でGROUPの一員を呼び出す。
									$userresult = mysqli_query($conn, $usersql);
									if ($userresult->num_rows > 0) {
										while($userrow = $userresult->fetch_assoc()) {
											$image = $userrow['IMAGE'];
											$user_name = $userrow['USER_NAME'];
											$position = $userrow['POSITION'];
											echo 				'<div class="col-6">';  
											echo 					'<div class="row align-items-center">';
											echo 						'<a href="#" class="col-auto">';
											echo 							'<span class="avatar" style="background-image: url(./static/user/'.$image.')">';
											echo 						'</a>';
											echo 						'<div class="col text-truncate">';
											echo 							'<a href="#" class="text-body d-block text-truncate">'.$user_name.'</a>';
											echo 							'<small class="text-muted text-truncate mt-n1">'.$position.'</small>';
											echo 						'</div>';
											echo 					'</div>';
											echo 				'</div>';
										}
									}
									echo 			'</div>';
									echo 		'</div>';
									echo 	'</div>';
									echo 	'</a>';
									echo '</div>';
								}
								$conn->close();
							}
						?>
					</div>
				</div>
			</div>
			<div class="page-body">
				<!-- USERの表示 -->
				<div class="container-xl">
					<div class="row row-cards">
							<!--   繰り返し -->
							<?php 
								$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
								if (mysqli_connect_errno($conn)) { 
								die("连接 MySQL 失败: " . mysqli_connect_error()); 
								}
								mysqli_set_charset($conn, "utf8");		

								if(isset($_GET['serch_submit'])){
									$Serch_user = $_GET['serch_user'];
									$sql = "SELECT * FROM USER WHERE USER_NAME LIKE '%$Serch_user%'"; 
									echo "<script>alert('$sql');</script>";
									
								}else{
									$sql = "SELECT * FROM USER ";
								}
								
								$result = mysqli_query($conn, $sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$u_image = $row['IMAGE'];
										$u_user_name = $row['USER_NAME'];
										$u_position = $row['POSITION'];	
										$u_Permission = $row['Permission'];
										$u_tel = $row['TEL'];
										$u_mail = $row['EMAIL'];
										$user_id = $row['USER_ID'];		
										$trans = array("(" => "", ")" => "");
										$u_tel = strtr($u_tel, $trans);			
										echo '<div class="col-md-6 col-lg-3">';
										echo '	<div class="card">';
										echo '		<div class="card-body p-4 text-center">';
										echo 			'<span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url(./static/user/'.$u_image.')"></span>';
										if($user_id == $my_user_id){
											echo 			'<a href="./Profile-Account.php">';	
										}else{
											echo 			'<a href="./User-Name-Click-Profile.php?'.$user_id.'">';	
										}
														
										echo 				'<h3 class="m-0 mb-1">'.$u_user_name.'</h3>';	
										echo 			'</a>';
										echo '		<div class="text-muted">'.$u_position.'</div>';
										echo '		<div class="mt-3">';
										if($u_Permission == 1){
											echo '<span class="badge bg-purple-lt">Owner</span>';
										}else{
											echo '<span class="badge bg-green-lt">Admin</span>';
										}
										echo '		</div>';
										echo '		</div>';
										echo '		<div class="d-flex">';
										echo '		<a href="mailto:' . $u_mail . '" $body=こんにちは" class="card-btn">';
										echo '			<svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>';
										echo '			Email</a>';
										echo '		<a href="tel:' . $u_tel . '" class="card-btn">';
										echo '			<svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>';
										echo '			Call</a>';
										echo '		</div>';
										echo '	</div>';
										echo '</div>';
									}
								}
								$conn->close();
							?>
					</div>
						<!-- prev next bar
					<div class="d-flex mt-4">
					<ul class="pagination ms-auto">
						<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
							--- Download SVG icon from http://tabler-icons.io/i/chevron-left 
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
							prev
						</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item active"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item">
						<a class="page-link" href="#">
							next -- Download SVG icon from http://tabler-icons.io/i/chevron-right 
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
						</a>
						</li>
					</ul>
					</div>
						-->
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
	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="./dist/js/tabler.min.js"></script>
	</body>
</html>