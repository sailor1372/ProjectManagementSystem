<?php
	session_start();
	//判断用户是否在线
	if (empty($_SESSION['email'])){
		echo "<script> parent.location.href='Sign-In.php'; </script>";
	}else{
		$EMAIL = $_SESSION['email'];

		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");

		$sql = "SELECT * FROM USER WHERE EMAIL = '$EMAIL'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$name = $row['USER_NAME'];
				$tel = $row['TEL'];
				$position = $row['POSITION'];
				$address = $row['ADDRESS'];
				$department = $row['DEPARTMENT'];
				$city = $row['CITY'];
				$about = $row['ABOUT'];
				$country = $row['COUNTRY'];
				$image = $row['IMAGE'];
			}
		}
		$conn->close();

		switch ($country){
			case 0:
				$country2 = "";
				break;
			case 1:
				$country2 = "Japan";
				break;
			case 2:	
				$country2 = "Korea";
				break;
			case 3:	
				$country2 = "China";
				break;
			case 4:
				$country2 = "etc";	

		}
		switch ($city){
			case 0:
				$city2 = "";
				break;
			case 1:
				$city2 = "Hokkaido";
				break;
			case 2:	
				$city2 = "Nara-ken";
				break;
			case 3:	
				$city2 = "Osaka";
				break;
			case 4:
				$city2 = "Yokohama";
				break;
			case 5:
				$city2 = "Tokyo";
				break;
			case 6:
				$city2 = "etc";	
		}

		switch ($department){
			case 0:
				$department2 = "";
				break;
			case 1:
				$department2 = "Business Office";
				break;
			case 2:	
				$department2 = "Personnel Department";
				break;
			case 3:	
				$department2 = "Sales Department";
				break;
			case 4:
				$department2 = "Advertising Department";
				break;
			case 5:
				$department2 = "Product Development Department";
				break;
			case 6:
				$department2 = "etc";	
		}
	} 
