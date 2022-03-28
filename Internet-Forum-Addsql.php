<?php 
$editor_data = $_POST['content'];

session_start();
//判断用户是否在线
if (empty($_SESSION['email'])) {
	echo "<script> parent.location.href='Sign-In.php'; </script>";
} else {
	$user_id = $_SESSION['user_id'];

	$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
	if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
	}
	mysqli_set_charset($conn, "utf8");

	if(isset($_POST['Send'])){
		$addsql = "INSERT INTO INTERNET_FORUM (USER_ID, text) VALUES ('$user_id', '$editor_data')";
		echo $addsql;
		if($conn->query($addsql)){
			$selectsql = "SELECT MAX(ID) AS id from INTERNET_FORUM";
			$result = mysqli_query($conn, $selectsql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$id = $row['id'];
					echo "<script>parent.location.href='Internet-Forum-Info?$id';</script>";
				}
			}
		}else {
			//echo "Error: " . $addsql . "<br>" . $conn->error;
		}
	}

	if(isset($_POST['Send_Message'])){
		$text_id = $_POST['text_id'];
		$Message = $_POST['Message'];
		$addsql = "INSERT INTO INTERNET_FORUM_CHARLOGS (INTERNET_FORUM_ID, USER_ID, Message) VALUES ('$text_id','$user_id', '$Message')";
		echo $addsql;
		if($conn->query($addsql)){
			echo "<script>parent.location.href='Internet-Forum-Info?$text_id';</script>";
		}
	}
	mysqli_close($conn);
}
?>