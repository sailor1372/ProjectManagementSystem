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
    $text_id = $_SERVER["QUERY_STRING"];

    $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");

		$sql = "SELECT * FROM USER WHERE USER_ID = (SELECT USER_ID FROM INTERNET_FORUM WHERE ID = $text_id)";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$text_user_name = $row['USER_NAME'];
				$tel = $row['TEL'];
				$text_position = $row['POSITION'];
				$text_image = $row['IMAGE'];
			}
		}
		$conn->close();

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
              <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
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
            <div class="row row-cards">
              <div class="col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-report">
                            <span class="avatar avatar-xl mb-3 avatar-rounded"  style="background-image: url(./static/user/<?php echo $text_image ?>)"></span>
                        </a>
                        <h3 class="m-0 mb-1"><?php echo $text_user_name ?></h3>
                        <div class="text-muted"><?php echo $text_position ?></div>
							          <div class="mt-3"></div>
                          <?php
                            $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                            if (mysqli_connect_errno($conn)) { 
                            die("连接 MySQL 失败: " . mysqli_connect_error()); 
                            }
                            mysqli_set_charset($conn, "utf8");
                            $sql = "SELECT * FROM INTERNET_FORUM WHERE ID = $text_id";   //後WHERE条件でGROUPの一員を呼び出す。
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  $update_time = $row['update_time'];
                                  echo  '<span class="description">'.$update_time .'</span>';
                              }
                            }
                            $conn->close();
                          ?>
                    </div>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="card card-lg">
                  <div class="card-body">
                    <div class="markdown">
                      <?php
                        $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                        if (mysqli_connect_errno($conn)) { 
                        die("连接 MySQL 失败: " . mysqli_connect_error()); 
                        }
                        mysqli_set_charset($conn, "utf8");
                        $sql = "SELECT * FROM INTERNET_FORUM WHERE ID = $text_id";   //後WHERE条件でGROUPの一員を呼び出す。
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              $text = $row['text'];
                              echo  $text;
                          }
                        }
                        $conn->close();
                      ?>
                    </div>
                  </div>
                    <?php
                      $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
                      if (mysqli_connect_errno($conn)) { 
                      die("连接 MySQL 失败: " . mysqli_connect_error()); 
                      }
                      mysqli_set_charset($conn, "utf8");
                      $sql = "SELECT * FROM INTERNET_FORUM_CHARLOGS AS IFC
                              JOIN USER AS U ON IFC.USER_ID = U.USER_ID
                              WHERE INTERNET_FORUM_ID = $text_id";   //後WHERE条件でGROUPの一員を呼び出す。
                      $result = mysqli_query($conn, $sql);
                      if ($result->num_rows > 0) {
                        echo '<div class="card-footer">';
                        while($row = $result->fetch_assoc()) {
                            $CHAR_IMAGE = $row['IMAGE'];
                            $CHAR_USER_NAME = $row['USER_NAME'];
                            $CHAR_CREATE_TIME = $row['CREATE_TIME'];
                            $CHAR_Message = $row['Message'];
                            echo '
                            <div class="row">												
                              <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/user/'.$CHAR_IMAGE.')"></span>
                              </div>
                              <div class="col">
                                <div class="text-truncate">
                                  <strong style="color:#0059b3;">' . $CHAR_USER_NAME . '</strong> posted <strong>"' . $CHAR_Message . '"</strong>
                                </div>
                                <div class="text-muted">' . $CHAR_CREATE_TIME . '</div>
                              </div>
                            </div>	
                            <div class="mb-3"></div>
                            ';
                        }
                        echo'</div>';
                      }
                      $conn->close();
                    ?>
                  <div class="card-footer text-end">
                    <form action="Internet-Forum-Addsql.php" method="post" enctype="multipart/form-data">
                      <input name="text_id" type="hidden" value="<?php echo $text_id ?>">
                      <div class="row">												
                        <div class="col-auto">
                          <span class="avatar" style="background-image: url(./static/user/<?php echo $image ?>)"></span>
                        </div>
                        <div class="col">
                          <input type="text" class="form-control form-control-flush" name="Message" placeholder="You can write a comment here...">
                        </div>
                        <div class="col-auto">
                          <button type="submit" id="Send" name="Send_Message" class="btn btn-primary ms-auto">Send Message</button>
                        </div>
                      </div>
                    </form>
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
    <!-- Libs JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>

    <script>
      document.querySelectorAll( 'oembed[url]' ).forEach( element => {
          
            const videoLable = document.createElement( 'video' );

            videoLable.setAttribute( 'src', element.getAttribute( 'url' ) );
            videoLable.setAttribute( 'controls', 'controls' );
            videoLable.setAttribute( 'style', ' width: 100%;height: 100%; ' );

            element.appendChild( videoLable);
        } );
        
    </script>

  </body>
</html>