?>
<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Profile-accout</title>
		<!-- CSS files -->
		<link href="./dist/css/tabler.min.css" rel="stylesheet"/>
		<link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
		<link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
		<link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
		<link href="./dist/css/demo.min.css" rel="stylesheet"/>
		<!-- Icons -->
		<!-- Argon CSS -->
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
						<li class="nav-item active dropdown">
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
			</div>
			<div class="page-wrapper">
			</div>
			<!-- Header -->
			<div class="header pb-6 d-flex align-items-center" style="min-height: 250px; background-image: url(./static/imgs/theme/img-1-1000x600.jpg); background-size: cover; background-position: center top;">
			<!-- Mask -->
			<span class="mask bg-gradient-default opacity-8"></span>
			<!-- Header container -->
			<div class="container-xl d-flex align-items-center">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h1 class="display-2 text-dark bg-light">Hello <?php echo $name ?></h1>
					<p class="text-dark mt-0 mb-1"><?php echo $about ?></p>
				</div>
			</div>
			</div>
		</div>
		<!-- Page content -->
		<div class="container-xl mt--6">
			<div class="row">
				<div class="col-xl-4 order-xl-2">
					<div class="card">
						<div class="card-body p-4 text-center">
							<a href="#" data-bs-toggle="modal" data-bs-target="#modal-report">
								<span class="avatar avatar-xl mb-3 avatar-rounded"  style="background-image: url(./static/user/<?php echo $image ?>)"></span>
							</a>
							<h3 class="m-0 mb-1"><?php echo $name ?></h3>
							<div class="text-muted"><?php echo $position ?></div>
							<div class="mt-3"></div>
							<div class="card-profile-stats d-flex justify-content-center">
								<div>
									<span class="description"><?php echo $country2 ?></span>
									<span class="heading">.</span>
								</div>
								<div>
									<span class="description"><?php echo $city2 ?></span>
									<span class="heading">.</span>
								</div><div>
									<span class="description"><?php echo $department2 ?></span>
								</div>
							</div>
							<span class="description"><?php echo $address ?></span>
						</div>
					</div>
				</div>
				<div class="col-xl-8 order-xl-1">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Edit profile </h3>
						</div>
						<div class="card-body">
							<form method="POST" action="./Userup.php">
								<h6 class="card-title">User information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-label">
												<label class="form-control-label" for="input-username">Username</label>
												<input type="text" name = "username" id="input-username" class="form-control" placeholder="Username" value="<?php echo $name ?>">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-label">
												<label class="form-control-label" for="input-email">Email address</label>
												<input type="email" name = "email" id="input-email" class="form-control" value="<?php echo $EMAIL ?>" disabled="disabled" >
											</div>
										</div>
									</div>
									<div class="row">
									<div class="col-lg-6">
										<div class="form-label">
											<label class="form-control-label" for="input-first-name">Phone number</label>
											<input type="text" name="tel" class="form-control" data-mask="(000) 0000-0000" data-mask-visible="true" placeholder="(000) 0000-0000" autocomplete="off" value="<?php echo $tel ?>"/>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-label">
											<label class="form-control-label" for="input-last-name">Position</label>
											<input type="text" name = "position" id="input-last-name" class="form-control" placeholder="Last name" value="<?php echo $position ?>">
										</div>
									</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Address -->
								<h6 class="card-title">Contact information</h6>
								<div class="pl-lg-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-label">
												<label class="form-control-label" for="input-address">Address</label>
												<input id="input-address" name = "address" class="form-control" placeholder="Home Address" value="<?php echo $address ?>" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-label">
												<label class="form-control-label" for="input-city">Country</label>
												<select name="country" class="form-select">
													<option value="<?php echo $country ?>"  selected hidden><?php echo $country2 ?></option>
													<option value="1">Japan</option>
													<!--
													<option value="2">Korea</option>
													<option value="3">China</option>
													<option value="4">etc</option>
													-->
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-label">
												<label class="form-control-label" for="input-country">City</label>
												<select name="city" class="form-select">
													<option value="<?php echo $city ?>" selected hidden><?php echo $city2 ?></option>
													<option value="1">Hokkaido</option>
													<option value="2">Nara-ken</option>
													<option value="3">Osaka</option>
													<option value="4">Yokohama</option>
													<option value="5">Tokyo</option>
													<option value="6">etc</option>
												</select>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-label">
												<label class="form-control-label" for="input-country">Department</label>
												<select name="department" class="form-select">
													<option value="<?php echo $department ?>" selected hidden><?php echo $department2 ?></option>
													<option value="1">Business Office</option>
													<option value="2">Personnel Department</option>
													<option value="3">Sales Department</option>
													<option value="4">Advertising Department</option>
													<option value="5">Product Development Department</option>
													<option value="6">etc</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<hr class="my-4" />
								<!-- Description -->
								<h6 class="card-title">About me</h6>
									<div class="pl-lg-4">
										<div class="form-label">
											<textarea rows="4" class="form-control" name="about" placeholder="A few words about you ..."><?php echo $about ?></textarea>
										</div>
									</div>
								</div>
							<div class="card-footer text-end">
								<div class="d-flex">
									<button type="submit" id="Send" name="Send" class="btn btn-primary ms-auto">Send data</button>
								</div>
							</div>
						</form>
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
	<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<form action="User-Image-Change.php" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Change Image</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!--
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Image Check</label>
						<div class="row g-2">
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="1" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/1b73704b282a8ec6.jpg" alt="Breakfast served with tea, bread and eggs" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="2" class="form-imagecheck-input"  checked/>
								<span class="form-imagecheck-figure">
								<img src="./static/photos/3d2998219313cd37.jpg" alt="Book, fairy lights" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="3" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/6ab3200b14549f8a.jpg" alt="Healthy Dinner" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="4" class="form-imagecheck-input"  checked/>
								<span class="form-imagecheck-figure">
								<img src="./static/photos/6d35d9a2bd6c63c2.jpg" alt="Aperol Spritz is a cocktail consisting of prosecco, aperitif and soda water" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="5" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/8a26974ee6444acd.jpg" alt="Beautiful blonde woman on a wooden pier by the lake" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="6" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/8c13ad59f739558c.jpg" alt="Still life of mandarin oranges with leaves" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="7" class="form-imagecheck-input"  checked/>
								<span class="form-imagecheck-figure">
								<img src="./static/photos/8fdeb4785d2b82ef.jpg" alt="Blonde woman having a healthy snack at the wooden pier" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="8" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/9f36332564ca271d.jpg" alt="Woman working on a laptop while enjoying a breakfast coffee and chocolate in bed" class="form-imagecheck-image">
								</span>
							</label>
							</div>
							<div class="col-6 col-sm-4">
							<label class="form-imagecheck mb-2">
								<input name="form-imagecheck" type="radio" value="9" class="form-imagecheck-input" />
								<span class="form-imagecheck-figure">
								<img src="./static/photos/35b88fc04a518c1b.jpg" alt="Overhead view of macarons on a marble slab" class="form-imagecheck-image">
								</span>
							</label>
							</div>
						</div>
					</div>
				</div>
				-->
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Custom File Input</label>
						<input type="file" name="file" class="form-control" />
					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
					Cancel
					</a>
					<button type="submit" class="btn btn-primary ms-auto">Change</button>
				</div>
			</div>
			</form>
		</div>
	</div>


	<!-- 换头像 -->
	<script type="text/javascript">
        function F_Open_dialog() { document.getElementById("btn_file").click(); } 
    </script>
	<!-- Libs JS -->
	<script src="./dist/libs/apexcharts/dist/apexcharts.min.js"></script>
	<!-- Tabler Core -->
	<script src="./dist/js/tabler.min.js"></script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>

    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: [2, 1],
      			dashArray: [0, 3],
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "May",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      		},{
      			name: "April",
      			data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4", "#a8aeb7"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      			stacked: true,
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Web",
      			data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
      		},{
      			name: "Social",
      			data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
      		},{
      			name: "Other",
      			data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
      		}],
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
      		],
      		colors: ["#206bc4", "#79a6dc", "#bfe399"],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: ["#206bc4"],
      		series: [35],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 192,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Purchases",
      			data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      		}],
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: ["#206bc4"],
      		legend: {
      			show: false,
      		},
      		point: {
      			show: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: "#206bc4",
      			data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
  </body>
</html>
