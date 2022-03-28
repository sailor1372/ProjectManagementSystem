<?php 
	$teams_id = $_POST['teams_id'];

	if(isset($_POST ['user-change'])){
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		$deletesql = "DELETE FROM TEAMS_USER WHERE TEAMS_ID = '$teams_id'";
		if ($conn->multi_query($deletesql)) {
			$user = $_POST['user'];
			if (!empty($user)){
				$addsql = "";
				foreach($user as $userid){
					$addsql .= "INSERT INTO TEAMS_USER (TEAMS_ID,USER_ID) VALUES ('$teams_id','$userid');";
				}
				if ($conn->multi_query($addsql)) {
					echo "<script> parent.location.href='Teams.php?$teams_id'; </script>";
				} else {
					echo "Error: " . $addsql . "<br>" . $conn->error;
				}
			}
		} else {
			echo "Error: " . $deletesql . "<br>" . $conn->error;
		}
		
		mysqli_close($conn);
	}
?>