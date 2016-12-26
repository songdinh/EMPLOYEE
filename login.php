<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/functions/dbconnect.php'; ?>
<?php 
if(isset($_SESSION['ID_User'])){
	header("location:index.php");
}
?>
<script type="text/javascript">
			$(document).ready(function(){
			$("#formlogin").validate({
				rules: {
					user: {
						required: true,
					},
					password: {
						required: true,
					},
				},
				messages: {
					user: {
						required: "<strong><span style = 'color:red'>Bạn chưa nhập tên tài khoản</span></strong>",
					},
					password: {
						required: "<strong><span style = 'color:red'>Bạn chưa nhập mật khẩu</span></strong>",
					},
				}
			});
		});
</script>
<?php
	$canhbao="";
	if (isset($_POST['login'])) {
		
		$username = $mysqli->real_escape_string($_POST ['user']);
		$password = $_POST ['password'];
		// tao truy van them tin vao database
		$query = "SELECT * FROM user WHERE 	Username = '$username' && Password = '$password' LIMIT 1";
		// thuc hien truy van
		$result = $mysqli->query ($query);
		$arUser = mysqli_fetch_assoc($result);
		if (count($arUser) > 0) {
			$_SESSION['ID_User']=$arUser['ID_User'];
			$_SESSION['Username']=$arUser['Username'];
			$_SESSION['Password']=$arUser['Password'];
			$_SESSION['Email']=$arUser['Email'];
			//chuyển hướng
		
			header("location:index.php");
			exit();
		} else {
			$canhbao="<p style ='color:red'><strong>Sai tên tài khoản hoặc mật khẩu.</strong></p>";
		}
		
		
	}

?>




 <!-- Begin page content -->
        <div id="container" class="container signin">
			<form action="" class="form-signin" id="formlogin" method="post" accept-charset="utf-8">
				<p><?php echo $canhbao;?></p>
					<h2 class="form-signin-heading">Please log in</h2><input name="user" class="form-control username" placeholder="Username" autofocus="autofocus" maxlength="30" type="text" id="UserUsername"/>
				<input name="password" class="form-control password" placeholder="Password" type="password" id="UserPassword"/>
				<div class="submit">
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Log in"/>
				</div>
			</form>       
		</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>      