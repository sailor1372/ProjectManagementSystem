<?php	
		//insert
		if(isset($_POST["insert_sql"]))  {
			$insert = $_POST['insert_sql'];

			if($insert == "insert"){
				$program_id = $_POST["program_id"];
				$module_name = $_POST["module_name"];
				$function_name = $_POST["function_name"];
	
				$leader_sel = $_POST['leader_sel'];
				$ui_designer_sel = $_POST['ui_designer_sel'];
				$developer_sel = $_POST['developer_sel'];
				$tester_sel = $_POST['tester_sel'];
				$date_start_time = $_POST['date_start_time'];
				$date_end_time = $_POST['date_end_time'];
	
				$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
				if (mysqli_connect_errno($conn)) { 
				die("连接 MySQL 失败: " . mysqli_connect_error()); 
				}
				mysqli_set_charset($conn, "utf8");
				//1
				$sql_moduleName_insert = "INSERT INTO `MODULE` (`MODULE_ID`, `MODULE_NAME`) VALUES (NULL, '$module_name')";
				$result_1 = mysqli_query($conn, $sql_moduleName_insert);
				//2
				$sql_function_insert = "INSERT INTO FUNCTION (FUNCTION_NAME, START_TIME, END_TIME, LEADER, UI_DESIGNER, DEVELOPER, TESTER, OWNER) 
						VALUES('$function_name','$date_start_time','$date_end_time','$leader_sel','$ui_designer_sel','$developer_sel','$tester_sel', '$ui_designer_sel')";		
				$result_2 = mysqli_query($conn, $sql_function_insert);
				//3
				$sql_mf_insert = "INSERT INTO MODULE_FUNCTION (MODULE_ID, FUNCTION_ID) 
									SELECT MODULE_ID, FUNCTION_ID FROM MODULE, FUNCTION WHERE 
									MODULE_NAME = 	'$module_name' AND
									FUNCTION_NAME = '$function_name'";
				$result_3 = mysqli_query($conn, $sql_mf_insert);
				//4
				$sql_version_module = "INSERT INTO VERSION_MODULE (VERSION_ID, MODULE_ID) VALUES
									('$program_id', (SELECT MODULE_ID FROM MODULE WHERE MODULE_NAME = '$module_name'))";
				$result_4 = mysqli_query($conn, $sql_version_module);					
				//5
				$sql_function_timeline = "INSERT INTO FUNCTION_TIMELINE (FUNCTION_ID, USER_ID, CREATE_TIME) VALUES
										((SELECT FUNCTION_ID FROM FUNCTION WHERE FUNCTION_NAME = '$function_name'), '$leader_sel', NOW())";
				$result_5 = mysqli_query($conn, $sql_function_timeline);

				mysqli_close($conn);
			}else if($insert == "chat"){
				$chatbox = $_POST['chatbox'];
				$function_id = $_POST['function_id'];
				$user_id = $_POST['user_id'];
				$change_direction =  $_POST['change_direction'];				
				$change_owner = $_POST['change_owner'];
				$leader = $_POST['leader'];

		
				$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
				if (mysqli_connect_errno($conn)) { 
				die("连接 MySQL 失败: " . mysqli_connect_error()); 
				}
				mysqli_set_charset($conn, "utf8");

				if($change_direction == "Close"){
					$change_direction = 1;

					$sql_function_cl = "UPDATE FUNCTION SET STATE = 1, OWNER = '$leader' WHERE FUNCTION_ID = $function_id";
					$result_cl = mysqli_query($conn, $sql_function_cl);

				}else{
					$sql_chat = "INSERT INTO FUNCTION_CHARLOGS (FUNCTION_ID, USER_ID, CREATE_TIME, Message) VALUES ('$function_id','$user_id', now(), '$chatbox')";
				$result_chat = mysqli_query($conn, $sql_chat);

				$sql_timeline_dir= "INSERT INTO FUNCTION_TIMELINE (FUNCTION_ID, USER_ID, CREATE_TIME, direction) VALUES ('$function_id','$user_id', now(), '$change_direction')";
				$result_chat = mysqli_query($conn, $sql_timeline_dir);

				//$sql_timeline_up= "UPDATE FUNCTION_TIMELINE SET direction = $change_direction where USER_ID = $user_id AND FUNCTION_ID = $function_id";
				//$result_up = mysqli_query($conn, $sql_timeline_up);

				$sql_function = "UPDATE FUNCTION SET OWNER = $change_owner WHERE FUNCTION_ID = $function_id";
				$result_owner = mysqli_query($conn, $sql_function);
				}

				

				
				
				

				mysqli_close($conn);
			}

		}
	
?>