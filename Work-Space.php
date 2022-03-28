<?php
session_start();
//判断用户是否在线
if (empty($_SESSION['email'])) {
	echo "<script> parent.location.href='Sign-In.php'; </script>";
} else {
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
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Your work space</title>
	<!-- CSS files -->
	<style>
		div.move1 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
		}

		div.move2 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: .2s
		}

		div.move3 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: .4s
		}

		div.move4 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: .6s
		}

		div.move5 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: .8s
		}

		div.move6 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: 1s
		}

		div.move7 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: 1.2s
		}

		div.move8 {
			animation-fill-mode: both;
			animation-duration: 1s;
			animation-name: slidein;
			animation-delay: 1.4s
		}

		@keyframes slidein {
			from {
				margin-left: -300%;
				width: 100%;
			}

			to {
				margin-left: 0%;
				width: 100%;
			}
		}
	</style>
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
					<!-- <div class="nav-item dropdown d-none d-md-flex me-3">
						<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
								<path d="M9 17v1a3 3 0 0 0 6 0v-1" />
							</svg>
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
							<li class="nav-item">
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
							<li class="nav-item active dropdown">
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
								<a class="nav-link" href="./Internet-Forum.php">
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
			<div class="page-wrapper">
				<!-- <div class="container-xl">
					<div class="page-header d-print-none">
						<div class="row align-items-center">
							<div class="col-auto ms-auto d-print-none">
								<div class="form-selectgroup form-selectgroup-pills">
									<label class="form-selectgroup-item">
										<input type="checkbox" name="icons" value="home" class="form-selectgroup-input" checked>
										<span class="form-selectgroup-label">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkup-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
												<rect x="9" y="3" width="6" height="4" rx="2"></rect>
												<path d="M9 14h.01"></path>
												<path d="M9 17h.01"></path>
												<path d="M12 16l1 1l3 -3"></path>
											</svg>
											Working(1)
										</span>
									</label>
									<label class="form-selectgroup-item">
										<input type="checkbox" name="icons" value="user" class="form-selectgroup-input" checked>
										<span class="form-selectgroup-label">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M12 9v2m0 4v.01"></path>
												<path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
											</svg>
											Danger(1)
										</span>
									</label>
									<label class="form-selectgroup-item">
										<input type="checkbox" name="icons" value="circle" class="form-selectgroup-input" checked>
										<span class="form-selectgroup-label">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<circle cx="12" cy="12" r="9" />
												<polyline points="12 7 12 12 15 15" />
											</svg>
											Warning(1)
										</span>
									</label>
									<label class="form-selectgroup-item">
										<input type="checkbox" name="icons" value="square" class="form-selectgroup-input">
										<span class="form-selectgroup-label">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path d="M5 12l5 5l10 -10" />
											</svg>
											Success(1)
										</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="page-body">
					<div class="container-xl">
						<?php
						$output = '';
						$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB');
						if (mysqli_connect_errno($conn)) {
							die("连接 MySQL 失败: " . mysqli_connect_error());
						}
						mysqli_set_charset($conn, "utf8");
						$sql_select = "SELECT * FROM FUNCTION as F ,MODULE, MODULE_FUNCTION, VERSION, VERSION_MODULE WHERE 
											(F.LEADER = '$user_id'  OR
											F.UI_DESIGNER = '$user_id' OR	
											F.DEVELOPER = '$user_id' OR
											F.TESTER = '$user_id' ) AND 
											MODULE.MODULE_ID = MODULE_FUNCTION.MODULE_ID AND
											F.FUNCTION_ID = MODULE_FUNCTION.FUNCTION_ID AND
											VERSION_MODULE.VERSION_ID = VERSION.VERSION_ID AND
											VERSION_MODULE.MODULE_ID = MODULE.MODULE_ID AND";

						$SQL_RED1 = $sql_select . " F.STATE = 0 AND now() > F.END_TIME AND F.OWNER = '$user_id'";
						$SQL_ORANGE = $sql_select . " F.STATE = 0 AND now() <= F.END_TIME AND F.OWNER = '$user_id'";
						$SQL_RED2 = $sql_select . " F.STATE = 0 AND now() > F.END_TIME AND F.OWNER != '$user_id'";
						$SQL_BLUE = $sql_select . " F.STATE = 0 AND now() <= F.END_TIME AND F.OWNER != '$user_id'";
						$SQL_GREEN = $sql_select . " F.STATE != 0";

						$slide = 1;

						$result_select = mysqli_query($conn, $SQL_RED1);
						if ($result_select->num_rows > 0) {
							while ($row = $result_select->fetch_assoc()) {
								$LEADER = $row['LEADER'];
								$UI_DESIGNER = $row['UI_DESIGNER'];
								$DEVELOPER = $row['DEVELOPER'];
								$TESTER = $row['TESTER'];
								$OWNER = $row['OWNER'];
								$STATE = $row['STATE'];
								$VERSION_NAME = $row['VERSION_NAME'];
								$MODULE_NAME = $row['MODULE_NAME'];
								$FUNCTION_ID = $row['FUNCTION_ID'];
								$FUNCTION_NAME = $row['FUNCTION_NAME'];
								$SITUATION = 'danger';
								$note = 'Not finish yet! Please check it out!';
								job(
									$user_id,
									$LEADER,
									$UI_DESIGNER,
									$DEVELOPER,
									$TESTER,
									$OWNER,
									$STATE,
									$VERSION_NAME,
									$MODULE_NAME,
									$FUNCTION_ID,
									$FUNCTION_NAME,
									$SITUATION,
									$slide,
									$note
								);
								$slide++;
							}
						}

						$result_select = mysqli_query($conn, $SQL_ORANGE);
						if ($result_select->num_rows > 0) {
							while ($row = $result_select->fetch_assoc()) {
								$LEADER = $row['LEADER'];
								$UI_DESIGNER = $row['UI_DESIGNER'];
								$DEVELOPER = $row['DEVELOPER'];
								$TESTER = $row['TESTER'];
								$OWNER = $row['OWNER'];
								$STATE = $row['STATE'];
								$VERSION_NAME = $row['VERSION_NAME'];
								$MODULE_NAME = $row['MODULE_NAME'];
								$FUNCTION_ID = $row['FUNCTION_ID'];
								$FUNCTION_NAME = $row['FUNCTION_NAME'];
								$SITUATION = 'warning';
								$note = 'This is your job, please confirm as soon as possible.';
								job(
									$user_id,
									$LEADER,
									$UI_DESIGNER,
									$DEVELOPER,
									$TESTER,
									$OWNER,
									$STATE,
									$VERSION_NAME,
									$MODULE_NAME,
									$FUNCTION_ID,
									$FUNCTION_NAME,
									$SITUATION,
									$slide,
									$note
								);
								$slide++;
							}
						}

						$result_select = mysqli_query($conn, $SQL_RED2);
						if ($result_select->num_rows > 0) {
							while ($row = $result_select->fetch_assoc()) {
								$LEADER = $row['LEADER'];
								$UI_DESIGNER = $row['UI_DESIGNER'];
								$DEVELOPER = $row['DEVELOPER'];
								$TESTER = $row['TESTER'];
								$OWNER = $row['OWNER'];
								$STATE = $row['STATE'];
								$VERSION_NAME = $row['VERSION_NAME'];
								$MODULE_NAME = $row['MODULE_NAME'];
								$FUNCTION_ID = $row['FUNCTION_ID'];
								$FUNCTION_NAME = $row['FUNCTION_NAME'];
								$SITUATION = 'danger';
								$note = 'Not finish yet! Please check it out!';
								job(
									$user_id,
									$LEADER,
									$UI_DESIGNER,
									$DEVELOPER,
									$TESTER,
									$OWNER,
									$STATE,
									$VERSION_NAME,
									$MODULE_NAME,
									$FUNCTION_ID,
									$FUNCTION_NAME,
									$SITUATION,
									$slide,
									$note
								);
								$slide++;
							}
						}

						$result_select = mysqli_query($conn, $SQL_BLUE);
						if ($result_select->num_rows > 0) {
							while ($row = $result_select->fetch_assoc()) {
								$LEADER = $row['LEADER'];
								$UI_DESIGNER = $row['UI_DESIGNER'];
								$DEVELOPER = $row['DEVELOPER'];
								$TESTER = $row['TESTER'];
								$OWNER = $row['OWNER'];
								$STATE = $row['STATE'];
								$VERSION_NAME = $row['VERSION_NAME'];
								$MODULE_NAME = $row['MODULE_NAME'];
								$FUNCTION_ID = $row['FUNCTION_ID'];
								$FUNCTION_NAME = $row['FUNCTION_NAME'];
								$SITUATION = 'info';
								$note = 'Your partner is doing this work...';
								job(
									$user_id,
									$LEADER,
									$UI_DESIGNER,
									$DEVELOPER,
									$TESTER,
									$OWNER,
									$STATE,
									$VERSION_NAME,
									$MODULE_NAME,
									$FUNCTION_ID,
									$FUNCTION_NAME,
									$SITUATION,
									$slide,
									$note
								);
								$slide++;
							}
						}

						$result_select = mysqli_query($conn, $SQL_GREEN);
						if ($result_select->num_rows > 0) {
							while ($row = $result_select->fetch_assoc()) {
								$LEADER = $row['LEADER'];
								$UI_DESIGNER = $row['UI_DESIGNER'];
								$DEVELOPER = $row['DEVELOPER'];
								$TESTER = $row['TESTER'];
								$OWNER = $row['OWNER'];
								$STATE = $row['STATE'];
								$VERSION_NAME = $row['VERSION_NAME'];
								$MODULE_NAME = $row['MODULE_NAME'];
								$FUNCTION_ID = $row['FUNCTION_ID'];
								$FUNCTION_NAME = $row['FUNCTION_NAME'];
								$SITUATION = 'success';
								$note = 'Wow! This work had been finished!';
								job(
									$user_id,
									$LEADER,
									$UI_DESIGNER,
									$DEVELOPER,
									$TESTER,
									$OWNER,
									$STATE,
									$VERSION_NAME,
									$MODULE_NAME,
									$FUNCTION_ID,
									$FUNCTION_NAME,
									$SITUATION,
									$slide,
									$note
								);
								$slide++;
							}
						}

						mysqli_close($conn);

						?>


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
			</div>

			<?php
			//php function
			function job(
				$user_id,
				$LEADER,
				$UI_DESIGNER,
				$DEVELOPER,
				$TESTER,
				$OWNER,
				$STATE,
				$VERSION_NAME,
				$MODULE_NAME,
				$FUNCTION_ID,
				$FUNCTION_NAME,
				$SITUATION,
				$slide,
				$note
			) {
				echo '
		<div class="move' . $slide . '">
			<div class="alert alert-' . $SITUATION . '" role="alert">
				<div class="d-flex">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
					</div>
					<div class="col">
						<div  role="alert" id="heading-' . $slide . '" data-bs-toggle="collapse" data-bs-target="#collapse-' . $slide . '" aria-expanded="false">
							<h4 class="alert-title">' . $note . '</h4>
							<div class="text-muted">
								<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
									<li class="breadcrumb-item">' . $VERSION_NAME . '</li>
									<li class="breadcrumb-item">' . $MODULE_NAME . '</li>
									<li class="breadcrumb-item active" aria-current="page">' . $FUNCTION_NAME . '</li>
								</ol>
							</div>
						</div>
						<div id="collapse-' . $slide . '" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
							
						<!-- Timelines button -->
							<div id="heading-' . $slide . '1" data-bs-toggle="collapse" data-bs-target="#collapse-' . $slide . '1" aria-expanded="false">
								<div class="hr-text">Timelines</div>
							</div>
							<!-- Timelines内容 -->
							<div id="collapse-' . $slide . '1" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
								<div class="mb-3">
									<ul class="list list-timeline">';

				$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB');
				if (mysqli_connect_errno($conn)) {
					die("连接 MySQL 失败: " . mysqli_connect_error());
				}
				mysqli_set_charset($conn, "utf8");

				/*
				$sql_select = "SELECT FT.ID, FT.CREATE_TIME, FT.FUNCTION_ID, F.FUNCTION_NAME,
				FT.USER_ID,
				T.USER_NAME AS USER_NAME,
				FT.direction,
				T.IMAGE AS IMAGE,
				A.USER_NAME AS LEADER
				FROM FUNCTION_TIMELINE AS FT
				JOIN FUNCTION AS F ON FT.FUNCTION_ID = F.FUNCTION_ID
				JOIN USER AS T ON FT.USER_ID = T.USER_id
				JOIN USER AS A ON F.LEADER = A.USER_id
				AND FT.FUNCTION_ID = $FUNCTION_ID"; 
				*/

				$sql_select = "	SELECT FT.ID, FT.CREATE_TIME, FT.FUNCTION_ID, F.FUNCTION_NAME,
				FT.USER_ID,
				T.USER_NAME AS USER_NAME,
				FT.direction,
				T.IMAGE AS IMAGE,
				A.USER_NAME AS LEADER,
				B.USER_NAME AS UI_DESIGNER,
				N.USER_NAME AS DEVELOPER,
				M.USER_NAME AS TESTER,                                
				O.USER_NAME AS OWNER
				FROM FUNCTION_TIMELINE AS FT
				JOIN FUNCTION AS F ON FT.FUNCTION_ID = F.FUNCTION_ID
				JOIN USER AS T ON FT.USER_ID = T.USER_id
				JOIN USER AS A ON F.LEADER = A.USER_id
				JOIN USER AS B ON F.UI_DESIGNER = B.USER_id
				JOIN USER AS N ON F.DEVELOPER = N.USER_ID
				JOIN USER AS M ON F.TESTER = M.USER_ID
				JOIN USER AS O ON F.OWNER = O.USER_id
				AND FT.FUNCTION_ID = $FUNCTION_ID";


				$result_select = mysqli_query($conn, $sql_select);
				if ($result_select->num_rows > 0) {
					while ($row = $result_select->fetch_assoc()) {
						$ID = $row['ID'];
						$T_OWNER = $row['OWNER'];
						$T_CREATE_TIME = $row['CREATE_TIME'];
						$T_FUNCTION_ID = $row['FUNCTION_ID'];
						$T_FUNCTION_NAME = $row['FUNCTION_NAME'];
						$T_USER_ID = $row['USER_ID'];
						$T_USER_NAME = $row['USER_NAME'];
						$T_direction = $row['direction'];
						$T_image = $row['IMAGE'];
						$T_LEADER = $row['LEADER'];
						$T_UI_DESIGNER = $row['UI_DESIGNER'];
						$T_DEVELOPER = $row['DEVELOPER'];
						$T_TESTER = $row['TESTER'];
						//下で変数がRenameされてるから前にT_を付けました。
						
						if ($T_USER_NAME == $T_LEADER) {
							echo '						
											<li>
												<div class="list-timeline-icon bg-white">
												<span class="avatar avatar-m avatar-rounded" style="background-image: url(./static/user/' . $T_image . ')"></span>
												</div>
												<div class="list-timeline-content">
													<div class="list-timeline-time">' . $T_CREATE_TIME . '</div>
													<p class="list-timeline-title">
													<strong style="color:#0059b3;">' . $T_LEADER . '</strong> created this work.</p>
												</div>
											</li>';
											
						} else {
							//次の人に渡した
							if ($T_direction == "1") {
								$next_usr = "";						
									if($T_USER_NAME == $T_UI_DESIGNER){
										$next_usr = $T_DEVELOPER;
									}else if($T_USER_NAME == $T_DEVELOPER){
										$next_usr = $T_TESTER;	
									}				
									echo'
															<li>
															<div class="list-timeline-icon bg-white">
															<span class="avatar avatar-m avatar-rounded" style="background-image: url(./static/user/' . $T_image . ')"></span>
															</div>
															<div class="list-timeline-content">
																<div class="list-timeline-time">' . $T_CREATE_TIME . '</div>
																<p class="list-timeline-title">
																<strong style="color:#0059b3;">' . $T_USER_NAME . '</strong> Send this work to <strong style="color:#0059b3;">' . $next_usr . '</strong>
																</p>															
															</div>
														</li>';
								
																
									
							//以前の人に戻した		
							} else if ($T_direction == "0") {
								$back_usr = "";
								if($T_USER_NAME == $T_DEVELOPER){
									$back_usr = $T_UI_DESIGNER;
								}else if($T_USER_NAME == $T_TESTER){
									$back_usr = $T_TESTER;	
								}
										echo '						
												<li>
													<div class="list-timeline-icon bg-white">
													<span class="avatar avatar-m avatar-rounded" style="background-image: url(./static/user/' . $T_image . ')"></span>
													</div>
													<div class="list-timeline-content">
														<div class="list-timeline-time">' . $T_CREATE_TIME . '</div>
														<p class="list-timeline-title">
														<strong style="color:#0059b3;">' . $T_USER_NAME . '</strong> Back this job to <strong style="color:#0059b3;">' . $back_usr . '</strong>
														</p>
													</div>
												</li>';
									
								
									
								
							}
							
						}


					//ここからもう一度繰り返す	
					}
					//終わり
					if($T_LEADER == $T_OWNER){						
																	
						echo'
													<li>
													<div class="list-timeline-icon">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
													</div>
													<div class="list-timeline-content">
														<div class="list-timeline-time">' . $T_CREATE_TIME . '</div>
														<p class="list-timeline-title">
														<strong style="color:#0059b3;">' . $T_TESTER . '</strong> This work is finished! </strong>
														</p>															
													</div>
												</li>';
												
												
					}
				}

				echo '	
									</ul>
								</div>
							</div>
							<!-- chat logs button -->
							<div id="heading-' . $slide . '2" data-bs-toggle="collapse" data-bs-target="#collapse-' . $slide . '2" aria-expanded="false">
								<div class="hr-text">Chat logs</div>
							</div>
							<!-- chat logs内容 -->
							<div id="collapse-' . $slide . '2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
								<div class="mb-3">';
				$conn = mysqli_connect('localhost', 'PMSDB', '9sZyQ6Y9', 'PMSDB');
				if (mysqli_connect_errno($conn)) {
					die("连接 MySQL 失败: " . mysqli_connect_error());
				}
				mysqli_set_charset($conn, "utf8");
				$sql_select = "SELECT * FROM FUNCTION_CHARLOGS AS FC
													JOIN USER AS U ON FC.USER_ID = U.USER_ID
													WHERE FC.FUNCTION_ID = $FUNCTION_ID";

				$result_select = mysqli_query($conn, $sql_select);
				if ($result_select->num_rows > 0) {
					while ($row = $result_select->fetch_assoc()) {
						$CHAR_IMAGE = $row['IMAGE'];
						$CHAR_USER_NAME = $row['USER_NAME'];
						$CHAR_MESSAGE = $row['Message'];
						$CHAR_CREATE_TIME = $row['CREATE_TIME'];

						echo '
											<div class="mb-3">
												<div class="row">												
													<div class="col-auto">
														<span class="avatar" style="background-image: url(./static/user/' . $CHAR_IMAGE . ')"></span>
													</div>
													<div class="col">
														<div class="text-truncate">
															<strong style="color:#0059b3;">' . $CHAR_USER_NAME . '</strong> posted <strong>"' . $CHAR_MESSAGE . '"</strong>
														</div>
														<div class="text-muted">' . $CHAR_CREATE_TIME . '</div>
													</div>
												</div>												
											</div>';
					}
				}
				mysqli_close($conn);
				echo '</div>
							</div>';
				if ($user_id != $LEADER) {
					if ($user_id == $OWNER && $user_id == $UI_DESIGNER) {
						echo '
									<div class="row">
										<div class="col-lg-6">
											<div>
												<input class="form-check-input" name="check' . $FUNCTION_ID . '" type="radio" value="1" checked>
												<label for="contactChoice1">I had been finish this work. Send it to <strong>Developer</strong>.</label>
											</div>
										</div>										
										<input id="next' . $FUNCTION_ID . '" type="hidden" value="' . $DEVELOPER . '">
										<input id="funtion_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $FUNCTION_ID . '">
										<input id="user_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $user_id . '">	
										<div class="col-lg-6">
										<div class="text-end">
											<div class="row">
												<div class="col">
												<input type="text" id="chat' . $FUNCTION_ID . '" class="form-control form-control-flush" name="Form control flush" placeholder="You want to say something?">
												</div>
												<div class="col-auto">
												<a href="#" id="send2_btn" value="' . $FUNCTION_ID . '" class="btn btn-' . $SITUATION . '">Send</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								';
					} elseif ($user_id == $OWNER && $user_id == $DEVELOPER) {
						echo '
									<div class="row">
										<div class="col-lg-6">
											<div>
												<input class="form-check-input" name="check' . $FUNCTION_ID . '" type="radio" value="1" checked>
												<label for="contactChoice1">I had been finish this work. Send it to <strong>Tester</strong>.</label>
											</div>
											<div>
												<input class="form-check-input" name="check' . $FUNCTION_ID . '" type="radio" value="0">
												<label for="contactChoice2">This work had some problem, back it to <strong>UI Designer</strong>.</label>
											</div>
										</div>
										<input id="next' . $FUNCTION_ID . '" type="hidden" value="' . $TESTER . '">
										<input id="back' . $FUNCTION_ID . '" type="hidden" value="' . $UI_DESIGNER . '">
										<input id="function_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $FUNCTION_ID . '">
										<input id="user_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $user_id . '">
										<div class="col-lg-6">
										<div class="text-end">
											<div class="row">
												<div class="col">
												<input type="text" id="chat' . $FUNCTION_ID . '" class="form-control form-control-flush" name="Form control flush" placeholder="You want to say something?">
												</div>
												<div class="col-auto">
												<a href="#" id="send2_btn" value="' . $FUNCTION_ID . '" class="btn btn-' . $SITUATION . '">Send</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								';
					} elseif ($user_id == $OWNER && $user_id == $TESTER) {
						echo '
							
									<div class="row">
										<div class="col-lg-6">
											<div>
												<input class="form-check-input" name="check' . $FUNCTION_ID . '" type="radio" value="Close"checked>
												<label for="contactChoice2">This work Ready to <strong>Close</strong>.</label>
											</div>
											<div>
												<input class="form-check-input" name="check' . $FUNCTION_ID . '" type="radio" value="0">
												<label for="contactChoice2">This work had some problem, back it to <strong>Developer</strong>.</label>
											</div>											
										</div>				
										<input id="leader' . $FUNCTION_ID . '" type="hidden" value="' . $LEADER. '">
										<input id="next' . $FUNCTION_ID . '" type="hidden" value="' . $user_id . '">
										<input id="back' . $FUNCTION_ID . '" type="hidden" value="' . $DEVELOPER . '">						
										<input id="function_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $FUNCTION_ID . '">
										<input id="user_hidden' . $FUNCTION_ID . '" type="hidden" value="' . $user_id . '">
										<div class="col-lg-6">
										<div class="text-end">
											<div class="row">
												<div class="col">
												<input type="text" id="chat' . $FUNCTION_ID . '" class="form-control form-control-flush" name="Form control flush" placeholder="You want to say something?">
												</div>
												<div class="col-auto">
												<a href="#" id="send2_btn" value="' . $FUNCTION_ID . '" class="btn btn-' . $SITUATION . '">Close</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
								<script>
								$(document).ready(function() {
									$(\'input[name="check' . $FUNCTION_ID . '"]\').change(function () {
										const radioVal = $(\'input[name="check' . $FUNCTION_ID . '"]:checked\').val();
										if(radioVal == "Close"){
											$(\'#send2_btn\').text("Close");
										}else{
											$(\'#send2_btn\').text("Send");
											
										}
									});
									
								});
								</script>
								';
					}
				}
				echo '			
						</div>
					</div>
				</div>
			</div>
		</div> ';
			}
			?>
			<!-- Tabler Core -->
			<script src="./dist/js/tabler.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			<script>
				$(document).ready(function() {
					$(document).on('click', '#send2_btn', function() {
						btn_num = $(this).attr("value");
						function_id = btn_num;
						insert_sql = "chat";
						chatbox = $('#chat' + function_id).val();
						leader = $('#leader' + function_id).val();

						user_id = $('#user_hidden' + function_id).val();
						change_direction = $("input[name='check" + function_id + "']:checked").val();
						if (change_direction == "1") {
							change_owner = $('#next' + function_id).val();
						} else if (change_direction == "0") {
							change_owner = $('#back' + function_id).val();
						} else if (change_direction == "Close") {
							change_owner = $('#next' + function_id).val();
						}
						/*
						alert("function num : " + btn_num + "\n" +
							"chatbox : " + chatbox + "\n" +
							"user_id : " + user_id + "\n" +
							"change_direction : " + change_direction + "\n" +
							"change_owner : " + change_owner + "\n"


						);
						*/
						$.ajax({
							url: "function-insert.php",
							method: "POST",
							data: {
								insert_sql: insert_sql,
								function_id: function_id,
								user_id: user_id,
								change_direction: change_direction,
								change_owner: change_owner,
								leader: leader,
								chatbox: chatbox
							},
							success: function(data) {
								location.reload();
							}
						});
					});

				});
			</script>
</body>

</html>