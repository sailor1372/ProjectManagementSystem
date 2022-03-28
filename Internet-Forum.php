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
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Internet Forum.</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
    <style>
    .demo {
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
    }
    </style>
    
    
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
                <li class="nav-item active dropdown">
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
      </div>
      <div class="page-wrapper">
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards" data-masonry='{"percentPosition": true }'>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="empty">
                    <div class="empty-img"><img src="./static/illustrations/undraw_quitting_time_dm8t.svg" height="128">
                    </div>
                    <p class="empty-subtitle text-muted">
                      Have some problem?<br>
                      Or you want to share something? <br>
                      Try it now.
                    </p>
                    <div class="empty-action">
                      <a href="./Internet-Forum-Create-Info.php" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Create
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                if (mysqli_connect_errno($conn)) { 
                die("连接 MySQL 失败: " . mysqli_connect_error()); 
                }
                mysqli_set_charset($conn, "utf8");

                $sql = "SELECT * FROM INTERNET_FORUM";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $text = $row['text'];
                    $id = $row['id'];
                    
                    echo '
                      <div class="col-sm-6 col-lg-4">
                        <a class="list-group-item-action d-flex align-items-center" href="./Internet-Forum-Info.php?'.$id.'">
                          <div class="card">
                            <div class="card-body">
                              <div class="demo">
                                ' . $text . '
                                </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    ';
                  }
                }
                $conn->close();
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
    <!-- Libs JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
  </body>
</html>