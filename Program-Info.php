<?php
session_start();
//判断用户是否在线
if (empty($_SESSION['email'])) {
	echo "<script> parent.location.href='sign-in.php'; </script>";
} else {
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$permission = $_SESSION['permission'];
	$position = $_SESSION['position'];
	$image = $_SESSION['image'];
	$user_id = $_SESSION['user_id'];

	$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
	if (mysqli_connect_errno($conn)) {
		die("连接 MySQL 失败: " . mysqli_connect_error());
	}
	mysqli_set_charset($conn, "utf8");
	$program_id = $_SERVER["QUERY_STRING"]; // 获取url里的teams id 
	$sql = "SELECT * FROM VERSION WHERE VERSION_ID =  '$program_id'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$version_name = $row['VERSION_NAME'];
			$version_num = $row['VERSION_NUM'];
			//$version_createtime = date_format(new DateTime($versionrow['CREATE_TIME']), 'l d, Y');
			//$create_time = date_format(new DateTime($row['CREATE_TIME']), 'Y-m-d');
			$start_time = date_format(new DateTime($row['START_TIME']), 'Y-m-d');
			$end_time = date_format(new DateTime($row['END_TIME']), 'Y-m-d');
			$version_about = $row['ABOUT'];
		}
		$conn->close();
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Program's information</title>
	<!-- CSS files -->
	<link href="./dist/css/tabler.min.css" rel="stylesheet" />
	<link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
	<link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
	<link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
	<link href="./dist/css/demo.min.css" rel="stylesheet" />
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
					<div class="nav-item dropdown">
						<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
							<span class="avatar avatar-sm" style="background-image: url(./static/user/<?php echo $image ?>)"></span>
							<div class="d-none d-xl-block ps-2">
								<div><?php echo $name ?></div>
								<div class="mt-1 small text-muted"><?php echo $position ?></div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
							<a href="#" class="dropdown-item">Settings</a>
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
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<polyline points="5 12 3 12 12 3 21 12 19 12" />
											<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
											<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
										</svg>
									</span>
									<span class="nav-link-title">
										Home
									</span>
								</a>
							</li>
							<li class="nav-item active dropdown">
								<a class="nav-link" href="./Program.php">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
											<line x1="12" y1="12" x2="20" y2="7.5" />
											<line x1="12" y1="12" x2="12" y2="21" />
											<line x1="12" y1="12" x2="4" y2="7.5" />
											<line x1="16" y1="5.25" x2="8" y2="9.75" />
										</svg>
									</span>
									<span class="nav-link-title">
										Program
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./Work-Space.php">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<polyline points="9 11 12 14 20 6" />
											<path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
										</svg>
									</span>
									<span class="nav-link-title">
										Work Space
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<rect x="4" y="4" width="6" height="5" rx="2" />
											<rect x="4" y="13" width="6" height="7" rx="2" />
											<rect x="14" y="4" width="6" height="7" rx="2" />
											<rect x="14" y="15" width="6" height="5" rx="2" />
										</svg>
									</span>
									<span class="nav-link-title">
										Internet Forum
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./Users.php">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
										</svg>
									</span>
									<span class="nav-link-title">
										Teams
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./Profile-Account.php">
									<span class="nav-link-icon d-md-none d-lg-inline-block">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M14 3v4a1 1 0 0 0 1 1h4" />
											<path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
											<line x1="9" y1="9" x2="10" y2="9" />
											<line x1="9" y1="13" x2="15" y2="13" />
											<line x1="9" y1="17" x2="15" y2="17" />
										</svg>
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
		</div>
	</div>
	</div>
	<div class="page-wrapper">
		<div class="page-body">
			<div class="container-xl">
				<div class="row row-cards">
					<div class="col-lg-9">
						<ul type="disc">
							<!-------  表格输出  ---------->
							<div class="col-12">
								<div class="card">
									<div class="card-body border-bottom py-3">
										<div class="table-responsive">
											<table class="table table-vcenter table-mobile-md card-table" id="table">
												<thead>
													<tr>
														<th>Module</th>
														<th>Function</th>
														<th>Leader</th>
														<th>UI Designer</th>
														<th>Developer</th>
														<th>Tester</th>
														<?php if ($permission == 1) {
															echo '<th class="w-1"></th>';
														} ?>
													</tr>
												</thead>
												<tbody>
													<?php
													$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
													if (mysqli_connect_errno($conn)) {
														die("连接 MySQL 失败: " . mysqli_connect_error());
													}
													mysqli_set_charset($conn, "utf8");

													
													$sql_module = "SELECT M.MODULE_NAME, F.FUNCTION_ID, F.FUNCTION_NAME, A.USER_NAME AS LEADER, F.UI_DESIGNER as UI_DESIGNER_NUM, B.USER_NAME AS UI_DESIGNER, F.DEVELOPER as DEVELOPER_NUM, C.USER_NAME AS DEVELOPER, F.TESTER as TESTER_NUM, D.USER_NAME AS TESTER, F.OWNER as OWNER_NUM, E.USER_NAME AS OWNER
																			FROM VERSION_MODULE AS VM
																			JOIN MODULE AS M ON VM.MODULE_ID = M.MODULE_ID 
																			JOIN MODULE_FUNCTION AS MF ON M.MODULE_ID = MF.MODULE_ID
																			JOIN FUNCTION AS F ON MF.FUNCTION_ID = F.FUNCTION_ID
																			JOIN USER AS A ON F.LEADER = A.USER_id
																			JOIN USER AS B ON F.UI_DESIGNER = B.USER_id
																			JOIN USER AS C ON F.DEVELOPER = C.USER_id
																			JOIN USER AS D ON F.TESTER = D.USER_id
																			JOIN USER AS E ON F.TESTER = E.USER_id
																			AND VM.VERSION_ID = '$program_id'";
													$result = mysqli_query($conn, $sql_module);
													$i = 1;
													if ($result->num_rows > 0) {
														while ($row = $result->fetch_assoc()) {
															$module_name = $row['MODULE_NAME'];
															$function_id = $row['FUNCTION_ID'];
															$function_name = $row['FUNCTION_NAME'];
															$LEADER = $row['LEADER'];
															$UI_DESIGNER = $row['UI_DESIGNER'];
															$DEVELOPER = $row['DEVELOPER'];
															$TESTER = $row['TESTER'];
															$OWNER = $row['OWNER'];
															$UI_DESIGNER_NUM = $row['UI_DESIGNER_NUM'];
															$DEVELOPER_NUM = $row['DEVELOPER_NUM'];
															$TESTER_NUM = $row['TESTER_NUM'];
															$OWNER_NUM = $row['OWNER_NUM'];
															echo '<tr>';
															echo '<td>' . $module_name . '</td>';
															echo '<td>' . $function_name . '</td>';
															echo '<td>' . $LEADER . '</td>';

															if($UI_DESIGNER_NUM == $OWNER_NUM){
																echo '<td><span class="badge bg-warning me-1"></span>' . $UI_DESIGNER . '</td>';
																echo '<td><span class="badge bg-secondary me-1"></span>' . $DEVELOPER . '</td>';
																echo '<td><span class="badge bg-secondary me-1"></span>' . $TESTER . '</td>';
															}else if ($DEVELOPER_NUM == $OWNER_NUM){
																echo '<td><span class="badge bg-success me-1"></span>' . $UI_DESIGNER . '</td>';
																echo '<td><span class="badge bg-warning me-1"></span>' . $DEVELOPER . '</td>';
																echo '<td><span class="badge bg-secondary me-1"></span>' . $TESTER . '</td>';
															}else if ($TESTER_NUM == $OWNER_NUM){
																echo '<td><span class="badge bg-success me-1"></span>' . $UI_DESIGNER . '</td>';
																echo '<td><span class="badge bg-success me-1"></span>' . $DEVELOPER . '</td>';
																echo '<td><span class="badge bg-warning me-1"></span>' . $TESTER . '</td>';
															}else{
																echo '<td><span class="badge bg-success me-1"></span>' . $UI_DESIGNER . '</td>';
																echo '<td><span class="badge bg-success me-1"></span>' . $DEVELOPER . '</td>';
																echo '<td><span class="badge bg-success me-1"></span>' . $TESTER . '</td>';
															}
															if ($permission == 1) {
																echo '<td>';
																echo '<div class="btn-list flex-nowrap">';
																echo '<button class="btn btn-primary d-none d-sm-inline-block" name="edit_btn" id="' . $function_id . '">Edit</button>';
																echo '</div>';
																echo '</td>';
															}
															echo '</tr>';
														}
													}
													$conn->close();
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer text-center">
										<a href="#" class="btn btn-primary d-none d-sm-inline-block" id="insert_btn" data-bs-toggle="modal" data-bs-target="#modal-report">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<line x1="12" y1="5" x2="12" y2="19" />
												<line x1="5" y1="12" x2="19" y2="12" />
											</svg>
											Create
										</a>
										<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<line x1="12" y1="5" x2="12" y2="19" />
												<line x1="5" y1="12" x2="19" y2="12" />
											</svg>
										</a>
									</div>
								</div>
							</div>
						</ul>
					</div>
					<!-- 情報内容表示　-->
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center mb-3">
									<div class="me-3">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="7" y1="20" x2="17" y2="20" />
											<path d="M6 6l6 -1l6 1" />
											<line x1="12" y1="3" x2="12" y2="20" />
											<path d="M9 12l-3 -6l-3 6a3 3 0 0 0 6 0" />
											<path d="M21 12l-3 -6l-3 6a3 3 0 0 0 6 0" />
										</svg>
									</div>
									<div>
										<small class="text-muted">SSIチーム</small> <!-- 会社名 -->
										<h3 class="lh-1">
											<?php
											echo $version_name;
											echo '<span class="badge bg-blue-lt">' . $version_num . '-beta</span>'
											?>
										</h3>
									</div>
								</div>
								<div class="text-muted mb-3">
									<?php echo $version_about ?>
								</div>
								<div>
									<?php echo "Start Time : " . $start_time . "<br>" ?>
									<?php echo "End Time : " . $end_time . "<br><br>" ?>
								</div>
								<!-- 完成した機能 -->
								<?php
								$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
								if (mysqli_connect_errno($conn)) {
									die("连接 MySQL 失败: " . mysqli_connect_error());
								}
								mysqli_set_charset($conn, "utf8");
								$sql = "SELECT * FROM VERSION_MODULE,MODULE_FUNCTION,FUNCTION
												WHERE VERSION_MODULE.MODULE_ID = MODULE_FUNCTION.MODULE_ID AND
												MODULE_FUNCTION.FUNCTION_ID = FUNCTION.FUNCTION_ID AND
												VERSION_MODULE.VERSION_ID = '$program_id' AND
												FUNCTION.STATE = 1";
								$result = mysqli_query($conn, $sql);
								if ($result->num_rows > 0) {
									echo '<h4>';
									echo '	Completed';
									echo '</h4>';
									echo '<ul class="list-unstyled space-y-1">';
									while ($row = $result->fetch_assoc()) {
										$FUNCTION_NAME = $row['FUNCTION_NAME'];
										echo 		'<li>';
										echo 			'<svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>';
										echo 				$FUNCTION_NAME;
										echo 		'</li>';
									}
									$conn->close();
									echo '</ul>';
								}
								?>
								<!-- 未完成した機能 -->
								<?php
								$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
								if (mysqli_connect_errno($conn)) {
									die("连接 MySQL 失败: " . mysqli_connect_error());
								}
								mysqli_set_charset($conn, "utf8");
								$sql = "SELECT * FROM VERSION_MODULE,MODULE_FUNCTION,FUNCTION
												WHERE VERSION_MODULE.MODULE_ID = MODULE_FUNCTION.MODULE_ID AND
												MODULE_FUNCTION.FUNCTION_ID = FUNCTION.FUNCTION_ID AND
												VERSION_MODULE.VERSION_ID = '$program_id' AND
												FUNCTION.STATE = 0";
								$result = mysqli_query($conn, $sql);
								if ($result->num_rows > 0) {
									echo '<h4>';
									echo '	Uncompleted';
									echo '</h4>';
									echo '<ul class="list-unstyled space-y-1">';
									while ($row = $result->fetch_assoc()) {
										$FUNCTION_NAME = $row['FUNCTION_NAME'];
										echo 		'<li>';
										echo 			'<svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>';
										echo 				$FUNCTION_NAME;
										echo 		'</li>';
									}
									$conn->close();
									echo '</ul>';
								}
								?>
								<!-- 権限あるのチーム -->
								<?php
								$program_id = $_SERVER["QUERY_STRING"]; // 获取url里的teams id 
								$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
								if (mysqli_connect_errno($conn)) {
									die("连接 MySQL 失败: " . mysqli_connect_error());
								}
								mysqli_set_charset($conn, "utf8");
								$sql = "SELECT TEAMS_NAME FROM TEAMS
													WHERE TEAMS_ID in (SELECT TEAMS_ID FROM VERSION_TEAMS
													WHERE VERSION_ID = '$program_id')";
								$result = mysqli_query($conn, $sql);
								if ($result->num_rows > 0) {
									echo '<h4>';
									echo '	Permissions';
									echo '</h4>';
									echo '<ul class="list-unstyled space-y-1">';
									while ($row = $result->fetch_assoc()) {
										$TEAMS_NAME = $row['TEAMS_NAME'];
										echo 		'<li>';
										echo 			' <svg xmlns="http://www.w3.org/2000/svg" class="icon text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>';
										echo 				$TEAMS_NAME;
										echo 		'</li>';
									}
									$conn->close();
									echo '</ul>';
								}
								?>
							</div>
							<div class="card-footer text-end">
								<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#change-project">
									Change information
								</a>
							</div>
						</div>
					</div>
				</div>
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
	<!-- dailog -->
	<div class="modal fade modleDailog" id="report" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>
				<div class="modal-body">
					<input type="" name="dateId" id="dateId" value="" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- tables edit -->
	<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="function_detail">
					<form method="post" id="insert_form">
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">Module name</label>
									<input type="text" class="form-control" id="module_name" placeholder="Your project name" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">Function name</label>
									<input type="text" class="form-control" id="function_name" placeholder="Your project name" required>
								</div>
							</div>
							<!-- ユーザー選択を表示 -->
							<?php
							function user()
							{
								$user_out = '';
								$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB');
								if (mysqli_connect_errno($conn)) {
									die("连接 MySQL 失败: " . mysqli_connect_error());
								}
								mysqli_set_charset($conn, "utf8");
								$sql_leader = "SELECT USER_ID, USER_NAME FROM USER";
								$result_leader = mysqli_query($conn, $sql_leader);
								if ($result_leader->num_rows > 0) {
									while ($row = $result_leader->fetch_assoc()) {
										$user_id = $row['USER_ID'];
										$user_name = $row['USER_NAME'];

										$user_out .= '<option value="' . $user_id . '">' . $user_name . '</option>';
									}
								}
								mysqli_close($conn);
								return $user_out;
							}
							$output = '
							<div class="col-lg-3">
								<div>
									<label class="form-label">LEADER</label>
									<select type="text" id="leader_sel" class="form-select" value="">';
							$output .= user();
							$output .= '</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div>
									<label class="form-label">UI DESIGNER</label>
									<select type="text" id="ui_designer_sel" class="form-select" id="select-users" value="">';
							$output .= user();
							$output .= '</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div>
									<label class="form-label">DEVELOPER</label>
									<select type="text" id="developer_sel" class="form-select" placeholder="Select a date" id="select-users" value="">';
							$output .= user();
							$output .= '</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div>
									<label class="form-label">TESTER</label>
									<select type="text" id="tester_sel" class="form-select" placeholder="Select a date" id="select-users" value="">';
							$output .= user();
							$output .= '</select>
								</div>
							</div>';
							echo $output;
							?>
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">Start time</label>
									<div class="input-icon">
										<span class="input-icon-addon">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<rect x="4" y="5" width="16" height="16" rx="2" />
												<line x1="16" y1="3" x2="16" y2="7" />
												<line x1="8" y1="3" x2="8" y2="7" />
												<line x1="4" y1="11" x2="20" y2="11" />
												<line x1="11" y1="15" x2="12" y2="15" />
												<line x1="12" y1="15" x2="12" y2="18" />
											</svg>
										</span>
										<input type="date" class="form-control" id="date_start_time" min="<?php echo $start_time ?>" max="<?php echo $end_time ?>" required>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">End time</label>
									<div class="input-icon">
										<span class="input-icon-addon">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<rect x="4" y="5" width="16" height="16" rx="2" />
												<line x1="16" y1="3" x2="16" y2="7" />
												<line x1="8" y1="3" x2="8" y2="7" />
												<line x1="4" y1="11" x2="20" y2="11" />
												<line x1="11" y1="15" x2="12" y2="15" />
												<line x1="12" y1="15" x2="12" y2="18" />
											</svg>
										</span>
										<input type="date" class="form-control" id="date_end_time" min="<?php echo $start_time ?>" max="<?php echo $end_time ?>" required>
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
						Cancel
					</a>
					<button type="submit" name="update_btn" class="btn btn-primary update">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- change project -->
	<div class="modal modal-blur fade" id="change-project" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="./Version-Add.php" method="POST">
			<input id="program_id" type="hidden" value="<?php echo $program_id ?>">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Project Information</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="mb-3">
									<label class="form-label">Version name</label>
									<input type="text" class="form-control" name="version_name" value="<?php echo $version_name ?>" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="mb-3">
									<label class="form-label">Start time</label>
									<input type="date" class="form-control" name="start_time" value="<?php echo $start_time ?>" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="mb-3">
									<label class="form-label">End time</label>
									<input type="date" class="form-control" name="end_time" value="<?php echo $end_time ?>" required>
								</div>
							</div>
							<div class="col-lg-12">
								<div>
									<label class="form-label">Additional information</label>
									<textarea class="form-control" rows="2" name="about"><?php echo $version_about ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<label class="form-label">Which teams can see your project?</label>
						<div class="row">
							<?php
							$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB'); //连接数据库
							if (mysqli_connect_errno($conn)) {
								die("连接 MySQL 失败: " . mysqli_connect_error());
							}
							mysqli_set_charset($conn, "utf8");

							//入ったのチームを表示
							$TEAMS_IN_sql = "SELECT TEAMS_ID, TEAMS_NAME FROM TEAMS WHERE TEAMS_ID IN (SELECT TEAMS_ID FROM VERSION_TEAMS WHERE VERSION_ID = '$program_id')";
							$TEAMS_IN_result = mysqli_query($conn, $TEAMS_IN_sql);
							if ($TEAMS_IN_result->num_rows > 0) {
								while ($row = $TEAMS_IN_result->fetch_assoc()) {
									$TEAMS_ID = $row['TEAMS_ID'];
									$TEAMS_IN_NAME = $row['TEAMS_NAME'];

									echo '		<div class="col-lg-6">';
									echo '			<div class="mb-3">';
									echo '				<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">';
									echo '					<label class="form-selectgroup-item flex-fill">';
									echo '						<input type="checkbox" checked name="change-project-information[]" value="' . $TEAMS_ID . '" class="form-selectgroup-input" >';
									echo '						<div class="form-selectgroup-label d-flex align-items-center p-3">';
									echo '							<div class="me-3">';
									echo '								<span class="form-selectgroup-check"></span>';
									echo '							</div>';
									echo '							<div class="form-selectgroup-label-content d-flex align-items-center">';
									echo '								<div>';
									echo '									<div class="font-weight-medium">' . $TEAMS_IN_NAME . '</div>';
									echo '								</div>';
									echo '							</div>';
									echo '						</div>';
									echo '					</label>';
									echo '				</div>';
									echo '			</div>';
									echo '		</div>';
								}
							}

							//入ったのチームを表示
							$TEAMS_OUT_sql = "SELECT TEAMS_ID, TEAMS_NAME FROM TEAMS WHERE TEAMS_ID NOT IN (SELECT TEAMS_ID FROM VERSION_TEAMS WHERE VERSION_ID = '$program_id')";
							$TEAMS_OUT_result = mysqli_query($conn, $TEAMS_OUT_sql);
							if ($TEAMS_OUT_result->num_rows > 0) {
								while ($row = $TEAMS_OUT_result->fetch_assoc()) {
									$TEAMS_ID = $row['TEAMS_ID'];
									$TEAMS_OUT_NAME = $row['TEAMS_NAME'];

									echo '		<div class="col-lg-6">';
									echo '			<div class="mb-3">';
									echo '				<div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">';
									echo '					<label class="form-selectgroup-item flex-fill">';
									echo '						<input type="checkbox" name="change-project-information[]" value="' . $TEAMS_ID . '" class="form-selectgroup-input" >';
									echo '						<div class="form-selectgroup-label d-flex align-items-center p-3">';
									echo '							<div class="me-3">';
									echo '								<span class="form-selectgroup-check"></span>';
									echo '							</div>';
									echo '							<div class="form-selectgroup-label-content d-flex align-items-center">';
									echo '								<div>';
									echo '									<div class="font-weight-medium">' . $TEAMS_OUT_NAME . '</div>';
									echo '								</div>';
									echo '							</div>';
									echo '						</div>';
									echo '					</label>';
									echo '				</div>';
									echo '			</div>';
									echo '		</div>';
								}
							}

							$conn->close();
							?>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
							Cancel
						</a>
						<button type="submit" name="change-project" class="btn btn-primary ms-auto">Change</button>
					</div>
				</div>
			</div>
			</from>
	</div>
	<script>
		$(function() {
			$('.modleDailog').modal("hide");
		});

		function values(ID) {
			$('#dateId').val(ID);
		}
	</script>
	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="./dist/js/tabler.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script>
		$(document).ready(function() {
			//SELECT
			$(document).on('click', 'button[name="edit_btn"]', function() {
				var function_id = $(this).attr("id");
				if (function_id != '') {
					$.ajax({
						url: "function-sql.php",
						method: "POST",
						data: {
							function_id: function_id
						},
						success: function(data) {
							$('#function_detail').html(data);
							$('#modal-report').modal('show');
						}
					});
				}
				///UPDATE
				$(document).on('click', 'button[name="update_btn"]', function() {
					if ($('#module_name').val() == "") {
						alert("Name is empty");
					} else if ($('#function_name').val() == '') {
						alert("Function Name is empty");
					} else {
						module_name = $('#module_name').val();
						function_name = $('#function_name').val();
						leader_sel = $('#leader_sel option:selected').val();
						ui_designer_sel = $('#ui_designer_sel option:selected').val();
						developer_sel = $('#developer_sel option:selected').val();
						tester_sel = $('#tester_sel option:selected').val();
						$.ajax({
							url: "function-sql.php",
							method: "POST",
							data: {
								function_id: function_id,
								module_name: module_name,
								function_name: function_name,
								leader_sel: leader_sel,
								ui_designer_sel: ui_designer_sel,
								developer_sel: developer_sel,
								tester_sel: tester_sel
							},
							success: function(data) {
								location.reload();
							}
						});
					}
				});
			});

			//insert
			$(document).on('click', '#insert_btn', function() {
				var insert_sql = null;
				//Create -> Saveを押した時
				$(document).on('click', 'button[name="update_btn"]', function() {
					if ($('#module_name').val() == "") {
						alert("Name is empty");
					} else if ($('#function_name').val() == '') {
						alert("Function Name is empty");
					} else {
						insert_sql = "insert"; //insert命令実行の変数
						program_id = $('#program_id').val();
						module_name = $('#module_name').val();
						function_name = $('#function_name').val();
						leader_sel = $('#leader_sel option:selected').val();
						ui_designer_sel = $('#ui_designer_sel option:selected').val();
						developer_sel = $('#developer_sel option:selected').val();
						tester_sel = $('#tester_sel option:selected').val();
						date_start_time = $('#date_start_time').val();
						date_end_time = $('#date_end_time').val();
						// alert("insert_sql : "+insert_sql +"\n"+
						// 	"module_name : " + module_name+ "\n" +
						// 	"function_name :"+function_name + "\n" +
						// 	"leader_sel :" + leader_sel + "\n" + 
						// 	"ui_designer_sel : " + ui_designer_sel + "\n" + 
						// 	"developer_sel : " + developer_sel+ "\n" +
						// 	"tester_sel : " + tester_sel + "\n");
						//alert("startime : "+ date_start_time + "endtime : " + date_end_time);
						$.ajax({
							url: "function-insert.php",
							method: "POST",
							data: {
								insert_sql: insert_sql,
								program_id: program_id,
								module_name: module_name,
								function_name: function_name,
								leader_sel: leader_sel,
								ui_designer_sel: ui_designer_sel,
								developer_sel: developer_sel,
								tester_sel: tester_sel,
								date_start_time: date_start_time,
								date_end_time: date_end_time
							},
							success: function(data) {
								location.reload();
							}
						});
					}
				});
			});
		});
		
		function Submit() {
			var checkOne = false;                    //判断是否被选择条件
			var chboxVal = [];                       //存入被选中项的值
			var checkBox = $('input[name = change-project-information[]]'); //获得得到所的复选框

			for (var i = 0; i < checkBox.length; i++) {
			
				//如果有1个被选中时（jquery1.6以上还可以用if(checkBox[i].prop('checked')) 去判断checkbox是否被选中）
				if (checkBox[i].checked) {
					checkOne = true;
					chboxVal.push(checkBox[i].value)//将被选择的值追加到
				};
			};

			if (checkOne = false) {
				alert("Team　一以上を選んでください!");
			};
		};
	</script>
</body>

</html>