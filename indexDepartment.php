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
                            <div class="panel panel-primary">
        <div class="panel-body">
            <a href="addDepartment.php" class="btn btn-success">Add Department</a>        </div>
    </div>
<h3>Departments</h3>
<table id="dept-list" class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th class="hidden-xs hidden-sm">Office Number</th>
        <th class="hidden-xs">Manager</th>
                    <th>Action</th>
            </tr>
			<?php 
				$lenh1="SELECT * FROM department";
				$result=$mysqli -> query($lenh1);
						while ($kq=mysqli_fetch_assoc($result)){
							$Name 	= htmlspecialchars($kq ['Name']);
							$Office_phone 	= htmlspecialchars($kq ['Office_phone']);
							$Manager 	= htmlspecialchars($kq ['Manager']);
							$ID_department 	= htmlspecialchars($kq ['ID_department']);
							
			
			?>
			
			
			
            <tr>
            <td><?php echo $ID_department; ?></td>
            <td>
                <a href="viewDepartment.php?idd=<?php echo $ID_department; ?>"><?php echo $Name; ?></a>            </td>
            <td class="hidden-xs hidden-sm"><?php echo $Office_phone; ?></td>
            <td class="hidden-xs"><?php echo $Manager; ?></td>
                            <td>
                    <a href="index.php?idd=<?php echo $ID_department; ?>" class="btn btn-info">Employees</a>
<a href="editDepartment.php?idd=<?php echo $ID_department; ?>" class="btn btn-success">Edit</a>
<form action="/ed/departments/delete/81" name="post_585b86fecf8ba232973993" id="post_585b86fecf8ba232973993" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"/></form><a href="delDepartment.php?idd=<?php echo $ID_department; ?>" class="btn btn-danger" onclick="if (confirm(&quot;Are you sure to delete  Carter Vinson?&quot;)) { document.post_585b86fecf8ba232973993.submit(); } event.returnValue = false; return false;">Delete</a>                </td>
                    </tr>
            <?php 
			
						}
			?>
            
    </table>
        </div>

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>  