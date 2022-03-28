<?php
	$output = '';
	$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
	if (mysqli_connect_errno($conn)) { 
	die("连接 MySQL 失败: " . mysqli_connect_error()); 
	}
	mysqli_set_charset($conn, "utf8");

	//SELECT
	if (isset($_POST["function_id"])) {
		$function_id = $_POST["function_id"];
						
		$sql_select ="	SELECT M.MODULE_NAME,F.FUNCTION_ID, F.FUNCTION_NAME, A.USER_NAME AS LEADER, B.USER_NAME AS UI_DESIGNER, C.USER_NAME AS DEVELOPER, D.USER_NAME AS TESTER
				FROM VERSION_MODULE AS VM
				JOIN MODULE AS M ON VM.MODULE_ID = M.MODULE_ID 
				JOIN MODULE_FUNCTION AS MF ON M.MODULE_ID = MF.MODULE_ID
				JOIN FUNCTION AS F ON MF.FUNCTION_ID = F.FUNCTION_ID
				JOIN USER AS A ON F.LEADER = A.USER_id
				JOIN USER AS B ON F.UI_DESIGNER = B.USER_id
				JOIN USER AS C ON F.DEVELOPER = C.USER_id
				JOIN USER AS D ON F.TESTER = D.USER_id
				AND F.FUNCTION_ID = '$function_id'";	

		$result_select = mysqli_query($conn, $sql_select);
		if ($result_select->num_rows > 0) {
			while($row = $result_select->fetch_assoc()) {
				$module_name = $row['MODULE_NAME'];
				$function_name = $row['FUNCTION_NAME'];
				$leader = $row['LEADER'];
				$ui_designer= $row['UI_DESIGNER'];
				$developer = $row['DEVELOPER'];
				$tester = $row['TESTER'];
			}
		}
		mysqli_close($conn);
		$output .= '
		<div class="row">
						<div class="col-lg-6">
							<div class="mb-3">
								<label class="form-label">Module name</label>
								<input type="text" class="form-control" id="module_name" value="'.$module_name.'" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="mb-3">
								<label class="form-label">Function name</label>
								<input type="text" class="form-control" id="function_name" value="'.$function_name.'" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div>
							<label class="form-label">LEADER</label>
                            <select type="text" id ="leader_sel" class="form-select" value="">
								<option value="'.selected_usernum($leader).'" selected hidden>'.$leader.'</option>';
								$output .= user();
								
								$output .= '</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div>
								<label class="form-label">UI DESIGNER</label>
								<select type="text" id ="ui_designer_sel" class="form-select" id="select-users" value="">
									<option value="'.selected_usernum($ui_designer).'" selected hidden>'.$ui_designer.'</option>';
									$output .= user();
									$output .= '</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div>
								<label class="form-label">DEVELOPER</label>
								<select type="text" id ="developer_sel" class="form-select" placeholder="Select a date" id="select-users" value="">
									<option value="'.selected_usernum($developer).'" selected hidden>'.$developer.'</option>';
									$output .= user();
									$output .= '</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div>
								<label class="form-label">TESTER</label>
								<select type="text" id ="tester_sel" class="form-select" placeholder="Select a date" id="select-users" value="">
									<option value="'.selected_usernum($tester).'" selected hidden>'.$tester.'</option>';	
									$output .= user();
									$output .= '</select>
							</div>
						</div>
					</div>
		';
    	echo $output;   
	}
	//UPDATE
	if (isset($_POST["module_name"]) && isset($_POST["function_name"])) {
		$module_name = $_POST["module_name"];
		$function_name = $_POST["function_name"];
		$function_id = $_POST['function_id'];

		$leader_sel = $_POST['leader_sel'];
		$ui_designer_sel = $_POST['ui_designer_sel'];
		$developer_sel = $_POST['developer_sel'];
		$tester_sel = $_POST['tester_sel'];
	
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
		if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");
		
		$sql_moduleName = "UPDATE MODULE, MODULE_FUNCTION, FUNCTION SET MODULE.MODULE_NAME = '$module_name' WHERE
				MODULE.MODULE_ID = MODULE_FUNCTION.MODULE_ID AND
				FUNCTION.FUNCTION_ID = MODULE_FUNCTION.FUNCTION_ID AND
				FUNCTION.FUNCTION_ID = '$function_id'";
		
		$sql_function = "UPDATE FUNCTION SET 
					FUNCTION_NAME = '$function_name', 
					LEADER = '$leader_sel',
					UI_DESIGNER = '$ui_designer_sel',
					DEVELOPER = '$developer_sel',
					TESTER = '$tester_sel'
					WHERE FUNCTION_ID = '$function_id'";

		$result_moduleName = mysqli_query($conn, $sql_moduleName);
		$result_function = mysqli_query($conn, $sql_function);
		mysqli_close($conn);		
	}
	if(isset($_POST["module_name"]) && isset($_POST["function_name"]) && $_POST["insert_sql"] === "insert")  {
		$module_name = $_POST["module_name"];
		$function_name = $_POST["function_name"];
		$function_id = $_POST['function_id'];

		$leader_sel = $_POST['leader_sel'];
		$ui_designer_sel = $_POST['ui_designer_sel'];
		$developer_sel = $_POST['developer_sel'];
		$tester_sel = $_POST['tester_sel'];

		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
		if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");
		
		$sql_moduleName_insert = "INSERT INTO MODULE (MODULE_NAME) VALUES ('$module_name')";
		
		$sql_function_insert = "INSERT INTO FUNCTION (FUNCTON_NAME, LEADER, UI_DESIGNER, DEVELOPER, TESTER) 
					
					VALUES('','','','','')";

		$result_moduleName = mysqli_query($conn, $sql_moduleName);
		$result_function = mysqli_query($conn, $sql_function);
		mysqli_close($conn);		

	}









	//HTML SELECTを作成するメソッド
	function user(){
		$user_out = '';
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
		if (mysqli_connect_errno($conn)) { 
		die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");

		$sql_leader = "SELECT USER_ID, USER_NAME FROM USER";
		$result_leader = mysqli_query($conn, $sql_leader);
		if ($result_leader->num_rows > 0) {
			while($row = $result_leader->fetch_assoc()) {
				$user_id = $row['USER_ID'];
				$user_name = $row['USER_NAME'];
				
				$user_out .= '<option value="'.$user_id.'">'.$user_name.'</option>';
				
			}
		}
		mysqli_close($conn);
		return $user_out;
	}

	//選択されたユーザーの名前 ー＞ IDに変換メソッド
	function selected_usernum($selected_username){
		$user_id = 0;
		$conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB');
		if (mysqli_connect_errno($conn)) { 
			die("连接 MySQL 失败: " . mysqli_connect_error()); 
		}
		mysqli_set_charset($conn, "utf8");
		$sql_selname = "SELECT USER_ID FROM USER WHERE USER_NAME = '$selected_username'";

		$result_select = mysqli_query($conn, $sql_selname);
		if ($result_select->num_rows > 0) {
			while($row = $result_select->fetch_assoc()) {
				$user_id = $row['USER_ID'];
			}
		}
		mysqli_close($conn);
		return $user_id;
	}

?>