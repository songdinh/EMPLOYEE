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
 
 
 <?php
	$id = $_GET['id'];
	$lenh1="SELECT Name_Em,department.Name,Job_title,Cellphone,Email,Photo FROM employeee
	INNER JOIN department ON employeee.ID_department=department.ID_department
	WHERE ID_Employee=$id";
	$result=$mysqli -> query ($lenh1);
	while($kq=mysqli_fetch_assoc($result)){
		$Name_Em=htmlspecialchars($kq['Name_Em']);
		$Name=htmlspecialchars($kq['Name']);
		$Job_title=htmlspecialchars($kq['Job_title']);
		$Cellphone=htmlspecialchars($kq['Cellphone']);
		$Email=htmlspecialchars($kq['Email']);
		
		$Photo=htmlspecialchars($kq['Photo']);
		$daidien=$Photo;
		if($Photo ==""){
			$daidien="icon-profile.png-1443606215.png";
		}
		
	
 ?>
        <div id="container" class="container">
                        <div class="row">
    <div class="col-sm-offset-2 col-sm-2">
        <img src="/EMPLOYEE/files/<?php echo $daidien; ?>" class="img-responsive center-block" alt="Employee Photo"/>    </div>
    <div class="col-sm-6">
        <table id="employee-list" class="table table-striped">
            <tr>
                <th>Name</th>
                <td><?php echo $Name_Em; ?></td>
            </tr>
            <tr>
                <th>Department</th>
                <td><?php echo $Name; ?></td>
            </tr>
            <tr>
                <th>Job Title</th>
                <td><?php echo $Job_title; ?></td>
            </tr>
            <tr>
                <th>Cellphone</th>
                <td><?php echo $Cellphone; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $Email; ?></td>
            </tr>
        </table>
		<?php 
			}	
		?>
        <a href="index.php" class="btn btn-default">Back</a>    </div>
</div>
        </div>
 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>    