
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

    $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_query($conn,"set names utf8"); //数据库编码格式

    //项目数
		$sql = "SELECT count(*) as VERSION_NUM FROM VERSION";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$VERSION_NUM = $row["VERSION_NUM"];
			}
    }
     //模块数
		$sql = "SELECT count(*) as MODULE_NUM FROM MODULE";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$MODULE_NUM = $row["MODULE_NUM"];
			}
    }
    //工作数
		$sql = "SELECT count(*) as function_num FROM FUNCTION";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$function_num = $row["function_num"];
			}
    }
    //team数
		$sql = "SELECT count(*) as team_num FROM TEAMS";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$team_num = $row["team_num"];
			}
    }
    //team内人数
		$sql = "SELECT count(*) as team_user_num FROM TEAMS_USER";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$team_user_num = $row["team_user_num"];
			}
    }
    //用户数
		$sql = "SELECT count(*) as user_num FROM USER";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$user_num = $row["user_num"];
			}
    }
    //掲示板数
    $sql = "SELECT count(*) as board_num FROM INTERNET_FORUM";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$board_num = $row["board_num"];
			}
    }
    //Comment数
    $sql = "SELECT count(*) as Comment_num FROM INTERNET_FORUM_CHARLOGS";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Comment_num = $row["Comment_num"];
			}
    }
    //查看比例用
      //UI_DESIGNER
      $sql = "SELECT COUNT(*) as UI_DESIGNER FROM `FUNCTION` WHERE `STATE` = 0 AND `OWNER` = `UI_DESIGNER`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $UI_DESIGNER = $row["UI_DESIGNER"];
        }
      }
      //DEVELOPER
      $sql = "SELECT COUNT(*) as DEVELOPER FROM `FUNCTION` WHERE `STATE` = 0 AND `OWNER` = `DEVELOPER`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $DEVELOPER = $row["DEVELOPER"];
        }
      }
      //TESTER
      $sql = "SELECT COUNT(*) as TESTER FROM `FUNCTION` WHERE `STATE` = 0 AND `OWNER` = `TESTER`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $TESTER = $row["TESTER"];
        }
      }
      //complete
      $sql = "SELECT COUNT(*)as complete FROM `FUNCTION` WHERE `STATE` = 1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $complete = $row["complete"];
        }
      }
      $UI_DESIGNER_percent = $UI_DESIGNER/($UI_DESIGNER + $DEVELOPER + $TESTER + $complete) * 100;
      $DEVELOPER_percent = $DEVELOPER/($UI_DESIGNER + $DEVELOPER + $TESTER + $complete) * 100;
      $TESTER_percent = $TESTER/($UI_DESIGNER + $DEVELOPER + $TESTER + $complete) * 100;
      $complete_percent = $complete/($UI_DESIGNER + $DEVELOPER + $TESTER + $complete) * 100;

    //计算开始了多少天(如果后期假如了版本管理，需要修改这个语句)
    $sql = "SELECT START_TIME as START_TIME FROM `VERSION` WHERE `VERSION_ID` = 2";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $START_TIME = $row["START_TIME"];
        $d1 = strtotime($START_TIME);//过去的某天，你来设定
        $d2 = 1 + ceil((time()-$d1)/60/60/24);
      }
    }
	} 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Home</title>
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
                <a href="./index.php" class="dropdown-item">Logout</a>
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
						<li class="nav-item active dropdown">
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
			</div>
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                Project Management System
                </div>
                <h2 class="page-title">
                  <span id="view_clock"></span>
                </h2>
              </div>
              <!-- Page title actions -->
              <!-- <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                    Other view
                    </a>
                  </span>
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    Create new view
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">completeness</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <!-- <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-3">75%</div>
                    <div class="d-flex mb-2">
                      <div>Conversion rate</div>
                      <div class="ms-auto">
                        <!-- <span class="text-green d-inline-flex align-items-center lh-1">
                          7% 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span> -->
                      </div>
                    </div>
                    <div class="progress progress-sm">
                      <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">75% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">UI designer</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <!-- <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-0 me-2">4,300</div>
                      <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          8% 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div id="chart-revenue-bg" class="chart-sm"></div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">DEVELOPER</div>
                      <div class="ms-auto lh-1">
                        <!-- <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-3 me-2">6,782</div>
                      <div class="me-auto">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                          0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </span>
                      </div>
                    </div>
                    <div id="chart-new-clients" class="chart-sm"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">TESTER</div>
                      <div class="ms-auto lh-1">
                        <!-- <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-3 me-2">2,986</div>
                      <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                      </div>
                    </div>
                    <div id="chart-active-users" class="chart-sm"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row row-cards">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title">Schedule</h3>
                        <div id="chart-mentions" class="chart-lg"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <p class="mb-3">As you can see <strong>how many </strong>they took.</p>
                        <div class="progress progress-separated mb-3">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $UI_DESIGNER_percent ?>%"></div>
                          <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $DEVELOPER_percent ?>%"></div>
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $TESTER_percent ?>%"></div>
                        </div>
                        <div class="row">
                          <div class="col-auto d-flex align-items-center pe-2">
                            <span class="legend me-2 bg-primary"></span>
                            <span>UI DESIGNER</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"><?php echo $UI_DESIGNER ?></span>
                          </div>
                          <div class="col-auto d-flex align-items-center px-2">
                            <span class="legend me-2 bg-info"></span>
                            <span>Developer</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"><?php echo $DEVELOPER ?></span>
                          </div>
                          <div class="col-auto d-flex align-items-center px-2">
                            <span class="legend me-2 bg-success"></span>
                            <span>Tester</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"><?php echo $TESTER ?></span>
                          </div>
                          <div class="col-auto d-flex align-items-center ps-2">
                            <span class="legend me-2"></span>
                            <span>Complete</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"><?php echo $complete ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body p-2 text-center">
                        <div class="text-end text-yellow">
                          <span class="text-yellow d-inline-flex align-items-center lh-1">
                            
                            
                          </span>
                        </div>
                        <div class="h1 m-0"><?php echo $VERSION_NUM ?></div>
                        <div class="text-muted mb-3">Programs</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body p-2 text-center">
                        <div class="text-end text-red">
                          <span class="text-red d-inline-flex align-items-center lh-1">
                             
                          </span>
                        </div>
                        <div class="h1 m-0"><?php echo $MODULE_NUM ?></div>
                        <div class="text-muted mb-3">Module</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body p-2 text-center">
                        <div class="text-end text-green">
                          <span class="text-green d-inline-flex align-items-center lh-1">
                            </span>
                        </div>
                        <div class="h1 m-0"><?php echo $function_num ?></div>
                        <div class="text-muted mb-3">All works</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="card-title">Development activity</div>
                  </div>
                  <div class="position-relative">
                    <div class="position-absolute top-0 left-0 px-3 mt-1 w-50">
                      <div class="row g-2">
                        <div class="col-auto">
                          <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity"></div>
                        </div>
                        <div class="col">
                          <div class="text-muted"><!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                            +5% more than yesterday</div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-development-activity"></div>
                  </div>
                  <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Commit</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                        if (mysqli_connect_errno($conn)) { 
                          die("连接 MySQL 失败: " . mysqli_connect_error()); 
                        }
                        mysqli_set_charset($conn, "utf8");
                        $sql = "SELECT u.IMAGE,u.USER_NAME,fc.CREATE_TIME,fc.Message FROM FUNCTION_CHARLOGS as fc join USER as u on fc.USER_ID = u.USER_ID ORDER BY fc.CREATE_TIME DESC limit 6";   //後WHERE条件でGROUPの一員を呼び出す。
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            $fc_IMAGE = $row['IMAGE'];
                            //$CREATE_TIME = $row['CREATE_TIME'];
                            $fc_CREATE_TIME = date("d M Y",strtotime($row['CREATE_TIME']));
                            $fc_Message = $row['Message'];
                            echo   '
                                    <tr>
                                      <td class="w-1">
                                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/'.$fc_IMAGE.')"></span>
                                      </td>
                                      <td class="td-truncate">
                                        <div class="text-truncate">
                                        '.$fc_Message.'
                                        </div>
                                      </td>
                                      <td class="text-nowrap text-muted">'.$fc_CREATE_TIME.'</td>
                                    </tr>
                                  ';
                          }
                        }
                        $conn->close();
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card" style="height: calc(24rem + 10px)">
                  <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                    <div class="divide-y">
                      <?php 
                        $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                        if (mysqli_connect_errno($conn)) { 
                          die("连接 MySQL 失败: " . mysqli_connect_error()); 
                        }
                        mysqli_set_charset($conn, "utf8");
                        $sql = "SELECT u.IMAGE,u.USER_NAME,ifc.CREATE_TIME,ifc.Message FROM INTERNET_FORUM_CHARLOGS as ifc join USER as u on ifc.USER_ID = u.USER_ID";   //後WHERE条件でGROUPの一員を呼び出す。
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            $ifc_IMAGE = $row['IMAGE'];
                            $ifc_USER_NAME = $row['USER_NAME'];
                            $ifc_CREATE_TIME = $row['CREATE_TIME'];
                            $ifc_Message = $row['Message'];
                            echo   '
                              <div>
                                <div class="row">
                                  <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/'.$ifc_IMAGE.')"></span>
                                  </div>
                                  <div class="col">
                                    <div class="text-truncate">
                                      <strong>'.$ifc_USER_NAME.'</strong> posted <strong>'.$ifc_Message.'</strong>
                                    </div>
                                    <div class="text-muted">'.$ifc_CREATE_TIME.'</div>
                                  </div>
                                </div>
                              </div>
                            ';
                          }
                        }
                        $conn->close();
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row row-cards">
                  <div class="col-12">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?php echo $d2 ?> Days
                            </div>
                            <div class="text-muted">
                              had been started
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="6" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?php echo $team_num ?> Teams
                            </div>
                            <div class="text-muted">
                              <?php echo $team_user_num ?> Teams`user
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?php echo $user_num ?> Users
                            </div>
                            <div class="text-muted">
                              0 registered today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?php echo $board_num ?> Shares
                            </div>
                            <div class="text-muted">
                              0 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?php echo $Comment_num ?> Likes
                            </div>
                            <div class="text-muted">
                              0 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Overview</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th>Modules</th>
                          <th>Functions</th>
                          <th>Leader</th>
                          <th>UI_Designer</th>
                          <th>Developer</th>
                          <th>Tester</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- 
                        绿色class="badge bg-success me-1"
                        黄色<span class="badge bg-warning me-1">
                        灰色<span class="badge bg-secondary me-1">
                        红色<span class="badge bg-danger me-1"> -->

                        <?php 
                          $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                          if (mysqli_connect_errno($conn)) { 
                            die("连接 MySQL 失败: " . mysqli_connect_error()); 
                          }
                          mysqli_set_charset($conn, "utf8");
                          $sql = "SELECT M.MODULE_NAME,F.FUNCTION_NAME, A.USER_NAME AS a, B.USER_NAME AS b, C.USER_NAME AS c, D.USER_NAME AS d, E.USER_NAME AS e FROM FUNCTION AS F 
                          JOIN MODULE_FUNCTION AS MF ON F.FUNCTION_ID = MF.FUNCTION_ID
                          JOIN MODULE AS M ON MF.MODULE_ID = M.MODULE_ID
                          JOIN USER AS A ON F.LEADER = A.USER_id
                          JOIN USER AS B ON F.UI_DESIGNER = B.USER_id
                          JOIN USER AS C ON F.DEVELOPER = C.USER_id
                          JOIN USER AS D ON F.TESTER = D.USER_id
                          JOIN USER AS E ON F.OWNER = E.USER_id
                          ";
                          $result = mysqli_query($conn, $sql);
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              $MODULE_NAME = $row['MODULE_NAME'];
                              $FUNCTION_NAME = $row['FUNCTION_NAME'];
                              $LEADER = $row['a'];
                              $UI_DESIGNER = $row['b'];
                              $DEVELOPER = $row['c'];
                              $TESTER = $row['d'];
                              $OWNER = $row['e'];
                              echo   '
                                      <tr>
                                        <td>' . $MODULE_NAME .' </td>
                                        <td>' . $FUNCTION_NAME .' </td>
                                        <td>
                                        ' . $LEADER .' 
                                        </td>';
                                        if($UI_DESIGNER == $OWNER){
                                          echo'     <td>
                                                      <span class="badge bg-warning me-1"></span>
                                                      ' . $UI_DESIGNER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-secondary me-1"></span>
                                                      ' . $DEVELOPER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-secondary me-1"></span>
                                                      ' . $TESTER .' 
                                                    </td>
                                                  </tr>
                                                ';
                                        }else if ($DEVELOPER == $OWNER){
                                          echo'     <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $UI_DESIGNER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-warning me-1"></span>
                                                      ' . $DEVELOPER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-secondary me-1"></span>
                                                      ' . $TESTER .' 
                                                    </td>
                                                  </tr>
                                                ';
                                        }else if ($TESTER == $OWNER){
                                          echo'     <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $UI_DESIGNER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $DEVELOPER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-warning me-1"></span>
                                                      ' . $TESTER .' 
                                                    </td>
                                                  </tr>
                                                ';
                                        }else{
                                          echo'     <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $UI_DESIGNER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $DEVELOPER .' 
                                                    </td>
                                                    <td>
                                                      <span class="badge bg-success me-1"></span>
                                                      ' . $TESTER .' 
                                                    </td>
                                                  </tr>
                                                ';
                                        }
                             
                            }
                          }
                          $conn->close();
                        ?>
                      </tbody>
                    </table>
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
        </div>
      </div>
    </div>
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
    <!--  時間表示   -->
    <script type="text/javascript">
      timerID = setInterval('clock()',500); //0.5秒毎にclock()を実行

      function clock() {
        document.getElementById("view_clock").innerHTML = getNow();
      }

      function getNow() {
        var now = new Date();
        var year = now.getFullYear();
        var mon = now.getMonth(); //１を足すこと
        var day = now.getDate();
        var you = now.getDay(); //曜日(0～6=日～土)
        var hour = now.getHours();
        var min = now.getMinutes();
        var sec = now.getSeconds();

        //曜日の選択肢
        var youbi = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        //月名の選択肢
        var month = new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        //出力用
        var s = month[mon] + " " + day + ", " + year + " (" +youbi[you] + ")    "  + hour + ":" + min + ":" + sec ; 
        return s;
      }
    </script>
  </body>
</html>