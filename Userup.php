<?php 
	session_start();
	$email = $_SESSION['email'];

	if(isset($_POST ['Send'])){
		$username = $_POST['username'];
		$tel = $_POST['tel'];
		$position = $_POST['position'];
		$address = $_POST['address'];
		$department = $_POST['department'];
		$city = $_POST['city'];
		$about = $_POST['about'];
		$country = $_POST['country'];

		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}

		$sql = "UPDATE USER SET USER_NAME = '$username' , TEL = '$tel',
					POSITION = '$position' , ADDRESS = '$address' , DEPARTMENT = '$department',
					ADDRESS = '$address', CITY = '$city', COUNTRY = '$country', ABOUT = '$about' where EMAIL = '$email'";

		if(mysqli_query($conn, $sql)){
			$_SESSION['name'] = $username;
			$_SESSION['position'] = $position;
			header('Location: Profile-Account.php');
		} else {
			echo "ERROR: $sql. " . mysqli_error($link);
		}
		mysqli_close($conn);
	}
?>