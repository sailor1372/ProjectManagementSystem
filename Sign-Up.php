<?php
  session_start();
	if (isset( $_POST ['submit'])) {
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_query($conn,"set names utf8"); //数据库编码格式
		if (isset( $_POST ['submit'])) {
			$name = $_POST ['name'];
			$email = $_POST ['email'];
			$password = $_POST ['password'];
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
			$sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<script>alert('ユーザーは存在しました、登録してください')</script>";
			}else{
				$sql = "INSERT INTO USER (USER_NAME,EMAIL,PASSWORD) VALUES ('$name','$email','$hash_password')";
				if ($conn->query($sql) === TRUE) {
          $sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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
              // $sql = "INSERT INTO FUNCTION_USER_SELECT (USER_ID) VALUES ('$user_id')";
				      // if ($conn->query($sql) === TRUE) {
              //   echo "<script>parent.location.href='Home.php';</script>";
              // }else{
              //   echo "Error: " . $sql . "<br>" . $conn->error;
              // }
            }
          }
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
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
    <title>Sign up</title>
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
        <form class="card card-md" action="" method="post">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="name" name ="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name ="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name ="password" class="form-control"  placeholder="Password"  autocomplete="off">
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" name ="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="./Sign-In.php" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <script src="./dist/js/tabler.min.js"></script>
  </body>
</html>