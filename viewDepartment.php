<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['ID_User'])){
		//chưa đăng nhập
		header("location:login.php?trang=log");
		exit();
	}
?> 
 <!-- Begin page content -->
        <div id="container" class="container">
                        <div class="row">
    <div class="col-xs-12">
	<?php
		$idd=$_GET['idd'];
		$lenh1="SELECT * FROM department WHERE ID_department='$idd' ";
		$result=$mysqli -> query ($lenh1);
		while($kq=mysqli_fetch_assoc($result)){
		$Name=htmlspecialchars($kq['Name']);
		$Office_phone=htmlspecialchars($kq['Office_phone']);
		$Manager=htmlspecialchars($kq['Manager']);
		
	?>
	
	
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <td><?php echo $Name; ?></td>
            </tr>
            <tr>
                <th>Office Phone</th>
                <td><?php echo $Office_phone; ?></td>
            </tr>
            <tr>
                <th>Manager</th>
                <td><?php echo $Manager; ?></td>
            </tr>
        </table>
		
		<?php 
		}
		
		?>
		
        <a href="indexDepartment.php" class="btn btn-default">Back</a>    </div>
</div>
        </div>

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>    