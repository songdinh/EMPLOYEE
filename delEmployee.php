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
				$id = $_GET['id'];
				$query = "DELETE FROM employeee WHERE ID_Employee=$id LIMIT 1";
				$result = $mysqli->query($query);
				
				if($result){
					header("LOCATION: index.php");
					exit();
				} else {
					echo "<strong style = 'color:red'>Có lỗi trong quá trình xóa</strong>";
				}
				
			?>

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?> 