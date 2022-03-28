<?php 
	$VERSION_NAME =$_POST['version_name'];
	$START_TIME =$_POST['start_time'];
	$END_TIME =$_POST['end_time'];
	$ABOUT = $_POST['about'];

	$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
	if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
	}
	mysqli_set_charset($conn, "utf8");
	
	if(isset($_POST['version-add'])){
		$addsql = "INSERT INTO VERSION (VERSION_NAME, START_TIME, END_TIME, ABOUT) VALUES ('$VERSION_NAME', '$START_TIME', '$END_TIME', '$ABOUT')";
		if($conn->query($addsql)){
			$selectsql = "SELECT * from VERSION WHERE VERSION_NAME = '$VERSION_NAME'";
			$result = mysqli_query($conn, $selectsql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$version_id = $row['VERSION_ID'];
					// 判断有没有勾选teams，有则插入表数据
					$TEAMS = $_POST['change-project-information'];
					if (!empty($TEAMS)){
						$addsql = "";
						foreach($TEAMS as $TEAMSid){
							$addsql .= "INSERT INTO VERSION_TEAMS (VERSION_ID,TEAMS_ID) VALUES ('$version_id','$TEAMSid');";
						}
						if ($conn->multi_query($addsql)) {
							echo "<script>parent.location.href='Program-Info?$version_id';</script>";
						} else {
							echo "Error: " . $addsql . "<br>" . $conn->error;
						}
					}
				}
			}
		}
	}

	if(isset($_POST['change-project'])){
		$program_id = $_POST['program_id'];
		$update_sql = "UPDATE VERSION SET VERSION_NAME = '$VERSION_NAME', START_TIME = '$START_TIME', END_TIME = '$END_TIME', ABOUT = '$ABOUT' WHERE VERSION_ID = '$program_id'"; // 
		if(mysqli_query($conn, $update_sql)){
			$deletesql = "DELETE FROM VERSION_TEAMS WHERE VERSION_ID = '$program_id'";
			if ($conn->multi_query($deletesql)) {
				$TEAMS = $_POST['change-project-information'];
				if (!empty($TEAMS)){
					$addsql = "";
					foreach($TEAMS as $TEAMSid){
						$addsql .= "INSERT INTO VERSION_TEAMS (VERSION_ID,TEAMS_ID) VALUES ('$program_id','$TEAMSid');";
					}
					if ($conn->multi_query($addsql)) {
						echo "<script>parent.location.href='Program-Info?$program_id';</script>";
					} else {
						echo "Error: " . $addsql . "<br>" . $conn->error;
					}
				}
			}else{
				echo "Error: " . $deletesql . "<br>" . $conn->error;
			}
		}else{
			echo "Error: " . $update_sql . "<br>" . $conn->error;
		}
	}
	mysqli_close($conn);
?>