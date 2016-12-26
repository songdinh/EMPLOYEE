<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['ID_User'])){
		//chưa đăng nhập
		header("location:login.php?trang=log");
		exit();
	}
?> 

 <?php
				$idd = $_GET['idd'];
				$query = "DELETE FROM department WHERE ID_department=$idd LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION:indexDepartment.php");
					exit();
				} else {
					echo "<strong style = 'color:red'>Có lỗi trong quá trình xóa</strong>";
				}
				
			?>
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>  