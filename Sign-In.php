<?php
  session_start();
	if (isset( $_POST ['submit'])) {
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_query($conn,"set names utf8"); //数据库编码格式
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$checkpassword = $row["PASSWORD"];
				
				if(password_verify($password, $checkpassword) || $password == $checkpassword){
					$name = $row["USER_NAME"];
					$position = $row["POSITION"];
					$image = $row["IMAGE"];
					$user_id = $row["USER_ID"];
					$permission = $row["Permission"];
					
					$_SESSION['email'] = $email;
					$_SESSION['name'] = $name;
					$_SESSION['permission'] = $permission;
					$_SESSION['position'] = $position;
					$_SESSION['image'] = $image;
					$_SESSION['user_id'] = $user_id;
					echo "<script>parent.location.href='Home.php';</script>";
				}else{
					echo "<script>alert('パスワードが間違えた')</script>";
				}
			}
	   }else{
			echo "<script>alert('ユーザーは存在しません')</script>";
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
    <title>Sign in</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
	
  </head>
  <body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="."><img src="./static/ssi.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md"  method="POST" action="./Sign-In.php">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" value = "1@ecc.ac.jp">
            </div>
				<div class="mb-2">
					<label class="form-label">
					  Password
					</label>
					<div class="input-group input-group-flat">
					  <input type="password" name = "password" class="form-control"  placeholder="Password"  autocomplete="off" value = "1">
					</div>
					<small class="form-hint">
						実演のため、ユーザーとパスワード提供されました、<br>ご安心に使ってください。
					</small>
				 </div>
            <div class="form-footer">
              <button type="submit" name ="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="./Sign-Up.php" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
  </body>
</html>